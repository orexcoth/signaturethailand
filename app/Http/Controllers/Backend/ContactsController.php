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

use App\Models\contactsModel;

class ContactsController extends Controller
{
    public function BN_contacts(Request $request)
    {

        $query = contactsModel::query()
            ->orderBy('id', 'desc');

        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $query->where(function ($query) use ($keyword) {
                $query->where('contact_firstname', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('contact_lastname', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('contact_email', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('contact_phone', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('contact_heading', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('contact_message', 'LIKE', '%' . $keyword . '%');
            });
        }

        $resultPerPage = 12;
        $query = $query->paginate($resultPerPage);

        return view('backend/contacts', [ 
            'default_pagename' => 'ข้อความติดต่อ',
            'query' => $query,
        ]);
    }
    public function BN_contacts_detail(Request $request)
    {
        return view('backend/contacts-detail', [ 
            'default_pagename' => 'รายละเอียดข้อความติดต่อ',
        ]);
    }
}
