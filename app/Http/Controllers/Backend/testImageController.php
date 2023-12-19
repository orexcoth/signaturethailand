<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use App\Models\image_blur;
use App\Models\image_watermark;

// use Intervention\Image\Facades\Image;
// use Intervention\Image\ImageManagerStatic as Image;

class testImageController extends Controller
{
    
    public function bn_blur()
    {
        $image_blur = image_blur::query()
        // ->where('phone',$request->s)
        ->orderBy('id', 'desc')
        ->paginate(8);

        return view('backend/backend-blur', [
            'default_pagename' => 'blur',
            'image_blur' => $image_blur,
        ]);
    }
    public function bn_blur_upload(Request $request)
    {
        // dd($request);
        $request->validate([
            'path' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $image_blur = new image_blur;

        if($request->hasFile('path')){

            // $oldPath = public_path($Customer->path);
            // if(File::exists($oldPath)){
            //     File::delete($oldPath);
            // }

            $file = $request->file('path');
            $destinationPath = public_path('/uploads/blur');
            $filename = $file->getClientOriginalName();
            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            $newfilenam = uniqid().time().'-path'.'.' .$ext;
            $file->move($destinationPath, $newfilenam);
            $filepath = 'uploads/blur/'.$newfilenam;


            $img = Image::make(public_path('/uploads/blur/'.$newfilenam));
            $img->blur(10); // You can adjust the blur level as needed
            $img->save(public_path('/uploads/blur/'.$newfilenam)); 





            $image_blur->path = $filepath;
            // $image_blur->blur10 = $image_blur->phone;
            // $image_blur->blur20 = $image_blur->phone;
            // $image_blur->blur40 = $image_blur->phone;
            // $image_blur->blur60 = $image_blur->phone;
            // $image_blur->blur80 = $image_blur->phone;

            $image_blur->save();

            return redirect()->back()->with('success', 'Upload Complete!');
        }


            

        // return view('backend/backend-blur', [
        //     'default_pagename' => 'blur',
        // ]);
    }
}
