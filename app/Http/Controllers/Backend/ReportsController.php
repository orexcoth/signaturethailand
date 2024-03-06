<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function BN_reports_sells(Request $request)
    {
        return view('backend/reports-sells', [
            'default_pagename' => 'การขายทั้งหมด',
        ]);
    }
    public function BN_reports_orders(Request $request)
    {
        return view('backend/reports-orders', [
            'default_pagename' => 'การสั่งออกแบบทั้งหมด',
        ]);
    }
}
