<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogsSaveController;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Validator;

use App\Models\suggestsModel;
use App\Models\contactsModel;
use App\Models\OptionsModel;
use App\Models\namesModel;
use App\Models\signsModel;
use App\Models\customersModel;

use App\Models\preordersModel;
use App\Models\preordersTurnInModel;
use App\Models\preorders_signs;
use App\Models\sellsModel;
use App\Models\sells_namesModel;
use App\Models\downloadsModel;
use App\Models\User;

// use Dompdf\Dompdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use File;

use Mpdf\Mpdf;
use Mpdf\Config\ConfigVariables;
use Mpdf\Config\FontVariables;
use Illuminate\Support\Facades\Mail;
// use Barryvdh\DomPDF\Facade as PDF;
// use PDF;
// use Barryvdh\DomPDF\PDF;

use App\Mail\OrderPaymentSuccess;


class FrontendPageController extends Controller
{

    public function testSendEmail($type, $order_id)
    {
        $this->sendEmailOnPaymentSuccess($type, $order_id);
        
        return "Test email sent for order {$order_id} of type {$type}";
    }
    function sendEmailOnPaymentSuccess($type, $order_id)
    {
        $order = null;
        $email = null;
        $orderNumber = null;

        if ($type === 'sells') {
            $order = SellsModel::find($order_id);
        } elseif ($type === 'preorders') {
            $order = PreordersModel::find($order_id);
        }

        if ($order) {
            $email = $order->email;
            $orderNumber = $order->number;

            // Send email notification
            Mail::to($email)->send(new OrderPaymentSuccess($orderNumber));
        } else {
            // Handle invalid order type or ID
            // You can log an error, throw an exception, or handle it as appropriate for your application
        }
    }


    public function generateReceipt($type, $order_id)
    {
        // Fetch order data based on type and order_id
        if ($type === 'sells') {
            $order = sellsModel::with('customers')->find($order_id);
        } elseif ($type === 'preorders') {
            $order = preordersModel::with('customer')->find($order_id);
        } else {
            return response('Invalid type', 400);
        }
        
        if (!$order) {
            return response('Order not found', 404);
        }

        // Pass data to the view
        $data = [
            'type' => $type,
            'order' => $order,
        ];

        // Render the HTML template with the order data
        $html = view('receipt', $data)->render();

        // Uncomment to generate PDF after verifying HTML
        $fontDir = public_path('fonts/prompt');
        $fontData = [
            'prompt' => [
                'R' => 'Prompt-Regular.ttf',
            ],
        ];
        $mpdf = new \Mpdf\Mpdf([
            'fontDir' => $fontDir,
            'fontdata' => $fontData,
        ]);
        $mpdf->WriteHTML($html);
        $filename = 'SIGNATURETHAILAND-'.$order->number . '.pdf';
        $mpdf->Output($filename, 'D');
    }

    public function sendEmail(Request $request)
    {
        $toEmail = 'hireos.kong@gmail.com'; // The recipient's email address

        Mail::raw('send email success', function ($message) use ($toEmail) {
            $message->to($toEmail)
                    ->subject('Test Email');
        });

        return redirect()->back()->with('success', 'Email sent successfully!');
    }

