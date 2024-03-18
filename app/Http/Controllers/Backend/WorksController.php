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

        // $query = worksModel::query()
        //     ->where('users_id',$userloginid)
        //     ->orderBy('id', 'desc');

        // $resultPerPage = 24;
        // $query = $query->paginate($resultPerPage);






        // Initialize $query variable
$query = null;

// Retrieve worksModel instance
$worksModel = worksModel::query()->where('users_id', $userloginid)->orderBy('id', 'desc')->first();

if ($worksModel) {
    // Access 'type' property of the $worksModel instance
    $type = $worksModel->type;

    // Modify query based on the type
    if ($type === 'combos') {
        $query = worksModel::query()->where('users_id', $userloginid)
            ->leftJoin('sells', 'sells.work_id', '=', 'works.id')
            ->select('sells.sell_number as number')
            ->orderBy('id', 'desc');
    } elseif ($type === 'orders') {
        $query = worksModel::query()->where('users_id', $userloginid)
            ->leftJoin('orders', 'orders.work_id', '=', 'works.id')
            ->select('orders.order_number as number')
            ->orderBy('id', 'desc');
    } else {
        // Handle other cases if needed
    }
}

// Paginate the modified query if $query is set
if ($query) {
    $resultPerPage = 24;
    $results = $query->paginate($resultPerPage);
}

// Pass $query to the view along with other necessary data
return view('backend/works-list', [
    'default_pagename' => 'ตารางงาน',
    'query' => $query,
]);











        // if ($query->type === 'combos') {
        //     $query->join('sells', 'sells.sell_number', '=', 'number');
        //     $query->select('sells.sell_number as number');
        // } elseif ($query->type === 'orders') {
        //     $query->join('sells', 'sells.order_number', '=', 'number');
        //     $query->select('sells.order_number as number');
        // }

        // if ($request->filled('keyword')) {
        //     $keyword = $request->input('keyword');
        //     $query->where(function ($query) use ($keyword) {
        //         $query->where('name', 'LIKE', '%' . $keyword . '%')
        //             ->orWhere('email', 'LIKE', '%' . $keyword . '%');
        //     });
        // }

        

        // return view('backend/works-list', [
        //     'default_pagename' => 'ตารางงาน',
        //     'query' => $query,
        // ]);
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
