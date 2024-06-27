<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;


use Illuminate\Support\Facades\File; // Import the File facade
use Image; // Import the Image facade

use App\Models\customersModel;
use App\Models\namesModel;
use App\Models\signsModel;
use App\Models\usersModel;
use App\Models\suggestsModel;
use App\Models\OptionsModel;

use Illuminate\Support\Facades\Mail;



class NamesController extends Controller
{

    public function BN_names_store_updateStatus(Request $request) {
        $nameId = $request->input('nameId');
        $newStatus = $request->input('newStatus');

        $name = namesModel::find($nameId);
        if ($name) {
            $name->free = $newStatus;
            $name->save();
            return response()->json(['success' => true, 'newStatus' => $newStatus]);
        }

        return response()->json(['success' => false], 500);
    }

    
    















    



    public function BN_names_sign_add_action(Request $request) 
    {
        // Validate sign and optionally validate video uploads
        $request->validate([
            'sign' => 'required|image',
            'video' => 'nullable|mimetypes:video/mp4,video/avi,video/quicktime,video/x-ms-wmv',
        ]);

        $name = namesModel::findOrFail($request->names_id);
        $defaultName = ($request->lang == 'th') ? $name->name_th : $name->name_en;

        $userId = $request->users_id;
        $currentDate = date('Ymd');
        $randomString = uniqid();
        $langFolder = ($request->lang == 'th') ? 'th' : 'en';
        $signExtension = $request->file('sign')->getClientOriginalExtension();
        
        $signFile = $request->file('sign');
        $signNewFileName = $currentDate . '-' . $userId . '-' . $request->names_id . '-' . $defaultName . '-' . $randomString . '.' . $signExtension;
        $signDestinationPath = 'uploads/sign/' . $langFolder;
        $signPath = $signFile->move($signDestinationPath, $signNewFileName);
        if ($signPath === false) {
            Log::error('Sign upload failed.');
            return redirect()->back()->with('error', 'Sign upload failed.');
        }

        $videoPath = null;
        if ($request->hasFile('video')) {
            $videoExtension = $request->file('video')->getClientOriginalExtension();
            $videoFile = $request->file('video');
            $videoNewFileName = $currentDate . '-' . $userId . '-' . $request->names_id . '-' . $defaultName . '-' . $randomString . '.' . $videoExtension;
            $videoDestinationPath = 'uploads/video/' . $langFolder;
            $videoPath = $videoFile->move($videoDestinationPath, $videoNewFileName);

            if ($videoPath === false) {
                Log::error('Video upload failed.');
                return redirect()->back()->with('error', 'Video upload failed.');
            }
        }

        /** start gen feature */
        $imgpath = $signPath->getPathname();
        $imagesource = public_path($imgpath);

        // Check if the source image exists
        if (!File::exists($imagesource)) {
            return redirect()->back()->with('error', 'Source image not found.');
        }

        $image = Image::make($imagesource);

        $x = 0;
        $y = 0;
        $width = $image->width();
        $height = $image->height();
        $blockSize = 27;

        $croppedImage = $image->crop($width, $height, $x, $y);
        $mosaicImage = $croppedImage->resize($width / $blockSize, $height / $blockSize);
        $mosaicImage = $mosaicImage->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image->insert($mosaicImage, 'top-left', $x, $y);

        $name_mosaic = uniqid() . time() . '-result-mosaic.jpg';
        $filepath_mosaic = 'uploads/mosaic/' . $name_mosaic;
        $image->save(public_path($filepath_mosaic));

        $mosaicImagePath = $filepath_mosaic;
        /** end gen feature */

        $sign = new signsModel();
        $sign->status = 1;
        $sign->names_id = $request->names_id;
        $sign->users_id = $request->users_id; // Change to users_id
        $sign->work = $request->work;
        $sign->finance = $request->finance;
        $sign->love = $request->love;
        $sign->health = $request->health;
        $sign->fortune = $request->fortune;
        $sign->description = $request->description;
        $sign->lang = $request->lang;
        $sign->sign = $signPath->getPathname();
        $sign->video = $videoPath ? $videoPath->getPathname() : null;
        $sign->feature = $mosaicImagePath;
        $sign->save();

        Log::info('Sign added successfully.');
        return redirect(route('BN_names_detail', ['id' => $request->names_id]))->with('success', 'เพิ่มลายเซ็นต์เรียบร้อย !!!');
    }

    










    
    
    
    

    

