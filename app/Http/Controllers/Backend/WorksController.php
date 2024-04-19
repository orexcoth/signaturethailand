<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\usersModel;
use App\Models\namesModel;
use App\Models\ordersModel;
use App\Models\sellsModel;
use App\Models\sells_namesModel;
use App\Models\sells_combosModel;
use App\Models\preordersModel;
use App\Models\worksModel;
use App\Models\preordersTurnInModel;

class WorksController extends Controller
{
    public function BN_works_turn_in_action(Request $request)
    {
        // dd($request);
    
        $workget = worksModel::findOrFail($request->work_id);
        $userId = $request->users_id;

        $currentDate = date('Ymd');
        $randomString = uniqid().uniqid();
        $currentyear = date('Y');
        // dd($currentyear);
        // $langFolder = ($request->lang == 'th') ? 'th' : 'en';
        $langFolder = $currentyear;
        $signExtension = $request->file('sign')->getClientOriginalExtension();
        $videoExtension = $request->file('video')->getClientOriginalExtension();
    
        $signFile = $request->file('sign');
        $signNewFileName = $currentDate . '-' . $userId . '-' . $request->work_id . '-' . '-' . $randomString . '.' . $signExtension;
        $signDestinationPath = 'uploads/preorders/sign/' . $langFolder;
        $signPath = $signFile->move($signDestinationPath, $signNewFileName);
        if ($signPath === false) {
            Log::error('Sign upload failed.');
            return redirect()->back()->with('error', 'Sign upload failed.');
        }
    
        $videoFile = $request->file('video');
        $videoNewFileName = $currentDate . '-' . $userId . '-' . $request->work_id . '-' . '-' . $randomString . '.' . $videoExtension;
        $videoDestinationPath = 'uploads/preorders/video/' . $langFolder;
        $videoPath = $videoFile->move($videoDestinationPath, $videoNewFileName);
        if ($videoPath === false) {
            Log::error('Video upload failed.');
            return redirect()->back()->with('error', 'Video upload failed.');
        }
    
        $TurnIn = new preordersTurnInModel();
        $TurnIn->preorders_id = $request->preorders_id;
        $TurnIn->users_id = $request->users_id; // Change to users_id
        $TurnIn->sign = $signPath->getPathname();
        $TurnIn->video = $videoPath->getPathname();
        $TurnIn->description = $request->description;
        $TurnIn->status = 'submitted';
        $TurnIn->save();

        $workget->status = 'submitted';
        $workget->save();

        return redirect(route('BN_works_list'))->with('success', 'ส่งงานสำเร็จ !!!');
    }

    public function BN_works_turn_in(Request $request)
    {
       
        $work = worksModel::find($request->id);
        $preorder = preordersModel::find($work->make);
        $user = Auth::user();
        // dd($preorder);
        // dd($user);
        return view('backend/works-turnin', [
            'default_pagename' => 'ส่งงาน',
            'preorder' => $preorder,
            'work' => $work,
            'user' => $user,
        ]);
    }

    public function BN_works_list(Request $request)
    {
        $userlogin = auth()->user();
        $userloginid = auth()->user()->id; 

        $query = worksModel::query()
            ->where('users_id',$userloginid)
            ->orderBy('id', 'desc');
        $resultPerPage = 24;
        $query = $query->paginate($resultPerPage);

        return view('backend/works-list', [
            'default_pagename' => 'ตารางงาน',
            'query' => $query,
        ]);
    }

    public function BN_works_list_detail(Request $request)
    {
        if($request->id){
            $work = worksModel::find($request->id);
            $submitted = array();
            if($work->type == 'preorders'){
                $detail = preordersModel::find($work->make);
                // $TurnIn = preordersTurnInModel::get($work->make);
                $submitted = preordersTurnInModel::where('preorders_id', $work->make)->get();
                $submitted->load('user');
                // dd($TurnIn);
            }
            // dd($detail);
        }
            

        return view('backend/works-list-detail', [
            'default_pagename' => 'รายละเอียดตารางงาน',
            'work' => $work,
            'detail' => $detail,
            'submitted' => $submitted,
        ]);
    }

    public function BN_works_assign(Request $request)
    {

        $users = UsersModel::all();
        $names = namesModel::all();
        $preorders = preordersModel::get();

        // $sells = DB::table('sells')
            // ->select(
            //     'sells.*',
            //     'sells_names.*',
            //     'sells_combos.*',
            //     'names.*',
            //     'sells.id as sell_id',
            //     'sells_names.id as sells_names_id',
            //     'sells_combos.id as sells_combos_id',
            //     'sells.created_at as sells_created_at',
            //     'sells.status as sells_status',
            //     'names.id as names_id'
            // )
            // ->leftJoin('sells_names', 'sells.id', '=', 'sells_names.sells_id')
            // ->leftJoin('sells_combos', 'sells_names.id', '=', 'sells_combos.sells_names_id')
            // ->leftJoin('names', 'sells_names.names_id', '=', 'names.id')
            // ->where('sells_names.combo', 1)
            // ->get();

        // dd($sells);

        return view('backend/works-assign', [
            'default_pagename' => 'มอบหมายงาน',
            'users' => $users,
            'names' => $names,
            'preorders' => $preorders,
            // 'sells' => $sells,
        ]);
    }




    public function BN_works_report(Request $request)
    {
        // dd($request);
        // Fetch all users
        $users = usersModel::orderBy('id', 'desc')->get();

        // Check if user is provided
        if ($request->has('user')) {
            $query = worksModel::query()->where('users_id', $request->user);

            // Check if status is provided
            if ($request->filled('status')) {
                $query->where('status', $request->status);
            }

            // Order the query by id in descending order
            $query->orderBy('id', 'desc');

            // Paginate the results
            $resultPerPage = 24;
            $query = $query->paginate($resultPerPage);

            return view('backend/works-reports', [
                'default_pagename' => 'ตารางงาน',
                'query' => $query,
                'users' => $users,
            ]);
        } else {
            // If user is not provided, return empty array for query
            return view('backend/works-reports', [
                'default_pagename' => 'ตารางงาน',
                'query' => [],
                'users' => $users,
            ]);
        }
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
                }elseif($request->type == 'preorders'){
                    $works->make = $request->preorders;
                }
                $works->save();
            }
        }


        

        return redirect()->back()->with('success', 'มอบหมายสำเร็จ !!!');
    }
}
