<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// use Illuminate\Http\RedirectResponse;
// use Illuminate\Support\Facades\File;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Storage;
// use Illuminate\Auth\Events\Registered;
// use Illuminate\Validation\Rules;

use App\Models\customersModel;
use App\Models\namesModel;
use App\Models\signsModel;
use App\Models\usersModel;
use App\Models\suggestsModel;
use App\Models\OptionsModel;

class NamesController extends Controller
{
    public function BN_names_store(Request $request)
    {
        $query = namesModel::query()
            ->orderBy('id', 'desc');

        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $query->where(function ($query) use ($keyword) {
                $query->where('name_th', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('name_en', 'LIKE', '%' . $keyword . '%');
            });
        }

        if ($request->filled('language') && $request->filled('alphabet')) {
            $language = $request->input('language');
            $alphabet = $request->input('alphabet');

            if($language == 'th'){
                $query->where(function ($query) use ($alphabet) {
                    $query->where('name_th', 'LIKE', $alphabet . '%');
                });
            }
            elseif($language == 'en'){
                $query->where(function ($query) use ($alphabet) {
                    $query->where('name_en', 'LIKE', $alphabet . '%');
                });
            }
        }
        if (!$request->filled('keyword') && !($request->filled('language') && $request->filled('alphabet'))) {
            $query->where('id', '=', -1);
        }
        

        $resultPerPage = 36;
        $query = $query->paginate($resultPerPage);

        return view('backend/names-store', [ 
            'default_pagename' => 'คลังรายชื่อ',
            'query' => $query,
        ]);
    }
    public function BN_names_add(Request $request)
    {
        $price_th = OptionsModel::where('option_key', 'price_th')->first();
        $price_en = OptionsModel::where('option_key', 'price_en')->first();

        return view('backend/names-add', [ 
            'default_pagename' => 'เพิ่มรายชื่อ',
            'price_th' => $price_th ? $price_th->option_value : 0,
            'price_en' => $price_en ? $price_en->option_value : 0,
        ]);
    }
    public function BN_names_add_action(Request $request)
    {
        // dd($request);
        $name = new namesModel;

        $name->name_th = $request->name_th;
        $name->name_en = $request->name_en;
        $name->price_th = $request->price_th;
        $name->price_en = $request->price_en;
        $name->save();

        return redirect(route('BN_names_store'))->with('success', 'สร้างสำเร็จ !!!');

    }













    public function BN_names_suggest(Request $request)
    {
        $query = suggestsModel::query()->orderBy('id', 'desc');

        if ($request->filled('status') && $request->filled('keyword')) {
            $status = $request->input('status');
            $keyword = $request->input('keyword');

            $query->where('status', '=', $status)
                ->where(function ($query) use ($keyword) {
                    $query->where('name_th', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('name_en', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('email', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('phone', 'LIKE', '%' . $keyword . '%');
                });
        } else {
            // If only one of them is provided or none
            if ($request->filled('status')) {
                $status = $request->input('status');
                $query->where('status', '=', $status);
            } else {
                // Default to 'suggested' status if none is provided
                $query->where('status', '=', 'suggested');
            }

            if ($request->filled('keyword')) {
                $keyword = $request->input('keyword');
                $query->where(function ($query) use ($keyword) {
                    $query->where('name_th', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('name_en', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('email', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('phone', 'LIKE', '%' . $keyword . '%');
                });
            }
        }

        $resultPerPage = 12;
        $query = $query->paginate($resultPerPage);

        return view('backend/names-suggest', [
            'default_pagename' => 'แนะนำชื่อ',
            'query' => $query,
        ]);
    }

    // public function BN_names_suggest(Request $request)
    // {
    //     $query = suggestsModel::query()
    //         ->where('status', '=', 'suggested')
    //         ->orderBy('id', 'desc');


    //     if ($request->filled('keyword')) {
    //         $keyword = $request->input('keyword');
    //         $query->where(function ($query) use ($keyword) {
    //             $query->where('name_th', 'LIKE', '%' . $keyword . '%')
    //                 ->orWhere('name_en', 'LIKE', '%' . $keyword . '%')
    //                 ->orWhere('email', 'LIKE', '%' . $keyword . '%')
    //                 ->orWhere('phone', 'LIKE', '%' . $keyword . '%');
    //         });
    //     }
    //     if ($request->filled('status')) {
    //         $status = $request->input('status');
    //         $query->where('status', '=', $status);
    //     }

    //     $resultPerPage = 12;
    //     $query = $query->paginate($resultPerPage);

    //     return view('backend/names-suggest', [ 
    //         'default_pagename' => 'แนะนำชื่อ',
    //         'query' => $query,
    //     ]);
    // }
    public function BN_names_suggest_delete(Request $request, $id)
    {
        // dd($request);
        
        $suggestion = suggestsModel::find($id);

        if ($suggestion) {
            // Update the status to 'deleted' or any desired status
            $suggestion->update(['status' => 'deleted']);

            // Optionally, you can also delete the record from the database
            // $suggestion->delete();

            return redirect()->back()->with('success', 'ลบข้อมูลเรียบร้อยแล้ว');
        } else {
            return redirect()->back()->with('error', 'ไม่พบข้อมูลที่ต้องการลบ');
        }

    }

    public function BN_names_mock_suggest(Request $request)
    {
        $suggest = new suggestsModel;
        $suggest->name_th = $request->name_th;
        $suggest->name_en = $request->name_en;
        $suggest->email = $request->email;
        $suggest->phone = $request->phone;
        $suggest->status = 'suggested';
        $suggest->save();

        return redirect()->back()->with('success', 'submit success!');
    }
}
