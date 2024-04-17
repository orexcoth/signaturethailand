<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

use App\Models\customersModel;
use App\Models\namesModel;
use App\Models\signsModel;
use App\Models\usersModel;
use App\Models\suggestsModel;
use App\Models\OptionsModel;
use App\Models\sellsModel;
use App\Models\sells_namesModel;
use App\Models\sells_combosModel;

// use App\Models\sells_combosModel;
// use App\Models\sells_combosModel;

class ReportsController extends Controller
{
    public function BN_reports_sells(Request $request)
    {
        // $query = DB::table('sells')
        //     ->select(
        //         'sells.*',
        //         'sells_names.*',
        //         'sells_combos.*',
        //         'names.*',
        //         'sells.id as sell_id',
        //         'sells_names.id as sells_names_id',
        //         'sells_combos.id as sells_combos_id',
        //         'sells.created_at as sells_created_at',
        //         'sells.status as sells_status',
        //         'names.id as names_id'
        //     )
        //     ->leftJoin('sells_names', 'sells.id', '=', 'sells_names.sells_id')
        //     ->leftJoin('sells_combos', 'sells_names.id', '=', 'sells_combos.sells_names_id')
        //     ->leftJoin('names', 'sells_names.names_id', '=', 'names.id')
        //     ->when($request->input('combo'), function ($query, $combo) {
        //         if ($combo === 'yes') {
        //             return $query->where('sells_names.combo', 1);
        //         } elseif ($combo === 'no') {
        //             return $query->where('sells_names.combo', 0);
        //         }
        //         return $query;
        //     })
        //     ->when($request->input('combo') !== 'all', function ($query) {
        //         return $query->whereNotNull('sells_names.id');
        //     })
        //     ->paginate(10);

        // $query = SellsModel::with('customers')->orderBy('created_at', 'desc')->get();

        // $signIds = $query->flatMap(function ($sellsRecord) {
        //     return json_decode($sellsRecord->signs, true);
        // })->unique();
        // $signs = SignsModel::whereIn('id', $signIds)->get();
        // $query->each(function ($sellsRecord) use ($signs) {
        //     $sellsRecord->signs = $signs->filter(function ($sign) use ($sellsRecord) {
        //         return in_array($sign->id, json_decode($sellsRecord->signs, true));
        //     });
        // });

        $query = SellsModel::with('customers')->orderBy('created_at', 'desc');
        if ($request->has('status') && $request->input('status') !== 'all') {
            $status = $request->input('status');
            $query->where('status', $status);
        }
        if ($request->has('keyword')) {
            // Get the keyword from the request
            $keyword = $request->input('keyword');

            // Apply the keyword search
            $query->where(function ($query) use ($keyword) {
                $query->where('number', 'like', "%$keyword%")
                      ->orWhere('name_th', 'like', "%$keyword%")
                      ->orWhere('name_en', 'like', "%$keyword%")
                      ->orWhere('email', 'like', "%$keyword%")
                      ->orWhere('firstname', 'like', "%$keyword%")
                      ->orWhere('lastname', 'like', "%$keyword%");
            })->orWhereHas('customers', function ($query) use ($keyword) {
                $query->where('email', 'like', "%$keyword%")
                      ->orWhere('firstname', 'like', "%$keyword%")
                      ->orWhere('lastname', 'like', "%$keyword%");
            });
        }
        $results = $query->get();


        return view('backend/reports-sells', [
            'default_pagename' => 'การขายทั้งหมด',
            'query' => $results,
        ]);

        // $sells = SellsModel::select('sells.id', 'sells.*')
        //     ->join('customers', 'sells.customers_id', '=', 'customers.id')
        //     ->select('sells.*', 'customers.firstname as customer_firstname', 'customers.lastname as customer_lastname', 'customers.email as customer_email');
        // $sells = $sells->join('sells_names', 'sells.id', '=', 'sells_names.sells_id')
        //             ->select('sells.id', 'sells_names.combo', 'sells_names.remark');
        // $sells = $sells->join('names', 'sells_names.names_id', '=', 'names.id')
        //             ->select('sells.id', 'names.name_th', 'names.name_en', 'names.price_th', 'names.price_en');
        // if ($request->filled('combo')) {
        //     if ($request->combo == 'yes') {
        //         $sells = $sells->join('sells_combos', function ($join) {
        //             $join->on('sells_combos.sells_names_id', '=', 'sells_names.id')
        //                 ->where('sells_names.combo', '=', 1);
        //         })->select('sells.id', 'sells_combos.text', 'sells_combos.status', 'sells_combos.description');
        //     } elseif ($request->combo == 'no') {
        //         $sells = $sells->where('sells_names.combo', '=', 0);
        //     }
        // }
        // $query = $sells->paginate(10); // Assuming 10 items per page
    }
    public function BN_reports_orders(Request $request)
    {
        return view('backend/reports-orders', [
            'default_pagename' => 'การสั่งออกแบบทั้งหมด',
        ]);
    }
}
