<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogsSaveController;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;



use App\Models\namesModel;
use App\Models\signsModel;
use App\Models\usersModel;
use App\Models\customersModel;
use App\Models\sellsModel;
use App\Models\sells_namesModel;
use App\Models\sells_combosModel;
use App\Models\worksModel;
use App\Models\OptionsModel;
use App\Models\preordersModel;
use App\Models\preorders_signsModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules;
use File;

class CheckoutCustomerController extends Controller
{
    

    public function generatePayLinkPayment($productName, $signs, $startDate, $expiredDate, $amount, $type, $number, $transaction)
    {
        $urlsandbox = 'https://sandbox-apipaylink.chillpay.co/api/v1/paylink/generate';
        $url = 'https://api-paylink.chillpay.co/api/v1/paylink/generate';

        $headerssandbox = [
            'CHILLPAY-MerchantCode' => 'M035329',
            'CHILLPAY-ApiKey' => 'RJlFW2fmhMTOBWyTNffFhrBCTJPlfUuEL5IpsP7Z8kbucl4PQvPBsDTg5Hk3zlTY',
            'Content-Type' => 'application/json',
        ];
        $headers = [
            'CHILLPAY-MerchantCode' => 'M035329',
            'CHILLPAY-ApiKey' => 'jpg2Cl3aWCsmatZ7rERFgJ0mt3sVG80bqtb62rtuBeW51B0ua2znrIEWzPdPzvs6',
            'Content-Type' => 'application/json',
        ];

        $body = [
            "ProductImage" => "https://signaturethailand.orexcoth.com/uploads/sign/th/20240418-4-2839-%E0%B8%81%E0%B8%81%E0%B8%9A-6620ddf0165e7.jpg",
            "ProductName" => $number,
            "ProductDescription" => $transaction,
            "PaymentLimit" => "",
            "StartDate" => $startDate,
            "ExpiredDate" => $expiredDate,
            "Currency" => "THB",
            "Amount" => $amount * 100,
        ];

        $md5SecretKeysandbox = 'oWaW58hoYCXSoNQR23xm6on0BzfLNGettDKLccUb0OpTN5UWOiSt4E1hEuo7xk2SbJo4F3FBnNKN2RINgECSw9RXs6ygagCb2C7fu78M1mMdq1ch8DofTiuog9t62QtIOOlR7n1woJSnqnnkrJzp02G6mdCYGufON2Fl1';
        $md5SecretKey = 'ThRTb2QrBcCzqC1TpbR5if2PMyX6RsCgz39OETfaNmhGtONiMwqDsNb7pWbmtoOMYRMeFMP86AlarNou3K8UL1ULCxQ5bY0GDkxtEyzA17M0h6vfD0YjAPnRVkP1njqH0cPrtqltpDHGiWUVZVmgadL9uJe3QwVy2e1oW';

        $checksumString = $body['ProductImage']
                        . $body['ProductName']
                        . $body['ProductDescription']
                        . $body['PaymentLimit']
                        . $body['StartDate']
                        . $body['ExpiredDate']
                        . $body['Currency']
                        . $body['Amount']
                        . $md5SecretKey;

        $checksum = md5($checksumString);

        $body['Checksum'] = $checksum;
        // dd($url, $headers, $body);
        try {
            $response = Http::withHeaders($headers)->post($url, $body);

            if ($response->successful()) {
                $responseData = $response->json()['data'];

                // dd($responseData);
                $paymentUrl = $responseData['paymentUrl'];
                $payLinkId = $responseData['payLinkId'];

                if ($type === 'sells') {
                    $sell = sellsModel::find($transaction);
                    if ($sell) {
                        $sell->payment_method = $payLinkId;
                        $sell->payment_qr = $paymentUrl;
                        $sell->save();
                    }
                }elseif ($type === 'preorders') {
                    $preorder = preordersModel::find($transaction);
                    if ($preorder) {
                        $preorder->payment_method = $payLinkId;
                        $preorder->payment_qr = $paymentUrl;
                        $preorder->save();
                    }
                }

                return [
                    'success' => true,
                    'paymentUrl' => $paymentUrl,
                ];
            } else {
                return [
                    'success' => false,
                    'message' => 'Failed to generate payment link.',
                    'response' => $response->json(),
                ];
            }
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage(),
            ];
        }
    }
    public function preorder_checkout(Request $request)
    {
        $requiredFields = ['firstname', 'email', 'phone', 'package', 'preorder_type'];
        foreach ($requiredFields as $field) {
            if (!$request->has($field)) {
                return response()->json(['error' => 'Missing required field: ' . $field], 400);
            }
        }

        $customer = customersModel::where('email', $request->email)->orWhere('phone', $request->phone)->first();
        if (!$customer) {
            $customer = new customersModel();
            $customer->role = 'normal';
            $customer->username = $request->email;
            $customer->password = Hash::make($request->passcode);
            $customer->firstname = $request->firstname;
            $customer->lastname = $request->lastname;
            $customer->email = $request->email;
            $customer->phone = $request->phone;
            $customer->save();
        }

        $preorderNumber = strtoupper("PDIV" . uniqid());

        $newPreorder = new preordersModel();
        $newPreorder->status = 'pending';
        $newPreorder->number = $preorderNumber;
        $newPreorder->customers_id = $customer->id;
        $newPreorder->total = $request->preorder_price;
        $newPreorder->firstname = $request->firstname;
        $newPreorder->lastname = $request->lastname;
        $newPreorder->email = $request->email;
        $newPreorder->phone = $request->phone;
        $newPreorder->shipping_method = 'email';
        $newPreorder->shipping_detail = $request->email;
        $newPreorder->payment_method = 'payment_method';
        $newPreorder->payment_qr = 'payment_qr';
        $newPreorder->payment_status = 'pending';
        $newPreorder->package = $request->package;
        $newPreorder->preorder_type = $request->preorder_type;
        $newPreorder->preorder_price = $request->preorder_price;
        $newPreorder->total_price = $request->total_price;
        $newPreorder->shipping_price = $request->shipping_price;
        $newPreorder->firstname_th = $request->firstname_th;
        $newPreorder->lastname_th = $request->lastname_th;
        $newPreorder->firstname_en = $request->firstname_en;
        $newPreorder->lastname_en = $request->lastname_en;
        $newPreorder->prominence_1 = $request->prominence_1;
        $newPreorder->prominence_2 = $request->prominence_2;
        $newPreorder->prominence_3 = $request->prominence_3;
        $newPreorder->prominence_4 = $request->prominence_4;
        $newPreorder->prominence_5 = $request->prominence_5;
        $newPreorder->TargetPreorder = $request->TargetPreorder;
        $newPreorder->name = $request->name;
        $newPreorder->dob = $request->dob;
        $newPreorder->telephone = $request->telephone;
        $newPreorder->SelectStatus = $request->SelectStatus;
        $newPreorder->occupation = $request->occupation;
        $newPreorder->EverSignature = $request->EverSignature;
        $newPreorder->mysignature = $request->mysignaturePath;
        $newPreorder->ProblemPreorder = $request->ProblemPreorder;
        $newPreorder->DeliverSignature = $request->DeliverSignature;
        $newPreorder->agree = $request->agree;
        $newPreorder->save();

        $productName = '';
        if ($newPreorder->package === 'thai' || $newPreorder->package === 'combo') {
            if ($newPreorder->preorder_type === 'firstname' || $newPreorder->preorder_type === 'duo') {
                $productName .= $newPreorder->firstname_th . ' ';
            }
            if ($newPreorder->preorder_type === 'lastname' || $newPreorder->preorder_type === 'duo') {
                $productName .= $newPreorder->lastname_th . ' ';
            }
        }
        if ($newPreorder->package === 'english' || $newPreorder->package === 'combo') {
            if ($newPreorder->preorder_type === 'firstname' || $newPreorder->preorder_type === 'duo') {
                $productName .= $newPreorder->firstname_en . ' ';
            }
            if ($newPreorder->preorder_type === 'lastname' || $newPreorder->preorder_type === 'duo') {
                $productName .= $newPreorder->lastname_en . ' ';
            }
        }

        $startDate = now()->subDay()->format('d/m/Y H:i:s');
        $expiredDate = now()->addMonths(6)->format('d/m/Y H:i:s');
        $amount = $newPreorder->total_price;

        return redirect()->route('paymentPage', ['type' => 'preorder', 'order' => $newSell->id]);

        // $paymentResult = $this->generatePayLinkPayment($productName, '', $startDate, $expiredDate, $amount, 'preorders', $newPreorder->number, $newPreorder->id);

        // if ($paymentResult['success']) {
        //     return redirect()->away($paymentResult['paymentUrl']);
        // } else {
        //     Log::error('Failed to generate payment link', ['response' => $paymentResult]);

        //     return response()->json([
        //         'error' => 'Failed to generate payment link.',
        //         'details' => $paymentResult,
        //     ], 500);
        // }
    }













    
    public function sell_checkout(Request $request)
    {
        // $requiredFields = ['firstname', 'email', 'phone', 'name_id', 'signs', 'type', 'package'];
        // foreach ($requiredFields as $field) {
        //     if (!$request->has($field)) {
        //         return response()->json(['error' => 'Missing required field: ' . $field], 400);
        //     }
        // }
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'name_id' => 'required|string',
            'signs' => 'required|string',
            'type' => 'required|string',
            'package' => 'required|string',
        ]);
        // Return validation errors if validation fails
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
        

        $customer = customersModel::where('email', $request->email)->orWhere('phone', $request->phone)->first();
        if (!$customer) {
            $customer = new customersModel();
            $customer->role = 'normal';
            $customer->username = $request->email;
            $customer->password = Hash::make($request->passcode);
            $customer->firstname = $request->firstname;
            $customer->lastname = $request->lastname;
            $customer->email = $request->email;
            $customer->phone = $request->phone;
            $customer->save();
        }

        $sellNumber = strtoupper("STIV" . uniqid());

        $newSell = new sellsModel();
        $newSell->status = 'pending';
        $newSell->number = $sellNumber;
        $newSell->customers_id = $customer->id;
        $newSell->names_id = $request->name_id;
        $newSell->name_th = $request->name_th;
        $newSell->name_en = $request->name_en;
        $newSell->signs = $request->signs;
        $newSell->type = $request->type;
        $newSell->package = $request->package;
        $newSell->total = $request->total;
        $newSell->firstname = $request->firstname;
        $newSell->lastname = $request->lastname;
        $newSell->email = $request->email;
        $newSell->phone = $request->phone;
        $newSell->shipping_method = 'email';
        $newSell->shipping_detail = $request->email;
        $newSell->payment_method = 'qrcode';
        $newSell->payment_status = 'pending';
        $newSell->save();

        // Determine the product name based on the package (either Thai, English, or both)
        $productName = ($newSell->package === 'th') ? $newSell->name_th : (($newSell->package === 'en') ? $newSell->name_en : $newSell->name_th . ' / ' . $newSell->name_en);


        $startDate = now()->subDay()->format('d/m/Y H:i:s');
        $expiredDate = now()->addMonths(6)->format('d/m/Y H:i:s');
        $amount = $newSell->total;

        return redirect()->route('paymentPage', ['type' => 'sell', 'order' => $newSell->id]);

        // $paymentResult = $this->generatePayLinkPayment($productName, $newSell->signs, $startDate, $expiredDate, $amount, 'sells', $newSell->number, $newSell->id);
        // if ($paymentResult['success']) {
        //     return redirect()->away($paymentResult['paymentUrl']);
        // } else {
        //     Log::error('Failed to generate payment link', ['response' => $paymentResult]);
        //     return response()->json([
        //         'error' => 'Failed to generate payment link.',
        //         'details' => $paymentResult,
        //     ], 500);
        // }
    }















    
    public function generatePayLink()
    {
        $url = 'https://sandbox-apipaylink.chillpay.co/api/v1/paylink/generate';

        $headers = [
            'CHILLPAY-MerchantCode' => 'M035329',
            'CHILLPAY-ApiKey' => 'RJlFW2fmhMTOBWyTNffFhrBCTJPlfUuEL5IpsP7Z8kbucl4PQvPBsDTg5Hk3zlTY',
            'Content-Type' => 'application/json',
        ];

        $body = [
            "ProductImage" => "http://127.0.0.1:8000/uploads/sign/en/20240418-4-2839-kakob-6620de0f82e47.jpg",
            "ProductName" => "กกบ",
            "ProductDescription" => "Product Description",
            "PaymentLimit" => "",
            "StartDate" => "01/10/2021 11:05:06",
            "ExpiredDate" => "01/10/2024 11:05:06",
            "Currency" => "THB",
            "Amount" => 2000,
        ];

        $md5SecretKey = 'oWaW58hoYCXSoNQR23xm6on0BzfLNGettDKLccUb0OpTN5UWOiSt4E1hEuo7xk2SbJo4F3FBnNKN2RINgECSw9RXs6ygagCb2C7fu78M1mMdq1ch8DofTiuog9t62QtIOOlR7n1woJSnqnnkrJzp02G6mdCYGufON2Fl1';

        $checksumString = $body['ProductImage']
                        . $body['ProductName']
                        . $body['ProductDescription']
                        . $body['PaymentLimit']
                        . $body['StartDate']
                        . $body['ExpiredDate']
                        . $body['Currency']
                        . $body['Amount']
                        . $md5SecretKey;

        $checksum = md5($checksumString);

        // Add the checksum to the body
        $body['Checksum'] = $checksum;

        try {
            $response = Http::withHeaders($headers)->post($url, $body);

            if ($response->successful()) {
                $responseData = $response->json()['data'];

                // Assuming paymentUrl is the URL where the user should be redirected
                $paymentUrl = $responseData['paymentUrl'];

                // Redirect the user to the payment URL
                return redirect()->away($paymentUrl);
            } else {
                // Handle the case where the API call was not successful
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to generate payment link.',
                ]);
            }
        } catch (\Exception $e) {
            // Handle exceptions
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }
    
    // public function preorder_checkout(Request $request)
    // {
    //     // dd($request);
    //     // 1. Check if required fields are not null
    //     $requiredFields = ['firstname', 'email', 'phone', 'package', 'preorder_type'];
    //     foreach ($requiredFields as $field) {
    //         if (!$request->has($field)) {
    //             return response()->json(['error' => 'Missing required field: ' . $field], 400);
    //         }
    //     }

    //     // 2. Check if email exists in customersModel
    //     $customer = CustomersModel::where('email', $request->email)->first();
    //     // dd($customer);
    //     if ($customer) {
    //         $customers_id = $customer->id;
    //     } else {
    //         // 3. Check if phone exists in customersModel
    //         $customer = CustomersModel::where('phone', $request->phone)->first();
    //         if ($customer) {
    //             $customers_id = $customer->id;
    //         } else {
    //             // 4. Create new customer if not found
    //             $newCustomer = new CustomersModel();
    //             $newCustomer->role = 'normal';
    //             $newCustomer->username = $request->email;
    //             $newCustomer->password = Hash::make($request->passcode);
    //             $newCustomer->firstname = $request->firstname;
    //             $newCustomer->lastname = $request->lastname;
    //             $newCustomer->email = $request->email;
    //             $newCustomer->phone = $request->phone;
    //             $newCustomer->save();
    //             $customers_id = $newCustomer->id;
    //         }
    //     }
    //     // dd($customers_id);

    //     $stiv = "PDIV"; // Static prefix
    //     $timestamp = time(); // Current timestamp
    //     $uniq_id = uniqid(); // Unique identifier
    //     // $gennumber = $stiv . $timestamp  . $uniq_id;
    //     $gennumber = strtoupper($stiv . $uniq_id);
    //     // 5. Create new sellsModel
    //     $newpreorders = new preordersModel();
    //     $newpreorders->status = 'pending';
    //     $newpreorders->number = $gennumber;
    //     $newpreorders->customers_id = $customers_id;
    //     $newpreorders->total = $request->preorder_price;

    //     $newpreorders->firstname = $request->firstname;
    //     $newpreorders->lastname = $request->lastname;
    //     $newpreorders->email = $request->email;
    //     $newpreorders->phone = $request->phone;

    //     $newpreorders->shipping_method = 'shipping_method';
    //     $newpreorders->shipping_detail = 'shipping_detail';
    //     $newpreorders->payment_method = 'payment_method';
    //     $newpreorders->payment_qr = 'payment_qr';
    //     $newpreorders->payment_status = 'payment_status';
    //     $newpreorders->payment_date = now();

    //     $newpreorders->package = $request->package;
    //     $newpreorders->preorder_type = $request->preorder_type;
    //     $newpreorders->preorder_price = $request->preorder_price;
    //     $newpreorders->total_price = $request->total_price;
    //     $newpreorders->shipping_price = $request->shipping_price;
    //     $newpreorders->firstname_th = $request->firstname_th;
    //     $newpreorders->lastname_th = $request->lastname_th;
    //     $newpreorders->firstname_en = $request->firstname_en;
    //     $newpreorders->lastname_en = $request->lastname_en;
    //     $newpreorders->prominence_1 = $request->prominence_1;
    //     $newpreorders->prominence_2 = $request->prominence_2;
    //     $newpreorders->prominence_3 = $request->prominence_3;
    //     $newpreorders->prominence_4 = $request->prominence_4;
    //     $newpreorders->prominence_5 = $request->prominence_5;
    //     $newpreorders->TargetPreorder = $request->TargetPreorder;
    //     $newpreorders->name = $request->name;
    //     $newpreorders->dob = $request->dob;
    //     $newpreorders->telephone = $request->telephone;
    //     $newpreorders->SelectStatus = $request->SelectStatus;
    //     $newpreorders->occupation = $request->occupation;
    //     $newpreorders->EverSignature = $request->EverSignature;
    //     $newpreorders->mysignature = $request->mysignaturePath;
    //     $newpreorders->ProblemPreorder = $request->ProblemPreorder;
    //     $newpreorders->DeliverSignature = $request->DeliverSignature;
    //     $newpreorders->agree = $request->agree;
    //     // Assuming you also need to store other fields from the request in SellsModel
    //     // Add them as necessary
    //     // dd($newpreorders);
    //     $newpreorders->save();

        
    //     $getauto_assign = OptionsModel::where('option_key', 'auto_assign')->first();
    //     $auto_assign = $getauto_assign->option_value;
    //     if ($auto_assign == 'yes') {
    //         $allusers = usersModel::get();
    //         if (!$allusers->isEmpty()) {
    //             foreach ($allusers as $user) {
    //                 $works = new worksModel;
    //                 $works->status = 'assign';
    //                 $works->type = 'preorders';
    //                 $works->description = '...';
    //                 $works->users_id = $user->id;
    //                 $works->make = $newpreorders->id;               
    //                 $works->save();
    //             }
    //         } else {
    //             // Handle the case where no users are found
    //         }
    //     }

    //     return redirect(route('paymentPage', ['type' => 'preorder', 'order' => $newpreorders->id]));
    //     // Optionally, return success response with sell ID
    //     // return redirect(route('thankPage', ['preorders_id' => $newpreorders->id]))->with('success', 'สร้างสำเร็จ !!!');

    // }







    






    public function thankPage(Request $request)
    {
        // dd($sell_id);
        // $sell = sellsModel::find($sell_id);
        return view('frontend/thank', [
            'default_pagename' => 'homePage',
            // 'ordernumber' => $ordernumber,
        ]);
    }

}
