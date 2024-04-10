<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogsSaveController;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

// use App\Models\Sms_session;
// use App\Models\provincesModel;
// use App\Models\brandsModel;
// use App\Models\modelsModel;
// use App\Models\generationsModel;
// use App\Models\sub_modelsModel;
// use App\Models\carsModel;
// use App\Models\categoriesModel;
// use App\Models\setFooterModel;
// use App\Models\setting_optionModel;
// use App\Models\contactsModel;
// use App\Models\contacts_backModel;
// use App\Models\newsModel;
// use App\Models\noticeModel;
use App\Models\OptionsModel;
use App\Models\namesModel;
use App\Models\signsModel;
use App\Models\customersModel;

use App\Models\preordersModel;
use App\Models\preorders_signs;
use App\Models\sellsModel;
use App\Models\sells_namesModel;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use File;


class FrontendPageController extends Controller
{

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

        return view('frontend.detailsignature', [
            'layout' => 'side-menu',
            'sign' => $sign, // Pass the sells data to the view
        ]);
    }
    // public function historydetailsignatureforsellsPage(Request $request, $sells_id, $signs_id)
    // {
    //     return view('frontend/detailsignature', [
    //         'layout' => 'side-menu',
    //     ]);
    // }

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





        // If the customer session is not available, redirect to historyloginPage
        if (!$customer) {
            return redirect()->route('historyloginPage');
        }

        return view('frontend.history', [
            'default_pagename' => 'history',
            'customer' => $customer,
            'getpreorders' => $getpreorders,
            'getsells' => $getsells,
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


        return view('frontend/preorder', [
            'default_pagename' => 'preorder',
            'firstname_th' => $firstname_th ? $firstname_th->option_value : 0,
            'lastname_th' => $lastname_th ? $lastname_th->option_value : 0,
            'firstname_en' => $firstname_en ? $firstname_en->option_value : 0,
            'lastname_en' => $lastname_en ? $lastname_en->option_value : 0,
        ]);
    }



    public function searchPage(Request $request)
    {
        $keyword = $request->input('keyword');

        if (!empty($keyword)) {
            // Perform the search query
            // $names = NamesModel::whereHas('signs', function ($query) use ($keyword) {
            //     $query->where('name_th', 'like', '%' . $keyword . '%')
            //         ->orWhere('name_en', 'like', '%' . $keyword . '%');
            // })->distinct()->get();
            $names = NamesModel::where('name_th', 'like', '%' . $keyword . '%')
                  ->orWhere('name_en', 'like', '%' . $keyword . '%')
                  ->distinct()
                  ->orderBy('name_th')
                //   ->orderBy('name_en')
                  ->paginate(24);

            // dd($names);
            // If at least one result found, return the results
            if ($names->count() > 0) {
                return view('frontend.search', [
                    'default_pagename' => 'search',
                    'query' => $names,
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
            'default_pagename' => 'homePage',
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
            'default_pagename' => 'allproduct-th',
            'namesen' => $namesen,
        ]);
    }
    public function productPage(Request $request)
    {
            
        $namesen = NamesModel::whereHas('signs', function ($query) {
                $query->where('lang', 'en');
            })
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
            'default_pagename' => 'homePage',
            'namesth' => $namesth,
            'namesen' => $namesen,
        ]);
    }
    public function articlePage(Request $request)
    {
        return view('frontend/performance', [
            'default_pagename' => 'homePage',
        ]);
    }
    public function teamPage(Request $request)
    {
        return view('frontend/performance', [
            'default_pagename' => 'homePage',
        ]);
    }
    public function contactPage(Request $request)
    {
        return view('frontend/performance', [
            'default_pagename' => 'homePage',
        ]);
    }
    public function aboutPage(Request $request)
    {
        return view('frontend/about', [
            'default_pagename' => 'homePage',
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
        return view('frontend/index', [
            'layout' => 'side-menu',
            // 'categories' => $categories,
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
}
