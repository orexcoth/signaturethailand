<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use PhpOffice\PhpSpreadsheet\IOFactory;

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
        $alldata = namesModel::count();
        $query = namesModel::query();

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

            if ($language == 'th') {
                $query->where('name_th', 'LIKE', '%' . $alphabet . '%');
            } elseif ($language == 'en') {
                $query->where('name_en', 'LIKE', '%' . $alphabet . '%');
            }
        }

        // Add sorting based on presence of name_th or name_en
        $query->orderByRaw("IF(name_th IS NOT NULL AND name_en IS NULL, 1, 0) ASC")
            ->orderByRaw("IF(name_en IS NOT NULL AND name_th IS NULL, 1, 0) ASC")
            ->orderBy('name_th', 'asc')
            ->orderBy('name_en', 'asc');

        // If no filters applied, return no results
        if (!$request->filled('keyword') && !($request->filled('language') && $request->filled('alphabet'))) {
            $query->where('id', '=', -1);
        }

        $resultPerPage = 36;
        $query = $query->paginate($resultPerPage);

        return view('backend/names-store', [
            'default_pagename' => 'คลังรายชื่อ',
            'query' => $query,
            'alldata' => $alldata,
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

    public function BN_names_import(Request $request)
    {
        return view('backend/names-import', [ 
            'default_pagename' => 'นำเข้าข้อมูลรายชื่อ',
        ]);
    }
    public function BN_names_import_result(Request $request)
    {
        return view('backend/names-import-result', [ 
            'default_pagename' => 'ผลการนำเข้าข้อมูล',
        ]);
    }

    





    public function BN_names_import_action(Request $request)
    {
        // Initialize arrays to store information
        $savedData = [];
        $skippedData = [];

        // Check if file is present in the request
        if ($request->hasFile('excel')) {
            // Get file from request
            $file = $request->file('excel');

            // Load the Excel file
            $spreadsheet = IOFactory::load($file);

            // Get the first worksheet
            $worksheet = $spreadsheet->getActiveSheet();

            // Get the highest row number
            $highestRow = $worksheet->getHighestRow();

            // Get original prices from OptionsModel
            $price_th = OptionsModel::where('option_key', 'price_th')->value('option_value');
            $price_en = OptionsModel::where('option_key', 'price_en')->value('option_value');

            // Loop through each row starting from the second row (assuming the first row is headers)
            for ($row = 2; $row <= $highestRow; $row++) {
                // Get data from each column
                $name_th = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                $name_en = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                $price_th_cell = $worksheet->getCellByColumnAndRow(3, $row);
                $price_en_cell = $worksheet->getCellByColumnAndRow(4, $row);

                // Check if both 'a' and 'b' exist in the database
                $bothExistInDb = NamesModel::where('name_th', $name_th)
                    ->where('name_en', $name_en)
                    ->exists();

                // If both 'a' and 'b' exist, skip the data
                if ($bothExistInDb) {
                    $skippedData[] = [
                        'name_th' => $name_th,
                        'name_en' => $name_en,
                        'reason' => 'มีชื่อนี้อยู่ในระบบแล้ว',
                    ];
                    continue; // Skip to the next iteration
                }

                // Check if 'a' consists of Thai characters
                if (!empty($name_th) && !preg_match('/^[\p{Thai}\s]+$/u', $name_th)) {
                    $skippedData[] = [
                        'name_th' => $name_th,
                        'name_en' => $name_en,
                        'reason' => 'ช่อง Name_th ต้องเป็นชื่อภาษาไทยเท่านั้น',
                    ];
                    continue; // Skip to the next iteration
                }

                // Check if 'b' consists of English characters
                if (!empty($name_en) && !preg_match('/^[a-zA-Z\s]+$/', $name_en)) {
                    $skippedData[] = [
                        'name_th' => $name_th,
                        'name_en' => $name_en,
                        'reason' => 'ช่อง Name_en ต้องเป็นชื่อภาษาอังกฤษเท่านั้น',
                    ];
                    continue; // Skip to the next iteration
                }

                // Check if both 'a' and 'b' are empty
                if (empty($name_th) && empty($name_en)) {
                    // Add the row data to the skipped data with reason
                    $skippedData[] = [
                        'name_th' => $name_th,
                        'name_en' => $name_en,
                        'reason' => 'ชื่อไม่มีข้อมูล',
                    ];
                    continue; // Skip to the next iteration
                }

                // Parse and validate price for name_th
                $price_th_value = $this->parsePrice($price_th_cell, $price_th);

                // Parse and validate price for name_en
                $price_en_value = $this->parsePrice($price_en_cell, $price_en);

                // Save data to the database
                NamesModel::create([
                    'name_th' => $name_th,
                    'name_en' => $name_en,
                    'price_th' => $price_th_value,
                    'price_en' => $price_en_value,
                ]);

                // Add row data to the saved data array
                $savedData[] = [
                    'name_th' => $name_th,
                    'name_en' => $name_en,
                    'price_th' => $price_th_value,
                    'price_en' => $price_en_value,
                ];
            }
        } else {
            // Handle the case where no file is uploaded
            return redirect()->back()->with('error', 'No file uploaded.');
        }

        // Pass data to the view
        return view('backend.names-import-result', [
            'default_pagename' => 'ผลการ import',
            'savedData' => $savedData,
            'skippedData' => $skippedData,
        ]);
    }

    

        
    
    private function parsePrice($cell, $original_price)
    {
        $price_value = $cell->getValue();
    
        // Check if cell value is numeric
        if (is_numeric($price_value)) {
            return $price_value;
        } else {
            // If cell value is not numeric, use original price
            return $original_price;
        }
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
