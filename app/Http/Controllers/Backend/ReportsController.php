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
use App\Models\preordersModel;
use App\Models\preorders_signsModel;

use App\Exports\SellsExport;
use App\Exports\preordersExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
// use App\Models\sells_combosModel;
// use App\Models\sells_combosModel;
use App\Models\User;
// use App\Models\usersModel;

class ReportsController extends Controller
{


    public function BN_reports_users(Request $request)
    {
        // dd($request);
        $query = User::withCount(['signs', 'preordersTurnIns'])
            ->with(['signs', 'preordersTurnIns'])
            ->get();


        // dd($query);

        return view('backend/reports-users', [
            'default_pagename' => 'ข้อมูลนักออกแบบ',
            'query' => $query,
        ]); 
    }





    public function BN_reports_sells_detail(Request $request, $sells_id)
    {
        $query = SellsModel::with('customers')->find($sells_id);
        return view('backend/reports-sells-detaiil', [
            'default_pagename' => 'รายละเอียดรายการ',
            'query' => $query,
        ]);
    }
    public function BN_reports_sells_exportToExcel(Request $request)
    {
        $status = $request->input('status', 'all');
        $keyword = $request->input('keyword', null);
        $fileName = 'รายงานการดาวน์โหลด-' . Carbon::now()->format('dmY-His') . '.xlsx';
        return Excel::download(new SellsExport($status, $keyword), $fileName);
    }
    public function BN_reports_sells(Request $request)
    {
        $query = SellsModel::with('customers')->orderBy('created_at', 'desc');
        // dd($query);
        if ($request->has('status') && $request->input('status') !== 'all') {
            $status = $request->input('status');
            $query->where('status', $status);
        }
        if ($request->has('keyword')) {
            $keyword = $request->input('keyword');
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

        // dd($results);
        return view('backend/reports-sells', [
            'default_pagename' => 'การขายทั้งหมด',
            'query' => $results,
        ]); 
    }






    public function BN_reports_preorders_detail(Request $request, $preorders_id)
    {
        $query = preordersModel::with('customer')->find($preorders_id);
        return view('backend/reports-preorders-detail', [
            'default_pagename' => 'รายละเอียดรายการ',
            'query' => $query,
        ]);
    }
    public function BN_reports_preorders_exportToExcel(Request $request)
    {
        $status = $request->input('status', 'all');
        $keyword = $request->input('keyword', null);
        $fileName = 'รายงานการสั่งออกแบบ-' . Carbon::now()->format('dmY-His') . '.xlsx';
        return Excel::download(new preordersExport($status, $keyword), $fileName);
    }
    public function BN_reports_preorders(Request $request)
    {
        $query = preordersModel::with('customer')->orderBy('created_at', 'desc');
        if ($request->has('status') && $request->input('status') !== 'all') {
            $status = $request->input('status');
            $query->where('status', $status);
        }
        if ($request->has('keyword')) {
            $keyword = $request->input('keyword');
            $query->where(function ($query) use ($keyword) {
                $query->where('number', 'like', "%$keyword%")
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

        // dd($results);
        return view('backend/reports-preorders', [
            'default_pagename' => 'การสั่งออกแบบทั้งหมด',
            'query' => $results,
        ]);
    }
}
