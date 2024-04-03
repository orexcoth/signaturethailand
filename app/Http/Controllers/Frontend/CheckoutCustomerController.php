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

        $stiv = "PDIV"; // Static prefix
        $timestamp = time(); // Current timestamp
        $uniq_id = uniqid(); // Unique identifier
        $gennumber = $stiv . $timestamp  . $uniq_id;
        // 5. Create new sellsModel
        $newpreorders = new preordersModel();
        $newpreorders->status = 'pending';
        $newpreorders->number = $gennumber;
        $newpreorders->customers_id = $customers_id;
        $newpreorders->total = $request->total;

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

        $newpreorders->preorder_type = $request->preorder_type;
        $newpreorders->preorder_price = $request->preorder_price;
        $newpreorders->firstname_th = $request->firstname_th;
        $newpreorders->lastname_th = $request->lastname_th;
        $newpreorders->firstname_en = $request->firstname_en;
        $newpreorders->lastname_en = $request->lastname_en;
        $newpreorders->work = $request->work;
        $newpreorders->finance = $request->finance;
        $newpreorders->love = $request->love;
        $newpreorders->health = $request->health;
        $newpreorders->fortune = $request->fortune;
        $newpreorders->TargetPreorder = $request->TargetPreorder;
        $newpreorders->name = $request->name;
        $newpreorders->dob = $request->dob;
        $newpreorders->telephone = $request->telephone;
        $newpreorders->SelectStatus = $request->SelectStatus;
        $newpreorders->occupation = $request->occupation;
        $newpreorders->EverSignature = $request->EverSignature;
        $newpreorders->mysignature = $request->mysignature;
        $newpreorders->ProblemPreorder = $request->ProblemPreorder;
        $newpreorders->DeliverSignature = $request->DeliverSignature;
        // Assuming you also need to store other fields from the request in SellsModel
        // Add them as necessary
        // dd($newpreorders);
        $newpreorders->save();

        // Optionally, return success response with sell ID
        return redirect(route('thankPage', ['sell_id' => $newpreorders->id]))->with('success', 'สร้างสำเร็จ !!!');

    }







    public function sell_checkout(Request $request)
    {
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
        $gennumber = $stiv . $timestamp  . $uniq_id;
        // 5. Create new sellsModel
        $newSell = new sellsModel();
        $newSell->status = 'pending';
        $newSell->number = $gennumber;
        $newSell->customers_id = $customers_id;
        $newSell->total = $request->total;
        $newSell->firstname = $request->firstname;
        $newSell->lastname = $request->lastname;
        $newSell->email = $request->email;
        $newSell->phone = $request->phone;
        $newSell->passcode = $request->passcode;
        // Assuming you also need to store other fields from the request in SellsModel
        // Add them as necessary
        $newSell->save();

        // Optionally, return success response with sell ID
        return redirect(route('thankPage', ['sell_id' => $newSell->id]))->with('success', 'สร้างสำเร็จ !!!');

    }






    public function thankPage(Request $request, $sell_id)
    {
        // dd($sell_id);
        $sell = sellsModel::find($sell_id);
        return view('frontend/thank', [
            'default_pagename' => 'homePage',
            'sell' => $sell,
        ]);
    }

}