    public function BN_names_sign_edit_action(Request $request) 
    {
        // Validate the request data
        $request->validate([
            'sign' => 'required|image',
            'video' => 'nullable|mimetypes:video/mp4,video/avi,video/quicktime,video/x-ms-wmv',
        ]);

        $sign = signsModel::findOrFail($request->signs_id);

        if ($request->hasFile('sign')) {
            // Handle sign upload
            $signExtension = $request->file('sign')->getClientOriginalExtension();
            $currentDate = date('Ymd');
            $randomString = uniqid();
            $langFolder = ($request->field == 'name_th') ? 'th' : 'en';
            $signNewFileName = $currentDate . '-' . $request->users_id . '-' . $request->names_id . '-' . $randomString . '.' . $signExtension;
            $signDestinationPath = 'uploads/sign/' . $langFolder;
            $signPath = $request->file('sign')->move($signDestinationPath, $signNewFileName);

            if ($signPath === false) {
                Log::error('Sign upload failed.');
                return redirect()->back()->with('error', 'Sign upload failed.');
            }

            // Delete the old sign file
            if (File::exists(public_path($sign->sign))) {
                File::delete(public_path($sign->sign));
            }

            $sign->sign = $signPath->getPathname();

            /** start gen feature */
            $imgpath = $signPath->getPathname();
            $imagesource = public_path($imgpath);

            // Check if the source image exists
            if (!File::exists($imagesource)) {
                return redirect()->back()->with('error', 'Source image not found.');
            }

            $image = Image::make($imagesource);

            $x = 0;
            $y = 0;
            $width = $image->width();
            $height = $image->height();
            $blockSize = 27;

            $croppedImage = $image->crop($width, $height, $x, $y);
            $mosaicImage = $croppedImage->resize($width / $blockSize, $height / $blockSize);
            $mosaicImage = $mosaicImage->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image->insert($mosaicImage, 'top-left', $x, $y);

            $name_mosaic = uniqid() . time() . '-result-mosaic.jpg';
            $filepath_mosaic = 'uploads/mosaic/' . $name_mosaic;
            $image->save(public_path($filepath_mosaic));

            $mosaicImagePath = $filepath_mosaic;
            $sign->feature = $mosaicImagePath;
            /** end gen feature */
        }

        if ($request->hasFile('video')) {
            // Handle video upload
            $videoExtension = $request->file('video')->getClientOriginalExtension();
            $currentDate = date('Ymd');
            $randomString = uniqid();
            $langFolder = ($request->field == 'name_th') ? 'th' : 'en';
            $videoNewFileName = $currentDate . '-' . $request->users_id . '-' . $request->names_id . '-' . $randomString . '.' . $videoExtension;
            $videoDestinationPath = 'uploads/video/' . $langFolder;
            $videoPath = $request->file('video')->move($videoDestinationPath, $videoNewFileName);

            if ($videoPath === false) {
                Log::error('Video upload failed.');
                return redirect()->back()->with('error', 'Video upload failed.');
            }

            // Delete the old video file
            if (File::exists(public_path($sign->video))) {
                File::delete(public_path($sign->video));
            }

            $sign->video = $videoPath->getPathname();
        }

        // Update the sign data
        $sign->work = $request->work;
        $sign->finance = $request->finance;
        $sign->love = $request->love;
        $sign->health = $request->health;
        $sign->fortune = $request->fortune;
        $sign->description = $request->description;
        $sign->lang = ($request->field == 'name_th') ? 'th' : 'en';
        $sign->save();

        Log::info('Sign updated successfully.');
        return redirect(route('BN_names_detail', ['id' => $sign->names_id]))->with('success', 'ลายเซ็นต์ถูกแก้ไขเรียบร้อยแล้ว!');
    }



    public function BN_names_sign_edit(Request $request, $lang, $sign)
    {
        $getsigns = signsModel::find($sign);
        $name = namesModel::find($getsigns->names_id);
        return view('backend/names-sign-edit', [
            'default_pagename' => 'เพิ่มลายเซ็นต์',
            'sign' => $getsigns,
            'name' => $name,
            'lang' => $lang,
        ]);
    }


    

    public function BN_names_sign_add(Request $request, $lang, $id)
    {
        $name = namesModel::find($id);
        return view('backend/names-sign-add', [
            'default_pagename' => 'เพิ่มลายเซ็นต์',
            'name' => $name,
            'lang' => $lang, // Pass the lang parameter to the view
        ]);
    }



