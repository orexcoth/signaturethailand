<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogsSaveController;

use App\Providers\RouteServiceProvider;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules;


use App\Models\User;
use App\Models\usersModel;

class UsersController extends Controller
{

    public function BN_users_add()
    {
        return view('backend/users-add', [ 
            'default_pagename' => 'เพิ่มยูสเซอร์',
        ]);
    }
    public function BN_users_add_action(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:8'],
            'role' => ['required', 'in:admin,creator'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'description' => ['nullable', 'string'],
            'facebook' => ['nullable', 'url'],
            'line' => ['nullable', 'string', 'max:255'],
            'ig' => ['nullable', 'string', 'max:255'],
            'twitter' => ['nullable', 'string', 'max:255'],
            'rate_download' => ['nullable', 'numeric', 'min:0', 'max:100'],
            'rate_preorder' => ['nullable', 'numeric', 'min:0', 'max:100'],
        ]);

        $user = new User;

        if ($request->hasFile('photo')) {
            // Delete old file if exists
            if ($user->photo && File::exists(public_path($user->photo))) {
                File::delete(public_path($user->photo));
            }

            // Store the new photo
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $filepath = $file->storeAs('uploads/photo', $filename, 'public');
            $user->photo = $filepath;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->status = $request->active ?? 1;
        $user->rate_download = $request->rate_download;
        $user->rate_preorder = $request->rate_preorder;
        $user->description = $request->description;
        $user->facebook = $request->facebook;
        $user->line = $request->line;
        $user->ig = $request->ig;
        $user->twitter = $request->twitter;

        $user->save();

        event(new Registered($user));

        if (auth()->check()) {
            $idsavelog = auth()->user()->id; 
            $para = [
                'part' => 'backend',
                'user' => $idsavelog,
                'ref' => $user->id,
                'remark' => 'User ' . $idsavelog . ' created a new user!',
                'event' => 'create user',
            ];
            (new LogsSaveController)->create_log($para);
        }

        return redirect(route('BN_users'))->with('success', 'บันทึกข้อมูลสำเร็จ !!!');
    }

    public function BN_users_edit(Request $request, $id)
    {
        $user = usersModel::find($id);
        return view('backend/users-edit', [ 
            'default_pagename' => 'แก้ไขยูสเซอร์',
            'user' => $user,
        ]);
    }

    public function BN_users(Request $request)
    {
        $User = usersModel::query()
        // ->where('phone',$request->s)
        ->orderBy('id', 'desc')
        ->paginate(16);

        $query = usersModel::query()
            ->orderBy('id', 'desc');

        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $query->where(function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('email', 'LIKE', '%' . $keyword . '%');
            });
        }

        $resultPerPage = 24;
        $query = $query->paginate($resultPerPage);

        return view('backend/users', [ 
            'default_pagename' => 'ยูสเซอร์',
            'User' => $User,
            'query' => $query,
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    
    public function BN_users_edit_action(Request $request)
    {
         // Validate the incoming request data
         $request->validate([
             'name' => ['required', 'string', 'max:255'],
             'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $request->user],
             'role' => ['required', 'in:admin,manager,assistance,editor,marketing'],
             'rate_download' => ['nullable', 'numeric', 'min:0', 'max:100'],
             'rate_preorder' => ['nullable', 'numeric', 'min:0', 'max:100'],
             'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
             'description' => ['nullable', 'string'],
             'facebook' => ['nullable', 'url'],
             'line' => ['nullable', 'string', 'max:255'],
             'ig' => ['nullable', 'string', 'max:255'],
             'twitter' => ['nullable', 'string', 'max:255'],
         ]);
     
         // Find the user by ID
         $User = User::findOrFail($request->user);
     
         // Handle photo upload
         if ($request->hasFile('photo')) {
             // Delete old photo if it exists
             $oldPath = public_path($User->photo);
             if (File::exists($oldPath)) {
                 File::delete($oldPath);
             }
     
             // Store the new photo
             $file = $request->file('photo');
             $newFilename = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
             $file->move(public_path('/uploads/photo'), $newFilename);
             $User->photo = 'uploads/photo/' . $newFilename;
         }
     
         // Update the user data
         $User->name = $request->name;
         $User->email = $request->email;
         $User->role = $request->role;
         $User->status = $request->active ?? $User->status; // If status is provided, update it, otherwise keep the current status
         $User->rate_download = $request->rate_download ?? $User->rate_download;
         $User->rate_preorder = $request->rate_preorder ?? $User->rate_preorder;
         $User->description = $request->description;
         $User->facebook = $request->facebook;
         $User->line = $request->line;
         $User->ig = $request->ig;
         $User->twitter = $request->twitter;
     
         // Save the updated user
         $User->save();
     
         // Log the update event
         $idsavelog = auth()->user()->id;
         $para = [
             'part' => 'backend',
             'user' => $idsavelog,
             'ref' => $User->id,
             'remark' => 'User ' . $idsavelog . ' updated the user!',
             'event' => 'update user',
         ];
         (new LogsSaveController)->create_log($para);
     
         // Redirect back with a success message
         return redirect()->back()->with('success', 'บันทึกข้อมูลสำเร็จ !!!');
    }
     

    

    public function BN_profile()
    {
        return view('backend/profile', [ 
            'default_pagename' => 'โปรไฟล์',
        ]);
    }
    public function BN_profile_edit(Request $request)
    {
        $userlogin = auth()->user();
        $userloginid = auth()->user()->id; 
        $myuser = usersModel::find($userloginid);
        return view('backend/profile-edit', [ 
            'default_pagename' => 'แก้ไขโปรไฟล์',
            'myuser' => $myuser,
        ]);
    }
    public function BN_profile_edit_action(Request $request)
    {
        $userlogin = auth()->user();
        $userloginid = auth()->user()->id;
        $userupdate = usersModel::find($userloginid);
        if($request->hasFile('photo')){

            $oldPath = public_path($userupdate->photo);
            if(File::exists($oldPath)){
                File::delete($oldPath);
            }

            $file = $request->file('photo');
            $destinationPath = public_path('/uploads');
            $filename = $file->getClientOriginalName();

            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            $newfilenam = time() . '.' .$ext;
            $file->move($destinationPath, $newfilenam);
            $filepath = 'uploads/'.$newfilenam;
            $userupdate->photo = $filepath;

            
        }
        
        $userupdate->name = $request->name;
        $userupdate->update();

        if(isset($userupdate)){
            $usersavelog = auth()->user();
            $idsavelog = auth()->user()->id; 
            $emailsavelog = auth()->user()->email;
            $para = array(
                'part' => 'backend',
                'user' => $idsavelog,
                'ref' => $idsavelog,
                'remark' => 'User '.$idsavelog.' Update Profile!',
                'event' => 'update profile',
            );
            $result = (new LogsSaveController)->create_log($para);
        }

        // return redirect(route('BN_profile')->with('success', 'บันทึกข้อมูลสำเร็จ !!!'));
        return redirect(route('BN_profile'))->with('success', 'บันทึกข้อมูลสำเร็จ !!!');

    }
}
