<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogsSaveController;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

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
    
    public function preorder_checkout(Request $request)
    {
        // dd($request);
        // 1. Check if required fields are not null
        $requiredFields = ['firstname', 'email', 'phone', 'package', 'preorder_type'];
        foreach ($requiredFields as $field) {
            if (!$request->has($field)) {
                return response()->json(['error' => 'Missing required field: ' . $field], 400);
            }
        }

        // 2. Check if email exists in customersModel
        $customer = CustomersModel::where('email', $request->email)->first();
        // dd($customer);
        if ($customer) {
            $customers_id = $customer->id;
        } else {
            // 3. Check if phone exists in customersModel
            $customer = CustomersModel::where('phone', $request->phone)->first();
            if ($customer) {
                $customers_id = $customer->id;
            } else {
                // 4. Create new customer if not found
                $newCustomer = new CustomersModel();
                $newCustomer->role = 'normal';
                $newCustomer->username = $request->email;
                $newCustomer->password = Hash::make($request->passcode);
                $newCustomer->firstname = $request->firstname;
                $newCustomer->lastname = $request->lastname;
                $newCustomer->email = $request->email;
                $newCustomer->phone = $request->phone;
                $newCustomer->save();
                $customers_id = $newCustomer->id;
            }
        }
        // dd($customers_id);

        $stiv = "PDIV"; // Static prefix
        $timestamp = time(); // Current timestamp
        $uniq_id = uniqid(); // Unique identifier
        // $gennumber = $stiv . $timestamp  . $uniq_id;
        $gennumber = strtoupper($stiv . $uniq_id);
        // 5. Create new sellsModel
        $newpreorders = new preordersModel();
        $newpreorders->status = 'pending';
        $newpreorders->number = $gennumber;
        $newpreorders->customers_id = $customers_id;
        $newpreorders->total = $request->preorder_price;

        $newpreorders->firstname = $request->firstname;
        $newpreorders->lastname = $request->lastname;
        $newpreorders->email = $request->email;
        $newpreorders->phone = $request->phone;

        $newpreorders->shipping_method = 'shipping_method';
        $newpreorders->shipping_detail = 'shipping_detail';
        $newpreorders->payment_method = 'payment_method';
        $newpreorders->payment_qr = 'payment_qr';
        $newpreorders->payment_status = 'payment_status';
        $newpreorders->payment_date = now();

        $newpreorders->package = $request->package;
        $newpreorders->preorder_type = $request->preorder_type;
        $newpreorders->preorder_price = $request->preorder_price;
        $newpreorders->total_price = $request->total_price;
        $newpreorders->shipping_price = $request->shipping_price;
        $newpreorders->firstname_th = $request->firstname_th;
        $newpreorders->lastname_th = $request->lastname_th;
        $newpreorders->firstname_en = $request->firstname_en;
        $newpreorders->lastname_en = $request->lastname_en;
        $newpreorders->prominence_1 = $request->prominence_1;
        $newpreorders->prominence_2 = $request->prominence_2;
        $newpreorders->prominence_3 = $request->prominence_3;
        $newpreorders->prominence_4 = $request->prominence_4;
        $newpreorders->prominence_5 = $request->prominence_5;
        $newpreorders->TargetPreorder = $request->TargetPreorder;
        $newpreorders->name = $request->name;
        $newpreorders->dob = $request->dob;
        $newpreorders->telephone = $request->telephone;
        $newpreorders->SelectStatus = $request->SelectStatus;
        $newpreorders->occupation = $request->occupation;
        $newpreorders->EverSignature = $request->EverSignature;
        $newpreorders->mysignature = $request->mysignaturePath;
        $newpreorders->ProblemPreorder = $request->ProblemPreorder;
        $newpreorders->DeliverSignature = $request->DeliverSignature;
        $newpreorders->agree = $request->agree;
        // Assuming you also need to store other fields from the request in SellsModel
        // Add them as necessary
        // dd($newpreorders);
        $newpreorders->save();

        
        $getauto_assign = OptionsModel::where('option_key', 'auto_assign')->first();
        $auto_assign = $getauto_assign->option_value;
        if ($auto_assign == 'yes') {
            $allusers = usersModel::get();
            if (!$allusers->isEmpty()) {
                foreach ($allusers as $user) {
                    $works = new worksModel;
                    $works->status = 'assign';
                    $works->type = 'preorders';
                    $works->description = '...';
                    $works->users_id = $user->id;
                    $works->make = $newpreorders->id;               
                    $works->save();
                }
            } else {
                // Handle the case where no users are found
            }
        }
        // dd($newpreorders);
            

        return redirect(route('paymentPage', ['type' => 'preorder', 'order' => $newpreorders->id]));
        // Optionally, return success response with sell ID
        // return redirect(route('thankPage', ['preorders_id' => $newpreorders->id]))->with('success', 'สร้างสำเร็จ !!!');

    }







    public function sell_checkout(Request $request)
    {
        // dd($request);
        // 1. Check if required fields are not null
        $requiredFields = ['firstname', 'email', 'phone', 'name_id', 'signs', 'type', 'package'];
        foreach ($requiredFields as $field) {
            if (!$request->has($field)) {
                return response()->json(['error' => 'Missing required field: ' . $field], 400);
            }
        }

        // 2. Check if email exists in customersModel
        $customer = CustomersModel::where('email', $request->email)->first();
        if ($customer) {
            $customers_id = $customer->id;
        } else {
            // 3. Check if phone exists in customersModel
            $customer = CustomersModel::where('phone', $request->phone)->first();
            if ($customer) {
                $customers_id = $customer->id;
            } else {
                // 4. Create new customer if not found
                $newCustomer = new CustomersModel();
                $newCustomer->role = 'normal';
                $newCustomer->username = $request->email;
                $newCustomer->password = Hash::make($request->passcode);
                $newCustomer->firstname = $request->firstname;
                $newCustomer->lastname = $request->lastname;
                $newCustomer->email = $request->email;
                $newCustomer->phone = $request->phone;
                $newCustomer->save();
                $customers_id = $newCustomer->id;
            }
        }

        $stiv = "STIV"; // Static prefix
        $timestamp = time(); // Current timestamp
        $uniq_id = uniqid(); // Unique identifier
        // $gennumber = $stiv . $timestamp  . $uniq_id;
        $gennumber = strtoupper($stiv . $uniq_id);
        // 5. Create new sellsModel
        $newSell = new sellsModel();
        $newSell->status = 'pending';
        $newSell->number = $gennumber;
        $newSell->customers_id = $customers_id;
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
        // $newSell->payment_qr = 'qrcodegenerate';
        $newSell->payment_status = 'pending';
        // dd($newSell);

        // dd($newSell);
        // $newSell->passcode = $request->passcode;
        // Assuming you also need to store other fields from the request in SellsModel
        // Add them as necessary
        $newSell->save();

        // Optionally, return success response with sell ID
        // return redirect(route('thankPage'))->with('success', 'สร้างสำเร็จ !!!');
        return redirect(route('paymentPage', ['type' => 'sell', 'order' => $newSell->id]));
        // return redirect(route('thankPage', ['sells_id' => $newSell->id]))->with('success', 'สร้างสำเร็จ !!!');

    }






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