    public function BN_names_edit_action(Request $request)
    {
        // dd($request);
        $name = namesModel::find($request->id);
        $name->name_th = $request->name_th;
        $name->name_en = $request->name_en;
        $name->price_th = $request->price_th;
        $name->price_en = $request->price_en;
        $name->save();

        return redirect()->back()->with('success', 'บันทึกสำเร็จ !!!');

    }
    public function BN_names_detail(Request $request, $id)
    {
        $name = namesModel::find($id);

        $data = NamesModel::leftJoin('signs', 'names.id', '=', 'signs.names_id')
            ->where('names.id', $id) // Adding where condition for the specific id
            ->select('signs.lang', DB::raw('COUNT(signs.lang) as count'))
            ->groupBy('signs.lang')
            ->get();

        $count = [];
        foreach ($data as $item) {
            $lang = $item->lang ?: ''; // Handle NULL lang values
            $count[$lang] = $item->count;
        }
        $languages = ['en', 'th']; // Assuming these are the languages you want to include
        foreach ($languages as $lang) {
            if (!isset($count[$lang])) {
                $count[$lang] = 0;
            }
        }
        ksort($count); // Sort languages alphabetically

        // Fetch signs with English language
        $signsen = SignsModel::where('names_id', $id)
        ->where('lang', 'en')
        ->with('user') // Load the relationship with user
        ->get();

        // Fetch signs with Thai language
        $signsth = SignsModel::where('names_id', $id)
        ->where('lang', 'th')
        ->with('user') // Load the relationship with user
        ->get();


        return view('backend/names-detail', [ 
            'default_pagename' => 'รายละเอียด',
            'name' => $name,
            'count' => $count,
            'signsen' => $signsen,
            'signsth' => $signsth,
        ]);
    }
    public function BN_names_edit(Request $request, $id)
    {
        $name = namesModel::find($id);
        return view('backend.names-edit', [
            'default_pagename' => 'แก้ไขชื่อ',
            'name' => $name,
        ]);
    }
    







    public function BN_names_store(Request $request)
    {
        $userlogin = auth()->user();
        $userloginid = auth()->user()->id; 

        $data = NamesModel::leftJoin('signs', 'names.id', '=', 'signs.names_id')
            ->select('names.id', 'signs.lang', DB::raw('COUNT(signs.lang) as count'))
            ->groupBy('names.id', 'signs.lang')
            ->get();

        $count = [];
        foreach ($data as $item) {
            $lang = $item->lang ?: ''; // Handle NULL lang values
            $nameId = $item->id;
            if ($lang !== '') {
                $count[$nameId][$lang] = $item->count;
            }
        }

        foreach ($count as &$item) {
            $languages = array_unique(array_merge(array_keys($item), ['en', 'th'])); // Include empty string
            foreach ($languages as $lang) {
                if (!isset($item[$lang])) {
                    $item[$lang] = 0;
                }
            }
            ksort($item); 
        }
        ksort($count);

        $alldata = NamesModel::count();
        
        $query = NamesModel::query();
        $keylang = null;
        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $firstChar = mb_substr($keyword, 0, 1); // Get the first character of the keyword
            if (preg_match('/^[\x{0E01}-\x{0E2E}]$/u', $firstChar)) {
                $keylang = 'th'; // Keyword starts with Thai character
            } elseif (preg_match('/^[a-zA-Z]$/', $firstChar)) {
                $keylang = 'en'; // Keyword starts with English character
            }
        } elseif ($request->filled('alphabet')) {
            $alphabet = $request->input('alphabet');
            if (preg_match('/^[\x{0E01}-\x{0E2E}]$/u', $alphabet)) {
                $keylang = 'th'; // Alphabet selected is Thai
            } elseif (preg_match('/^[a-zA-Z]$/', $alphabet)) {
                $keylang = 'en'; // Alphabet selected is English
            }
        }

        // Keyword filtering
        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $query->where(function ($query) use ($keyword) {
                $query->where('name_th', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('name_en', 'LIKE', '%' . $keyword . '%');
            });
        }

        // Alphabet filtering
        if ($request->filled('alphabet')) {
            $alphabet = $request->input('alphabet');
            if (preg_match('/^[\x{0E01}-\x{0E2E}]$/u', $alphabet)) { // Thai alphabet range
                $query->where('name_th', 'LIKE', $alphabet . '%');
            } elseif (preg_match('/^[a-zA-Z]$/', $alphabet)) { // English alphabet range
                $query->where('name_en', 'LIKE', $alphabet . '%');
            }
        }
        // Alphabet filtering
        // if ($request->filled('alphabet')) {
        //     $alphabet = $request->input('alphabet');
        //     if (preg_match('/^[\x{0E01}-\x{0E2E}]$/u', $alphabet)) { // Thai alphabet range
        //         $query->where('name_th', 'LIKE', '%' . $alphabet . '%');
        //     } elseif (preg_match('/^[a-zA-Z]$/', $alphabet)) { // English alphabet range
        //         $query->where('name_en', 'LIKE', '%' . $alphabet . '%');
        //     }
        // }

