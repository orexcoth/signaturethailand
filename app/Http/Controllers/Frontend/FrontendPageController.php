<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogsSaveController;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

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
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use File;


class FrontendPageController extends Controller
{
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
            'mysignature' => $request->mysignature,
            'ProblemPreorder' => $request->ProblemPreorder,
            'DeliverSignature' => $request->DeliverSignature,
            'preorder_price' => $request->preorder_price,
        ]);
    }

    public function cartpreorderPage(Request $request)
    {
        // dd($request);
        // $name = namesModel::find($request->name_id);
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
            'mysignature' => $request->mysignature,
            'ProblemPreorder' => $request->ProblemPreorder,
            'DeliverSignature' => $request->DeliverSignature,
            'shipping' => $shipping,
            // 'name' => $name,
            // 'name_id' => $request->name_id,
            // 'signsth' => $request->signsth,
            // 'signsen' => $request->signsen,
            // 'signsall' => $request->signsall,
            // 'type' => $request->type,
            // 'package' => $request->package,
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
