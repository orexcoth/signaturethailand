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
use App\Models\downloadsModel;

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

    public function BN_reports_users_detail_download(Request $request, $users_id)
    {
        $user = User::find($users_id);
        $startDate = null;
        $endDate = null;
        if ($request->has('period')) {
            $dateRange = explode(" - ", $request->period);
            $startDate = Carbon::createFromFormat('j M, Y', trim($dateRange[0]))->startOfDay();
            $endDate = Carbon::createFromFormat('j M, Y', trim($dateRange[1]))->endOfDay();
        }
        $query = User::query();
        if ($users_id) {
            $query->where('id', $users_id);
        }
        if ($startDate && $endDate) {
            $query->withCount([
                'signs' => function ($query) use ($startDate, $endDate) {
                    $query->whereBetween('created_at', [$startDate, $endDate]);
                }
            ])->with([
                'signs' => function ($query) use ($startDate, $endDate) {
                    $query->whereBetween('created_at', [$startDate, $endDate])->with('downloads');
                }
            ]);
        } else {
            $query->withCount(['signs', 'preordersTurnIns'])
                ->with(['signs', 'preordersTurnIns']);
        }
        $results = $query->get();
        if ($results->isNotEmpty()) {
            $firstUser = $results->first();
            $downloadsCount = downloadsModel::whereHas('sign', function ($query) use ($firstUser) {
                $query->where('users_id', $firstUser->id);
            })->count();
            $firstUser->downloads_count = $downloadsCount;
            $getdata = $firstUser;
        } else {
            $getdata = null;
        }
        $period = $request->query('period');  
        
        // $sellsWithDownloads = sellsModel::whereHas('downloads', function($query) use ($users_id) {
        //     $query->where('sells_id', $users_id);
        // })->get();
        // dd($sellsWithDownloads);
        return view('backend/reports-users-detail-download', [
            'default_pagename' => 'รายละเอียดรายการ',
            'period' => $period,
            'query' => $getdata->signs,
        ]);
    }


    public function BN_reports_users_detail_turnin(Request $request, $users_id)
    {
        $user = User::find($users_id);
        $startDate = null;
        $endDate = null;
        if ($request->has('period')) {
            $dateRange = explode(" - ", $request->period);
            $startDate = Carbon::createFromFormat('j M, Y', trim($dateRange[0]))->startOfDay();
            $endDate = Carbon::createFromFormat('j M, Y', trim($dateRange[1]))->endOfDay();
        }
        $query = User::query();
        if ($users_id) {
            $query->where('id', $users_id);
        }
        if ($startDate && $endDate) {
            $query->withCount([
                'preordersTurnIns' => function ($query) use ($startDate, $endDate) {
                    $query->whereBetween('created_at', [$startDate, $endDate]);
                }
            ])->with([
                'preordersTurnIns' => function ($query) use ($startDate, $endDate) {
                    $query->whereBetween('created_at', [$startDate, $endDate])->with('preorder');
                }
            ]);
        } else {
            $query->withCount(['signs', 'preordersTurnIns'])
                ->with(['signs', 'preordersTurnIns']);
        }
        $results = $query->get();
        if ($results->isNotEmpty()) {
            $firstUser = $results->first();
            $getdata = $firstUser;
        } else {
            $getdata = null;
        }
        $period = $request->query('period');   
        // dd($getdata->preordersTurnIns);
        return view('backend/reports-users-detail-turnin', [
            'default_pagename' => 'รายละเอียดรายการ',
            'period' => $period,
            'query' => $getdata->preordersTurnIns,
        ]);
    }

    public function BN_reports_users_detail_sign(Request $request, $users_id)
    {
        
        $user = User::find($users_id);
        $startDate = null;
        $endDate = null;
        if ($request->has('period')) {
            $dateRange = explode(" - ", $request->period);
            $startDate = Carbon::createFromFormat('j M, Y', trim($dateRange[0]))->startOfDay();
            $endDate = Carbon::createFromFormat('j M, Y', trim($dateRange[1]))->endOfDay();
        }
        $query = User::query();
        if ($users_id) {
            $query->where('id', $users_id);
        }
        if ($startDate && $endDate) {
            $query->withCount([
                'signs' => function ($query) use ($startDate, $endDate) {
                    $query->whereBetween('created_at', [$startDate, $endDate]);
                }
            ])->with([
                'signs' => function ($query) use ($startDate, $endDate) {
                    $query->whereBetween('created_at', [$startDate, $endDate])->with('name');
                }
            ]);
        } else {
            $query->withCount(['signs', 'preordersTurnIns'])
                ->with(['signs', 'preordersTurnIns']);
        }
        $results = $query->get();
        if ($results->isNotEmpty()) {
            $firstUser = $results->first();
            $getdata = $firstUser;
        } else {
            $getdata = null;
        }
        $period = $request->query('period');   
        // dd($getdata->signs);
        return view('backend/reports-users-detail-sign', [
            'default_pagename' => 'รายละเอียดรายการ',
            'period' => $period,
            'query' => $getdata->signs,
        ]);
    }
    
    
    public function BN_reports_users_detail(Request $request, $users_id)
    {
        $user = User::find($users_id);
        $startDate = null;
        $endDate = null;
        if ($request->has('period')) {
            $dateRange = explode(" - ", $request->period);
            $startDate = Carbon::createFromFormat('j M, Y', trim($dateRange[0]))->startOfDay();
            $endDate = Carbon::createFromFormat('j M, Y', trim($dateRange[1]))->endOfDay();
        }
        $query = User::query();
        if ($users_id) {
            $query->where('id', $users_id);
        }
        if ($startDate && $endDate) {
            $query->withCount([
                'signs' => function ($query) use ($startDate, $endDate) {
                    $query->whereBetween('created_at', [$startDate, $endDate]);
                }, 
                'preordersTurnIns' => function ($query) use ($startDate, $endDate) {
                    $query->whereBetween('created_at', [$startDate, $endDate]);
                }
            ])->with([
                'signs' => function ($query) use ($startDate, $endDate) {
                    $query->whereBetween('created_at', [$startDate, $endDate]);
                }, 
                'preordersTurnIns' => function ($query) use ($startDate, $endDate) {
                    $query->whereBetween('created_at', [$startDate, $endDate]);
                }
            ]);
        } else {
            $query->withCount(['signs', 'preordersTurnIns'])
                ->with(['signs', 'preordersTurnIns']);
        }
        $results = $query->get();
        if ($results->isNotEmpty()) {
            $firstUser = $results->first();
            $downloadsCount = downloadsModel::whereHas('sign', function ($query) use ($firstUser) {
                $query->where('users_id', $firstUser->id);
            })->count();
            $firstUser->downloads_count = $downloadsCount;
            $getdata = $firstUser;
        } else {
            $getdata = null;
        }
        $period = $request->query('period');    
        return view('backend/reports-users-detail', [
            'default_pagename' => 'รายละเอียดรายการ',
            'user' => $user,
            'period' => $period,
            'query' => $getdata,
        ]);
    }
        
    







    public function BN_reports_users(Request $request)
    {
        $startDate = null;
        $endDate = null;
        if ($request->has('period')) {
            $dateRange = explode(" - ", $request->period);
            $startDate = Carbon::createFromFormat('j M, Y', trim($dateRange[0]))->startOfDay();
            $endDate = Carbon::createFromFormat('j M, Y', trim($dateRange[1]))->endOfDay();
        }
        $query = User::query();
        if ($startDate && $endDate) {
            $query->withCount(['signs' => function ($query) use ($startDate, $endDate) {
                $query->whereBetween('created_at', [$startDate, $endDate]);
            }, 'preordersTurnIns' => function ($query) use ($startDate, $endDate) {
                $query->whereBetween('created_at', [$startDate, $endDate]);
            }])->with(['signs' => function ($query) use ($startDate, $endDate) {
                $query->whereBetween('created_at', [$startDate, $endDate]);
            }, 'preordersTurnIns' => function ($query) use ($startDate, $endDate) {
                $query->whereBetween('created_at', [$startDate, $endDate]);
            }]);
        } else {
            $query->withCount(['signs', 'preordersTurnIns'])->with(['signs', 'preordersTurnIns']);
        }
        $results = $query->get();
        foreach ($results as $user) {
            $downloadsCount = downloadsModel::whereHas('sign', function ($query) use ($user) {
                $query->where('users_id', $user->id);
            })->count();

            $user->downloads_count = $downloadsCount;
        }

        $period = $request->query('period');

        return view('backend/reports-users', [
            'default_pagename' => 'ข้อมูลนักออกแบบ',
            'query' => $results,
            'period' => $period,
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
