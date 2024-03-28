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
    public function thankPage(Request $request, $sell_id)
    {
        // dd($sell_id);
        $sell = sellsModel::find($sell_id);
        return view('frontend/thank', [
            'default_pagename' => 'homePage',
            'sell' => $sell,
        ]);
    }

    public function sell_checkout(Request $request)
    {
        // 1. Check if required fields are not null
        $requiredFields = ['firstname', 'email', 'phone', 'passcode', 'name_id', 'signs', 'type', 'package'];
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
        $newSell = new SellsModel();
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

}
