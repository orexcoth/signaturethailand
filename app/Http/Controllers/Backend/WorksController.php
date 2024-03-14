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

        $sells = DB::table('sells')
            ->select(
                'sells.*',
                'sells_names.*',
                'sells_combos.*',
                'names.*',
                'sells.id as sell_id',
                'sells_names.id as sells_names_id',
                'sells_combos.id as sells_combos_id',
                'sells.created_at as sells_created_at',
                'sells.status as sells_status',
                'names.id as names_id'
            )
            ->leftJoin('sells_names', 'sells.id', '=', 'sells_names.sells_id')
            ->leftJoin('sells_combos', 'sells_names.id', '=', 'sells_combos.sells_names_id')
            ->leftJoin('names', 'sells_names.names_id', '=', 'names.id')
            ->where('sells_names.combo', 1)
            ->get();


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
