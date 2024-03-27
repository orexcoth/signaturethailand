<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogsSaveController;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Sms_session;
use App\Models\provincesModel;
use App\Models\brandsModel;
use App\Models\modelsModel;
use App\Models\generationsModel;
use App\Models\sub_modelsModel;
use App\Models\carsModel;
use App\Models\categoriesModel;
use App\Models\setFooterModel;
use App\Models\setting_optionModel;
use App\Models\contactsModel;
use App\Models\contacts_backModel;
use App\Models\newsModel;
use App\Models\noticeModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use File;


class FrontendPageController extends Controller
{

    public function aboutPage(Request $request)
    {
        return view('frontend/about', [
            'default_pagename' => 'homePage',
        ]);
    }
    public function productPage(Request $request)
    {
        return view('frontend/performance', [
            'default_pagename' => 'homePage',
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
