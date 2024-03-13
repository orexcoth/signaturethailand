<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

use App\Models\usersModel;
use App\Models\namesModel;
use App\Models\ordersModel;
use App\Models\sellsModel;
use App\Models\sells_namesModel;
use App\Models\sells_combosModel;

use App\Models\worksModel;

class WorksController extends Controller
{
    public function BN_works_assign(Request $request)
    {

        $users = UsersModel::all();
        $names = namesModel::all();
        $orders = ordersModel::all();
        $sells = sellsModel::all();


        return view('backend/works-assign', [
            'default_pagename' => 'มอบหมายงาน',
            'users' => $users,
            'names' => $names,
            'orders' => $orders,
            'sells' => $sells,
        ]);
    }

    public function BN_works_list(Request $request)
    {
        $userlogin = auth()->user();
        $userloginid = auth()->user()->id; 

        $query = worksModel::query()
            ->where('users_id',$userloginid)
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

        return view('backend/works-list', [
            'default_pagename' => 'ตารางงาน',
            'query' => $query,
        ]);
    }

    public function BN_works_assign_action(Request $request)
    {
        // dd($request);


        if(is_array($request->users)){
            foreach($request->users as $key => $user){

                $works = new worksModel;

                $works->status = 'assign';
                $works->type = $request->type;
                $works->description = '...';
                $works->users_id = $user;

                if($request->type == 'names'){
                    $works->make = $request->names;
                }elseif($request->type == 'combos'){
                    $works->make = $request->combos;
                }elseif($request->type == 'orders'){
                    $works->make = $request->orders;
                }
                $works->save();
            }
        }


        

        return redirect()->back()->with('success', 'มอบหมายสำเร็จ !!!');
    }
}