        // Sign filtering
        if ($request->filled('sign')) {
            $sign = $request->input('sign');
            if ($sign === 'no') {
                $query->whereNotExists(function ($query) {
                    $query->select(DB::raw(1))
                        ->from('signs')
                        ->whereColumn('names.id', 'signs.names_id')
                        ->groupBy('signs.names_id')
                        ->havingRaw('COUNT(signs.id) > 0');
                });
            } elseif ($sign === 'yes') {
                $query->whereExists(function ($query) {
                    $query->select(DB::raw(1))
                        ->from('signs')
                        ->whereColumn('names.id', 'signs.names_id')
                        ->groupBy('signs.names_id')
                        ->havingRaw('COUNT(signs.id) > 0');
                });
            }
        }

        // Price filtering
        if ($request->filled('price')) {
            $price = $request->input('price');
            if ($price === 'free') {
                $query->where('free', 1);
            } elseif ($price === 'valuable') {
                $query->where(function ($query) {
                    $query->where('free', 0)
                        ->orWhereNull('free');
                });
            }
        }


        $totalCount = $query->count();
        $query->withCount('signs');
        $query->with('suggests'); // Eager load the suggests relationship

        $query->orderByRaw("IF(name_th IS NOT NULL AND name_en IS NULL, 1, 0) ASC")
            ->orderByRaw("IF(name_en IS NOT NULL AND name_th IS NULL, 1, 0) ASC")
            ->orderBy('name_th', 'asc')
            ->orderBy('name_en', 'asc');

        // Retrieve all data when no filters are applied
        if (!$request->filled('keyword') && !$request->filled('alphabet') && !$request->filled('sign') && !$request->filled('price')) {
            // No condition needed here to retrieve all data
        }

        // dd($query->toSql(), $query->getBindings());
        $resultPerPage = 50;
        $query = $query->paginate($resultPerPage);

        return view('backend/names-store', [
            'default_pagename' => 'คลังรายชื่อ',
            'query' => $query,
            'alldata' => $alldata,
            'count' => $count,
            'userlogin' => $userlogin,
            'totalCount' => $totalCount,
            'keylang' => $keylang,
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
            // Get the option values
            $price_th = OptionsModel::where('option_key', 'price_th')->value('option_value');
            $price_en = OptionsModel::where('option_key', 'price_en')->value('option_value');
            
            // Create a new namesModel instance
            $name = new namesModel;

            // Set name values from the request
            $name->name_th = $request->name_th;
            $name->name_en = $request->name_en;

            // Set price_th using conditional logic
            $name->price_th = $request->price_th ?? $price_th ?? 0;

            // Set price_en using conditional logic
            $name->price_en = $request->price_en ?? $price_en ?? 0;

            // Save the instance
            $name->save();

            // Redirect with success message
            // return redirect(route('BN_names_store'))->with('success', 'สร้างสำเร็จ !!!');
            return redirect(route('BN_names_detail', ['id' => $name->id]))->with('success', 'สร้างสำเร็จ !!!');

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
        dd($request);
        $suggest = new suggestsModel;
        $suggest->name_th = $request->name_th;
        $suggest->name_en = $request->name_en;
        $suggest->email = $request->email;
        $suggest->phone = $request->phone;
        $suggest->status = 'suggested';
        $suggest->save();

        return redirect()->back()->with('success', 'submit success!');
    }

    public function BN_names_suggest_action(Request $request)
    {
        $suggestion = suggestsModel::find($request->id);

        if ($suggestion) {
            // Get the option values
            $price_th = OptionsModel::where('option_key', 'price_th')->first();
            $price_en = OptionsModel::where('option_key', 'price_en')->first();

            // Create a new namesModel instance
            $name = new namesModel;
            $name->name_th = $suggestion->name_th;
            $name->name_en = $suggestion->name_en;
            $name->price_th = $price_th ? $price_th->option_value : 0;
            $name->price_en = $price_en ? $price_en->option_value : 0;
            $name->save();

            // Update the status to 'added' in the suggestsModel
            $suggestion->status = 'added';
            $suggestion->names_id = $name->id;
            $suggestion->save();

            // Send email to the suggestion's email address
            $toEmail = $suggestion->email;
            $subject = 'Suggestion Approved';
            $content = 'Your suggestion is approved!';
            
            Mail::raw($content, function ($message) use ($toEmail, $subject) {
                $message->to($toEmail)
                        ->subject($subject);
            });

            // return redirect()->back()->with('success', 'เพิ่มชื่อเข้าคลังรายชื่อสำเร็จ !');
            return redirect(route('BN_names_detail', ['id' => $name->id]))->with('success', 'เพิ่มชื่อเข้าคลังรายชื่อสำเร็จ !!!');
        } else {
            return redirect()->back()->with('error', 'ผิดพลาด !');
        }
    }



}
