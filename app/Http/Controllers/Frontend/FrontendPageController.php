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
use App\Models\namesModel;
use App\Models\signsModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use File;


class FrontendPageController extends Controller
{
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
        $namesth = NamesModel::select('names.*', 'signs.*', 'signs.id as signs_id')
            ->join('signs', 'names.id', '=', 'signs.names_id')
            ->where('signs.lang', '=', 'th')
            ->limit(16)
            ->get();

        return view('frontend/allproduct-th', [
            'default_pagename' => 'allproduct-en',
            'namesth' => $namesth,
        ]);
    }
    public function allproductENPage(Request $request)
    {
        $namesen = NamesModel::select('names.*', 'signs.*', 'signs.id as signs_id')
            ->join('signs', 'names.id', '=', 'signs.names_id')
            ->where('signs.lang', '=', 'en')
            ->limit(16)
            ->get();

        return view('frontend/allproduct-en', [
            'default_pagename' => 'allproduct-th',
            'namesen' => $namesen,
        ]);
    }
    public function productPage(Request $request)
    {

        $namesth = NamesModel::select('names.*', 'signs.*', 'signs.id as signs_id')
            ->join('signs', 'names.id', '=', 'signs.names_id')
            ->where('signs.lang', '=', 'th')
            ->limit(12)
            ->get();
        

        $namesen = NamesModel::select('names.*', 'signs.*', 'signs.id as signs_id')
            ->join('signs', 'names.id', '=', 'signs.names_id')
            ->where('signs.lang', '=', 'en')
            ->limit(12)
            ->get();


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
