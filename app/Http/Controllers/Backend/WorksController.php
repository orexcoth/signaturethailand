<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WorksController extends Controller
{
    public function BN_works_assign(Request $request)
    {

        return view('backend/works-assign', [
            'default_pagename' => 'มอบหมายงาน',
        ]);
    }
}
