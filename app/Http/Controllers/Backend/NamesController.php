<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// use Illuminate\Http\RedirectResponse;
// use Illuminate\Support\Facades\File;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Storage;
// use Illuminate\Auth\Events\Registered;
// use Illuminate\Validation\Rules;

use App\Models\customersModel;
use App\Models\namesModel;
use App\Models\signsModel;
use App\Models\usersModel;
use App\Models\suggestsModel;

class NamesController extends Controller
{
    public function BN_names_store(Request $request)
    {
        $query = namesModel::query()
            ->orderBy('id', 'desc');

        // if ($request->filled('keyword')) {
        //     $keyword = $request->input('keyword');
        //     $query->where(function ($query) use ($keyword) {
        //         $query->where('article_name', 'LIKE', '%' . $keyword . '%')
        //             ->orWhere('excerpt', 'LIKE', '%' . $keyword . '%')
        //             ->orWhere('content', 'LIKE', '%' . $keyword . '%');
        //     });
        // }

        $resultPerPage = 12;
        $query = $query->paginate($resultPerPage);

        return view('backend/names-store', [ 
            'default_pagename' => 'คลังรายชื่อ',
            'query' => $query,
        ]);
    }
    public function BN_names_add(Request $request)
    {
        return view('backend/names-add', [ 
            'default_pagename' => 'เพิ่มรายชื่อ',
        ]);
    }
    public function BN_names_add_action(Request $request)
    {
        // dd($request);
        $name = new namesModel;

        $name->name_th = $request->name_th;
        $name->name_en = $request->name_en;
        $name->price_th = $request->price_th;
        $name->price_en = $request->price_en;
        $name->save();

        return redirect(route('BN_names_store'))->with('success', 'สร้างสำเร็จ !!!');

    }













    
    public function BN_names_suggest(Request $request)
    {
        $query = suggestsModel::query()
            ->orderBy('id', 'desc');

        // if ($request->filled('keyword')) {
        //     $keyword = $request->input('keyword');
        //     $query->where(function ($query) use ($keyword) {
        //         $query->where('article_name', 'LIKE', '%' . $keyword . '%')
        //             ->orWhere('excerpt', 'LIKE', '%' . $keyword . '%')
        //             ->orWhere('content', 'LIKE', '%' . $keyword . '%');
        //     });
        // }

        $resultPerPage = 12;
        $query = $query->paginate($resultPerPage);

        return view('backend/names-suggest', [ 
            'default_pagename' => 'แนะนำชื่อ',
            'query' => $query,
        ]);
    }

    public function BN_names_mock_suggest(Request $request)
    {
        $suggest = new suggestsModel;
        $suggest->name_th = $request->name_th;
        $suggest->name_en = $request->name_en;
        $suggest->email = $request->email;
        $suggest->phone = $request->phone;
        $suggest->status = 'suggested';
        $suggest->save();

        return redirect()->back()->with('success', 'submit success!');
    }
}