    public function contactaction(Request $request)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'contact_firstname' => 'required|string|max:255',
            'contact_lastname' => 'required|string|max:255',
            'contact_email' => 'required|email|max:255',
            'contact_phone' => 'required|string|max:20',
            'contact_heading' => 'required|string|max:255',
            'contact_message' => 'required|string',
        ]);
        

        if ($validator->fails()) {
            // dd($validator->errors()->all());
            return redirect()->back()->with('error', 'Validation failed. Please check your inputs!');
        }

        $contacts = new ContactsModel;
        $contacts->contact_firstname = $request->contact_firstname;
        $contacts->contact_lastname = $request->contact_lastname;
        $contacts->contact_email = $request->contact_email;
        $contacts->contact_phone = $request->contact_phone;
        $contacts->contact_heading = $request->contact_heading;
        $contacts->contact_message = $request->contact_message;
        $contacts->save();


        return redirect()->back()->with('success', 'ส่งข้อมูลเรียบร้อย!');
    }
    public function suggestaction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_th' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', 'กรุณาใส่ชื่ออย่างน้อย 1 ภาษา !')->withInput();
        }
        $suggest = new suggestsModel;
        $suggest->name_th = $request->name_th;
        $suggest->name_en = $request->name_en;
        $suggest->email = $request->email;
        $suggest->phone = $request->phone;
        $suggest->status = 'suggested';
        $suggest->save();
        return redirect()->back()->with('success', 'ส่งข้อมูลเรียบร้อย!');
    }
    public function articledetailPage(Request $request, $id)
    {

        return view('frontend/article-detail', [
            'default_pagename' => 'รายละเอียดบทความ',
        ]);
    }
    public function articlePage(Request $request)
    {
        return view('frontend/articles', [
            'default_pagename' => 'บทความ',
        ]);
    }



    public function historydetailsignatureforpreordersPage(Request $request, $preorders_id, $turnin_id)
    {
        $customer = $request->session()->get('customer');
        $customer_id = $customer->id;
        $turnIn = PreordersTurnInModel::findOrFail($turnin_id);
        if ($turnIn->preorders_id != $preorders_id) {
            // Handle the case where the turn-in record doesn't belong to the specified preorder
            abort(404);
        }
        $turnInWithRelations = $turnIn->load('user', 'preorder');

        // dd($turnIn);

        return view('frontend.historydetailsignatureforpreorders', [
            'default_pagename' => 'historydetailsignatureforpreorders',
            'turnIn' => $turnIn,
        ]);
        
    }





    public function savedownloadcountaction(Request $request)
    {
        // dd($request);
        // Check if the download exists
        $exists = downloadsModel::where([
            'signs_id' => $request->input('signs_id'),
            'sells_id' => $request->input('sells_id'),
            'preorders_id' => $request->input('preorders_id'),
            'post_id' => $request->input('post_id'),
            'tablename' => $request->input('tablename'),
            'type' => $request->input('type'),
            'customers_id' => $request->input('customers_id'),
        ])->exists();

        // If download does not exist, save it
        if (!$exists) {
            $download = new downloadsModel();
            $download->signs_id = $request->input('signs_id');
            $download->sells_id = $request->input('sells_id');
            $download->preorders_id = $request->input('preorders_id');
            $download->post_id = $request->input('post_id');
            $download->tablename = $request->input('tablename');
            $download->type = $request->input('type');
            $download->customers_id = $request->input('customers_id');
            $download->save();
        }

        // You can modify this response as per your requirement
        return response()->json(['exists' => $exists, 'message' => 'Download action completed', 'file_path' => '']);
    }













    public function historydetailsignatureforsellsPage(Request $request, $sells_id, $signs_id)
    {
        $customer = $request->session()->get('customer');
        $customer_id = $customer->id;

        $sells = SellsModel::findOrFail($sells_id);

        if ($sells->customers_id != $customer_id) {
            abort(403, 'Unauthorized access'); // Return 403 Forbidden if the customer ID does not match
        }
        $signs = json_decode($sells->signs); // Assuming 'signs' field is in JSON format
        if (!in_array($signs_id, $signs)) {
            abort(404, 'Sign not found'); // Return 404 Not Found if $signs_id is not found
        }
        $sign = SignsModel::findOrFail($signs_id);
        $signWithRelations = $sign->load('user', 'name');

        return view('frontend.historydetailsignatureforsells', [
            'default_pagename' => 'historydetailsignatureforsells',
            'layout' => 'side-menu',
            'sign' => $sign, // Pass the sells data to the view
            'customer' => $customer,
            'sells_id' => $sells_id,
            'signs_id' => $signs_id,
        ]);
    }


    public function historyPage(Request $request)
    {
        $customer = $request->session()->get('customer');
        $customer_id = $customer->id;

        $getpreorders = preordersModel::where('customers_id', $customer_id)->get();
        $getsells = sellsModel::where('customers_id', $customer_id)->get();
        foreach ($getsells as $sell) {
            // $sign_ids = json_decode($sell->signs);
            // $random_sign_id = $sign_ids[array_rand($sign_ids)];
            // $random_sign = signsModel::find($random_sign_id);
            // $sell->signs = $random_sign;

            $sign_ids = json_decode($sell->signs);
            $signs = signsModel::whereIn('id', $sign_ids)->get();
            $sell->signs = $signs;
        }
        // dd($getsells);
        // Now $getsells will contain sells along with associated signs
        $preordersTurnIns = PreordersTurnInModel::whereHas('preorder', function ($query) use ($customer_id) {
            $query->where('customers_id', $customer_id);
        })->where('status', 'submitted')->with('preorder')->get();

        // dd($preordersTurnIns);


        // If the customer session is not available, redirect to historyloginPage
        if (!$customer) {
            return redirect()->route('historyloginPage');
        }

        return view('frontend.history', [
            'default_pagename' => 'history',
            'customer' => $customer,
            'getpreorders' => $getpreorders,
            'getsells' => $getsells,
            'preordersTurnIns' => $preordersTurnIns,
        ]);
    }
    public function historyloginPage(Request $request)
    {
        return view('frontend/history-login', [
            'default_pagename' => 'history-login',
        ]);
    }
    public function historyloginaction(Request $request)
    {
        // Validate the form data
        $request->validate([
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        // Check if the customer exists with the provided email and phone
        $customer = customersModel::where('email', $request->email)
                             ->where('phone', $request->phone)
                             ->first();

        if ($customer) {
            // Store the customer details in the session
            $request->session()->put('customer', $customer);

            // Redirect to the historyPage
            return redirect()->route('historyPage');
        } else {
            // If customer not found, redirect back with error message
            return redirect()->back()->with('error', 'Invalid credentials. Please try again.');
        }
    }

    public function fillininformationpreorderPage(Request $request)
    {
        // dd($request);
        // $name = namesModel::find($request->name_id);
        return view('frontend/fill-in-information-preorder', [
            'default_pagename' => 'fill-in-information',
            'package' => $request->package,
            'preorder_type' => $request->preorder_type,
            'firstname_th' => $request->firstname_th,
            'lastname_th' => $request->lastname_th,
            'firstname_en' => $request->firstname_en,
            'lastname_en' => $request->lastname_en,
            'prominence_1' => $request->prominence_1,
            'prominence_2' => $request->prominence_2,
            'prominence_3' => $request->prominence_3,
            'prominence_4' => $request->prominence_4,
            'prominence_5' => $request->prominence_5,
            'TargetPreorder' => $request->TargetPreorder,
            'name' => $request->name,
            'dob' => $request->dob,
            'telephone' => $request->telephone,
            'SelectStatus' => $request->SelectStatus,
            'occupation' => $request->occupation,
            'EverSignature' => $request->EverSignature,
            'ProblemPreorder' => $request->ProblemPreorder,
            'DeliverSignature' => $request->DeliverSignature,
            'preorder_price' => $request->preorder_price,
            'total_price' => $request->total_price,
            'shipping_price' => $request->shipping_price,
            'mysignaturePath' => $request->mysignaturePath,
            'agree' => $request->agree,
        ]);
    }

    public function cartpreorderPage(Request $request)
    {

        $myoldsign = '';
        if ($request->hasFile('mysignature')) {
            $currentDate = date('Ymd');
            $randomString = uniqid().uniqid();
            $signExtension = $request->file('mysignature')->getClientOriginalExtension();
            $oldsignFile = $request->file('mysignature');
            $oldsignNewFileName = $currentDate . '-' . $randomString . '.' . $signExtension;
            $signDestinationPath = 'uploads/oldsign';
            $oldsignPath = $oldsignFile->move($signDestinationPath, $oldsignNewFileName);
            $myoldsign = $oldsignPath->getPathname();
        } 
        $firstname_th = OptionsModel::where('option_key', 'firstname_th')->first();
        $lastname_th = OptionsModel::where('option_key', 'lastname_th')->first();
        $firstname_en = OptionsModel::where('option_key', 'firstname_en')->first();
        $lastname_en = OptionsModel::where('option_key', 'lastname_en')->first();

        $express = OptionsModel::where('option_key', 'express')->first();
            

        $shipping = ($request->DeliverSignature == 'express')?100:0;
        return view('frontend/cart-preorder', [
            'default_pagename' => 'cart-preorder',
            'package' => $request->package,
            'preorder_type' => $request->preorder_type,
            'firstname_th' => $request->firstname_th,
            'lastname_th' => $request->lastname_th,
            'firstname_en' => $request->firstname_en,
            'lastname_en' => $request->lastname_en,
            'prominence_1' => $request->prominence_1,
            'prominence_2' => $request->prominence_2,
            'prominence_3' => $request->prominence_3,
            'prominence_4' => $request->prominence_4,
            'prominence_5' => $request->prominence_5,
            'TargetPreorder' => $request->TargetPreorder,
            'name' => $request->name,
            'dob' => $request->dob,
            'telephone' => $request->telephone,
            'SelectStatus' => $request->SelectStatus,
            'occupation' => $request->occupation,
            'EverSignature' => $request->EverSignature,
            'ProblemPreorder' => $request->ProblemPreorder,
            'DeliverSignature' => $request->DeliverSignature,
            'agree' => $request->agree,
            'shipping' => $shipping,
            'mysignaturePath' => $myoldsign,
            'firstname_th_price' => $firstname_th ? $firstname_th->option_value : 0,
            'lastname_th_price' => $lastname_th ? $lastname_th->option_value : 0,
            'firstname_en_price' => $firstname_en ? $firstname_en->option_value : 0,
            'lastname_en_price' => $lastname_en ? $lastname_en->option_value : 0,
            'express_price' => $express ? $express->option_value : 0,
        ]);
    }

    public function cartPage(Request $request)
    {
        // dd($request);
        $name = namesModel::find($request->name_id);
        return view('frontend/cart', [
            'default_pagename' => 'homePage',
            'name' => $name,
            'name_id' => $request->name_id,
            'signsth' => $request->signsth,
            'signsen' => $request->signsen,
            'signsall' => $request->signsall,
            'type' => $request->type,
            'package' => $request->package,
        ]);
    }
    public function preorderPage(Request $request)
    {
        $firstname_th = OptionsModel::where('option_key', 'firstname_th')->first();
        $lastname_th = OptionsModel::where('option_key', 'lastname_th')->first();
        $firstname_en = OptionsModel::where('option_key', 'firstname_en')->first();
        $lastname_en = OptionsModel::where('option_key', 'lastname_en')->first();
        $express = OptionsModel::where('option_key', 'express')->first();


        return view('frontend/preorder', [
            'default_pagename' => 'preorder',
            'firstname_th' => $firstname_th ? $firstname_th->option_value : 0,
            'lastname_th' => $lastname_th ? $lastname_th->option_value : 0,
            'firstname_en' => $firstname_en ? $firstname_en->option_value : 0,
            'lastname_en' => $lastname_en ? $lastname_en->option_value : 0,
            'express' => $express ? $express->option_value : 0,
        ]);
    }





    public function searchPage(Request $request)
    {
        function detectLanguage($text) {
            $englishPattern = '/[a-zA-Z]/';
            $thaiPattern = '/[\p{Thai}]/u'; // Unicode property for Thai characters
            if (preg_match($englishPattern, $text)) {
                return 'en';
            }
                if (preg_match($thaiPattern, $text)) {
                return 'th';
            }
            return 'Unknown';
        }
        $keywordsss =  $request->keyword;
        $language = detectLanguage($keywordsss);
        // dd($language);
        
        $keyword = $request->input('keyword');

        if (!empty($keyword)) {

            $orderByColumn = $language == 'th' ? 'name_th' : 'name_en';
            $names = NamesModel::where('name_th', 'like', $keyword . '%')
                  ->orWhere('name_en', 'like', $keyword . '%')
                  ->distinct()
                  ->orderBy($orderByColumn, 'asc')
                  ->paginate(24);
                //   ->toSql();

            // dd($names);

            if ($names->count() > 0) {
                return view('frontend.search', [
                    'default_pagename' => 'ค้นหาลายเซ็น',
                    'query' => $names,
                    'language' => $language,
                ]);
            }
        }

        // If no keyword provided or no results found, return empty query
        return view('frontend.search', [
            'default_pagename' => 'search',
            'query' => null,
        ]);
    }




    public function fillininformationPage(Request $request)
    {
        // dd($request);
        $name = namesModel::find($request->name_id);
        return view('frontend/fill-in-information', [
            'default_pagename' => 'fill-in-information',
            'name' => $name,
            'name_id' => $request->name_id,
            'signs' => $request->signs,
            'type' => $request->type,
            'package' => $request->package,
            'total' => $request->total,
            'name_th' => $request->name_th,
            'name_en' => $request->name_en,
        ]);
    }

    
    public function productdownloadPage(Request $request)
    {
        $sign_id = $request->sign;

        $getsign = SignsModel::with('name')->find($sign_id);
        // dd($getsign);

        return view('frontend/product-download', [
            'default_pagename' => 'productdownload',
            'sign' => $getsign,
        ]);
    }
    public function productdetailPage(Request $request)
    {
        $name_id = $request->name;
        $name = namesModel::find($name_id);

        $nth = SignsModel::where('names_id', $name_id)
            ->where('lang', 'th')
            ->get();
        $nen = SignsModel::where('names_id', $name_id)
            ->where('lang', 'en')
            ->get();

        $nth_ids = SignsModel::where('names_id', $name_id)
            ->where('lang', 'th')
            ->pluck('id')->toArray();
        $nen_ids = SignsModel::where('names_id', $name_id)
            ->where('lang', 'en')
            ->pluck('id')->toArray();
        $combined_ids = array_merge($nth_ids, $nen_ids);

        $signarrayTH = json_encode($nth_ids);
        $signarrayEN = json_encode($nen_ids);
        $signarrayALL = json_encode($combined_ids);

        return view('frontend/product-detail', [
            'default_pagename' => 'productdetail',
            'name' => $name,
            'nth' => $nth,
            'nen' => $nen,
            'signarrayTH' => $signarrayTH,
            'signarrayEN' => $signarrayEN,
            'signarrayALL' => $signarrayALL,
        ]);
    }
    public function allproductTHPage(Request $request)
    {
        $namesth = NamesModel::whereHas('signs', function ($query) {
                $query->where('lang', 'th');
            })
            ->where('free', 1)
            ->get()
            ->take(12)
            ->map(function ($name) {
                if ($name->signs->isNotEmpty()) {
                    $randomSign = $name->signs->random();
                    $name->random_sign = $randomSign;
                }
                return $name;
            });

        return view('frontend/allproduct-th', [
            'default_pagename' => 'allproduct-en',
            'namesth' => $namesth,
        ]);
    }
    public function allproductENPage(Request $request)
    {
        $namesen = NamesModel::whereHas('signs', function ($query) {
                $query->where('lang', 'en');
            })
            ->where('free', 1)
            ->get()
            ->take(12)
            ->map(function ($name) {
                if ($name->signs->isNotEmpty()) {
                    $randomSign = $name->signs->random();
                    $name->random_sign = $randomSign;
                }
                return $name;
            });

        return view('frontend/allproduct-en', [
            'default_pagename' => 'allproduct-en',
            'namesen' => $namesen,
        ]);
    }
    public function productPage(Request $request)
    {
            
        $namesen = NamesModel::whereHas('signs', function ($query) {
                $query->where('lang', 'en');
            })
            ->where('free', 1)
            ->get()
            ->take(12)
            ->map(function ($name) {
                if ($name->signs->isNotEmpty()) {
                    $randomSign = $name->signs->random();
                    $name->random_sign = $randomSign;
                }
                return $name;
            });
        
        $namesth = NamesModel::whereHas('signs', function ($query) {
                $query->where('lang', 'th');
            })
            ->where('free', 1)
            ->get()
            ->take(12)
            ->map(function ($name) {
                if ($name->signs->isNotEmpty()) {
                    $randomSign = $name->signs->random();
                    $name->random_sign = $randomSign;
                }
                return $name;
            });

        // dd($namesen);

        return view('frontend/product', [
            'default_pagename' => 'คลังลายเซ็น',
            'namesth' => $namesth,
            'namesen' => $namesen,
        ]);
    }
    
    public function teamPage(Request $request)
    {
        return view('frontend/team', [
            'default_pagename' => 'teamPage',
        ]);
    }
    public function contactPage(Request $request)
    {
        return view('frontend/contact', [
            'default_pagename' => 'contactPage',
        ]);
    }
    public function aboutPage(Request $request)
    {
        $about_page = OptionsModel::where('option_key', 'about_page')->first();
        $about_index = OptionsModel::where('option_key', 'about_index')->first();
        return view('frontend/about', [
            'default_pagename' => 'aboutPage',
            'about_page' => $about_page->option_value,
            'about_index' => $about_index->option_value,
        ]);
    }
    
    /****************************************************************/
    /****************************************************************/
    /****************************************************************/
    public function homePage(Request $request)
    {
        return view('frontend/index', [
            'default_pagename' => 'homePage',
        ]);
    }
    public function indexPage(Request $request)
    {
        $staffs = User::get();
        $namefree = NamesModel::where('free', 1)
            ->whereHas('signs')
            ->get()
            ->take(12)
            ->map(function ($name) {
                if ($name->signs->isNotEmpty()) {
                    $randomSign = $name->signs->random();
                    $name->random_sign = $randomSign;
                }
                return $name;
            });

        $namesen = NamesModel::whereHas('signs', function ($query) {
                $query->where('lang', 'en');
            })
            ->where('free', 1)
            ->inRandomOrder()
            ->get()
            ->take(8)
            ->map(function ($name) {
                if ($name->signs->isNotEmpty()) {
                    $randomSign = $name->signs->random();
                    $name->random_sign = $randomSign;
                }
                return $name;
            });
        
        $namesth = NamesModel::whereHas('signs', function ($query) {
                $query->where('lang', 'th');
            })
            ->where('free', 1)
            ->inRandomOrder()
            ->get()
            ->take(8)
            ->map(function ($name) {
                if ($name->signs->isNotEmpty()) {
                    $randomSign = $name->signs->random();
                    $name->random_sign = $randomSign;
                }
                return $name;
            });

        $about_index = OptionsModel::where('option_key', 'about_index')->first();
        // dd($staffs);
        return view('frontend/index', [
            'default_pagename' => 'Signature Thailand',
            'layout' => 'side-menu',
            'staffs' => $staffs,
            'namefree' => $namefree,
            'namesfreeen' => $namesen,
            'namesfreeth' => $namesth,
            'about_index' => $about_index->option_value,
        ]);
    }
    

    



    /****************************************************************/
    /****************************************************************/
    /****************************************************************/
    public function TheBooGeyManEncodeIdx($string,$key='PKMONEY'){
        $j=0;$hash=null;$key=sha1($key);$strLen=strlen($string);$keyLen=strlen($key);
        for($i=0;$i<$strLen;++$i){
            $ordStr=ord(substr($string,$i,1));
            if($j==$keyLen){$j=0;}
            $ordKey=ord(substr($key,$j,1));
            ++$j;
            $hash.=strrev(base_convert(dechex($ordStr+$ordKey),16,36));
        }return $hash;
    }
    public function TheBooGeyManDecodeIdx($string,$key='PKMONEY'){
        $j=0;$hash=null;$key=sha1($key);$strLen=strlen($string);$keyLen=strlen($key);
        for($i=0;$i<$strLen;$i+=2){
            $ordStr=hexdec(base_convert(strrev(substr($string,$i,2)),36,16));
            if($j==$keyLen){$j=0;}
            $ordKey=ord(substr($key,$j,1));
            ++$j;
            $hash.=chr($ordStr-$ordKey);
        }return $hash;
    }
    function detectLanguage($text) {
        $englishPattern = '/[a-zA-Z]/';
        $thaiPattern = '/[\p{Thai}]/u'; // Unicode property for Thai characters
        if (preg_match($englishPattern, $text)) {
            return 'en';
        }
            if (preg_match($thaiPattern, $text)) {
            return 'th';
        }
        return 'Unknown';
    }
}
