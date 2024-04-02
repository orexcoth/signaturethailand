<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\namesModel;
use App\Models\signsModel;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class NamesAndSignsCustomerController extends Controller
{
    public function nameandsignPage(Request $request)
    {
        $name_id = $request->name;
        $name = namesModel::find($name_id);

        $nth = SignsModel::where('names_id', $name_id)
            ->where('lang', 'th')
            ->get();
        $nen = SignsModel::where('names_id', $name_id)
            ->where('lang', 'en')
            ->get();

        $nth_ids = SignsModel::where('names_id', $name_id)
            ->where('lang', 'th')
            ->pluck('id')->toArray();
        $nen_ids = SignsModel::where('names_id', $name_id)
            ->where('lang', 'en')
            ->pluck('id')->toArray();
        $combined_ids = array_merge($nth_ids, $nen_ids);

        $signarrayTH = json_encode($nth_ids);
        $signarrayEN = json_encode($nen_ids);
        $signarrayALL = json_encode($combined_ids);

        return view('frontend/nameandsign', [
            'default_pagename' => 'nameandsign',
            'name' => $name,
            'nth' => $nth,
            'nen' => $nen,
            'signarrayTH' => $signarrayTH,
            'signarrayEN' => $signarrayEN,
            'signarrayALL' => $signarrayALL,
        ]);
    }
}
