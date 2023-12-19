<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogsSaveController;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Models\modelsModel;
use App\Models\brandsModel;
use App\Models\generationsModel;
use App\Models\sub_modelsModel;
use App\Models\setFooterModel;
use App\Models\setting_optionModel;

class BackendPageController extends Controller
{
    public function backendDashboard()
    {
        return view('backend/backend-dashboard', [
            // 'layout' => 'side-menu',
            'default_pagename' => 'แดชบอร์ด',
        ]);
    }
    




    // public function BN_slide()
    // {
    //     $slide = DB::table('setting_option')->where('key_option', 'slide')->first();
    //     $decde = json_decode($slide->value_option);
    //     return view('backend/setting-slide', [ 
    //         'default_pagename' => 'ตั้งค่าแบนเนอร์',
    //         'slide' => $decde,
            
    //     ]);
    // }
    // public function BN_slidedelete(Request $request)
    // {
    //     $query = DB::table('setting_option')->where('key_option', 'slide')->first();
    //     $decde = json_decode($query->value_option);


    //     $newarr = [];
    //     foreach($decde as $keydecde => $decode){
    //         if($keydecde == $request->key){
    //             $oldPath = public_path($decode);
    //             if(File::exists($oldPath)){
    //                 File::delete($oldPath);
    //             }
    //         }else{
    //             $newarr[] = $decode;
    //         }
            
    //     }
    //     $newval = '';
    //     $encde = json_encode($newarr, true);
    //     if(isset($encde)){$newval = $encde;}
        
    //     $setting_optionModel = setting_optionModel::find($query->id);
    //     $setting_optionModel->value_option = $newval;
    //     $setting_optionModel->update();


    //     return redirect()->back()->with('success', 'ลบสำเร็จ !');

    // }
    // public function BN_slideupdate(Request $request)
    // {
    //     $query = DB::table('setting_option')->where('key_option', 'slide')->first();
    //     $decde = json_decode($query->value_option);
    //     foreach($decde as $keydecde => $decode){
    //         $oldPath = public_path($decode);
    //         if(File::exists($oldPath)){
    //             File::delete($oldPath);
    //         }
    //     }

    //     $arr_path = [];
    //     if($request->hasFile('banner1')){
    //         $file = $request->file('banner1');
    //         $destinationPath = public_path('/uploads/banner');
    //         $filename = $file->getClientOriginalName();

    //         $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    //         $newfilenam = 'banner1-'.time() .uniqid() . '.' .$ext;
    //         $file->move($destinationPath, $newfilenam);
    //         $filepath = 'uploads/banner/'.$newfilenam;
    //         $arr_path[] = $filepath;
    //     }
    //     if($request->hasFile('banner2')){
    //         $file = $request->file('banner2');
    //         $destinationPath = public_path('/uploads/banner');
    //         $filename = $file->getClientOriginalName();

    //         $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    //         $newfilenam = 'banner2-'.time() .uniqid() . '.' .$ext;
    //         $file->move($destinationPath, $newfilenam);
    //         $filepath = 'uploads/banner/'.$newfilenam;
    //         $arr_path[] = $filepath;
    //     }
    //     if($request->hasFile('banner3')){
    //         $file = $request->file('banner3');
    //         $destinationPath = public_path('/uploads/banner');
    //         $filename = $file->getClientOriginalName();

    //         $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    //         $newfilenam = 'banner3-'.time() .uniqid() . '.' .$ext;
    //         $file->move($destinationPath, $newfilenam);
    //         $filepath = 'uploads/banner/'.$newfilenam;
    //         $arr_path[] = $filepath;
    //     }
    //     if($request->hasFile('banner4')){
    //         $file = $request->file('banner4');
    //         $destinationPath = public_path('/uploads/banner');
    //         $filename = $file->getClientOriginalName();

    //         $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    //         $newfilenam = 'banner4-'.time() .uniqid() . '.' .$ext;
    //         $file->move($destinationPath, $newfilenam);
    //         $filepath = 'uploads/banner/'.$newfilenam;
    //         $arr_path[] = $filepath;
    //     }
    //     $newval = '';
    //     $encde = json_encode($arr_path, true);
    //     if(isset($encde)){$newval = $encde;}
        
    //     $setting_optionModel = setting_optionModel::find($query->id);
    //     $setting_optionModel->value_option = $newval;
    //     $setting_optionModel->update();
        
        
    //     return redirect()->back()->with('success', 'แก้ไขสำเร็จ !');
    // }
    // public function BN_termcondition()
    // {
    //     $termcondition = DB::table('setting_option')->where('key_option', 'termcondition')->first();
    //     return view('backend/setting-termcondition', [ 
    //         'default_pagename' => 'ข้อกำหนดในการให้บริการ',
    //         'termcondition' => $termcondition,
            
    //     ]);
    // }
    // public function BN_termcondition_update(Request $request)
    // {
    //     $query = DB::table('setting_option')->where('key_option', 'termcondition')->first();
    //     $setting_optionModel = setting_optionModel::find($query->id);
    //     $setting_optionModel->value_option = $request->termcondition;
    //     $setting_optionModel->update();
    //     return redirect()->back()->with('success', 'แก้ไขสำเร็จ !');
    // }
    // public function BN_privacypolicy()
    // {
    //     $privacypolicy = DB::table('setting_option')->where('key_option', 'privacypolicy')->first();
    //     return view('backend/setting-privacypolicy', [ 
    //         'default_pagename' => 'นโยบายความเป็นส่วนตัว',
    //         'privacypolicy' => $privacypolicy,
            
