<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// use Illuminate\Http\RedirectResponse;
// use Illuminate\Support\Facades\File;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Storage;
// use Illuminate\Auth\Events\Registered;
// use Illuminate\Validation\Rules;

use App\Models\customersModel;

class CustomersController extends Controller
{
    public function BN_customers(Request $request)
    {
        $query = customersModel::query()
            ->orderBy('id', 'desc');

        // if ($request->filled('keyword')) {
        //     $keyword = $request->input('keyword');
        //     $query->where(function ($query) use ($keyword) {
        //         $query->where('name', 'LIKE', '%' . $keyword . '%')
        //             ->orWhere('email', 'LIKE', '%' . $keyword . '%');
        //     });
        // }

        $resultPerPage = 24;
        $query = $query->paginate($resultPerPage);

        return view('backend/customers', [ 
            'default_pagename' => 'ลูกค้า',
            'query' => $query,
        ]);
    }

    public function BN_customers_add(Request $request)
    {
        // $provinces = provincesModel::all();
        return view('backend/customers-add', [ 
            'default_pagename' => 'เพิ่มรายชื่อลูกค้า',
            // 'provinces' => $provinces,
        ]);
    }

    public function BN_customers_add_action(Request $request)
    {
        // dd($request);
        $Customer = new customersModel;

        $Customer->firstname = $request->firstname;
        $Customer->lastname = $request->lastname;
        $Customer->email = $request->email;
        $Customer->password = Hash::make($request->password);
        $Customer->role = $request->role;
        $Customer->phone = $request->phone;
        $Customer->line = $request->line;

        $Customer->save();


        return redirect(route('BN_customers'))->with('success', 'บันทึกข้อมูลสำเร็จ !!!');

    }
}