    //     ]);
    // }
    // public function BN_privacypolicy_update(Request $request)
    // {
    //     $query = DB::table('setting_option')->where('key_option', 'privacypolicy')->first();
    //     $setting_optionModel = setting_optionModel::find($query->id);
    //     $setting_optionModel->value_option = $request->privacypolicy;
    //     $setting_optionModel->update();
    //     return redirect()->back()->with('success', 'แก้ไขสำเร็จ !');
    // }
    // public function BN_setfooter()
    // {

    //     $setFooterModel = DB::table('footer_setting')->where('page', 'index')->get();
    //     return view('backend/setting-setfooter', [ 
    //         'default_pagename' => 'ตั้งค่า footer',
    //         'setFooterModel' => $setFooterModel,
            
    //     ]);
    // }
    // public function BN_setfooterupdate(Request $request)
    // {
    //     $getdata = $request->except('_token');
    //     $label = [];
    //     $use = [];
    //     $create = [];

    //     foreach($getdata as $keydatalabel => $datalabel){
    //         $expld = explode("_", $keydatalabel);
    //         $count = count($expld);
    //         if($count == 1){
    //             $label[$expld[0]] = $datalabel;
    //         }
    //     }
        
    //     foreach($getdata as $keydata => $data){
    //         $expld = explode("_", $keydata);
    //         $count = count($expld);
    //         if($count == 2){

    //             $expldname = explode("_name", $keydata);
    //             $countname = count($expldname);
    //             if($countname == 2){
    //                 $create[$expldname[0]][$expldname[1]]['name'] = $data;
    //                 $create[$expldname[0]][$expldname[1]]['footer_name'] = $keydata;
    //                 $create[$expldname[0]][$expldname[1]]['head'] = $expldname[0];
    //             }
    //             $expldlink = explode("_link", $keydata);
    //             $countlink = count($expldlink);
    //             if($countlink == 2){
    //                 $create[$expldlink[0]][$expldlink[1]]['link'] = $data;
    //                 $create[$expldlink[0]][$expldlink[1]]['footer_link'] = $keydata;
    //             }
    //         }
            
    //     }
    //     $cc = 0;
    //     foreach($create as $keyforsave => $forsave){
            
            
    //         foreach($forsave as $keysave => $save){
    //             $cc++;
    //                 ${'footer_setting'.$cc} = DB::table('footer_setting')->where('footer_name', $save['footer_name'])->first();
    //                 $ids = ${'footer_setting'.$cc}->id;

    //                 ${'setting'.$cc} = setFooterModel::find($ids);
    //                 ${'setting'.$cc}->heading = $label[$save['head']];
    //                 ${'setting'.$cc}->name = $save['name'];
    //                 ${'setting'.$cc}->link = $save['link'];
    //                 ${'setting'.$cc}->update();
    //         }
    //     }


        // echo "<pre>";
        // print_r($label);
        // echo "</pre>";
            
        // $footer

        
        // return redirect()->back()->with('success', 'แก้ไขสำเร็จ !');

        // $query = setFooterModel::all()->sort();
        // foreach($query as $keyq => $qry){

        //     $setFooterModel = setFooterModel::find($qry->id);
        //     $setFooterModel->name = $request->$setFooterModel->footer_name;
        //     $setFooterModel->link = $request->$setFooterModel->footer_link;

        //     echo "<pre>";
        //     print_r($request->$setFooterModel->footer_name);
        //     echo "</pre>";
        // }
        // dd($query);

        

        

        // foreach($request as $key => $qry){
        //     $setFooterModel = new setFooterModel;
        //     $setFooterModel->name = $qry;
        //     $setFooterModel->save();
        //     echo "<pre>";
        //     print_r($qry->parameters);
        //     echo "</pre>";
        // }

        // echo "<pre>";
        // print_r($request);
        // echo "</pre>";
        
        
        // 
        // foreach($query as $key => $qry){
        //     echo "<pre>";
        //     print_r($qry);
        //     echo "</pre>";
        // }

        // 
        // return view('backend/setting-setfooter', [ 
        //     'default_pagename' => 'ตั้งค่า footer',
            
        // ]);

        // for($i=1;$i<=8;$i++){
        //     for($j=1;$j<=6;$j++){
        //         $hhhead = 'head'.$i;
        //         $nnname = 'head'.$i.'_name'.$j;
        //         $lllink = 'head'.$i.'_link'.$j;
        //         $setFooterModel = new setFooterModel;
        //         $setFooterModel->heading = $hhhead;
        //         $setFooterModel->name = $nnname;
        //         $setFooterModel->footer_name = $nnname;
        //         $setFooterModel->footer_link = $lllink;
        //         $setFooterModel->save();
        //     }
        // }
    // }

    // public function BN_generations()
    // {
    //     return view('backend/models', [ 
    //         'default_pagename' => 'โฉมรถ',
    //     ]);
    // }
    // public function BN_car()
    // {
    //     return view('backend/car', [ 
    //         'default_pagename' => 'ข้อมูลรถ',
            
    //     ]);
    // }

    

    // public function BN_modelsss()
    // {
    //     return view('backend/backend-dashboard', [ 
    //         'default_pagename' => 'แท็ก',
            
    //     ]);
    // }



    
    // public function BN_tags()
    // {
    //     return view('backend/backend-dashboard', [ 
    //         'default_pagename' => 'แท็ก',
            
    //     ]);
    // }
    
    
    // public function BN_setting()
    // {
    //     return view('backend/backend-dashboard', [ 
    //         'default_pagename' => 'ตั้งค่าระบบ',
    //     ]);
    // }
    
    
    // public function BN_dev()
    // {
    //     return view('backend/dev', [ 
    //         'default_pagename' => 'Development',
    //     ]);
    // }
    

    
    
}
