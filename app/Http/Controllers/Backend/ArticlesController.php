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

// use App\Models\customersModel;
use App\Models\articlesModel;

class ArticlesController extends Controller
{
    public function BN_articles(Request $request)
    {

        $query = articlesModel::query()
            ->orderBy('id', 'desc');

        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $query->where(function ($query) use ($keyword) {
                $query->where('article_name', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('excerpt', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('content', 'LIKE', '%' . $keyword . '%');
            });
        }

        $resultPerPage = 12;
        $query = $query->paginate($resultPerPage);

        return view('backend/articles', [ 
            'default_pagename' => 'บทความ',
            'query' => $query,
        ]);
    }
    public function BN_articles_add(Request $request)
    {
        return view('backend/articles-add', [ 
            'default_pagename' => 'เพิ่มบทความ',
        ]);
    }
    public function BN_articles_add_action(Request $request)
    {
        // dd($request);
        $articles = new articlesModel;

        if($request->hasFile('feature')){

            if(isset($Customer->feature)){
                $oldPath = public_path($Customer->feature);
                if(File::exists($oldPath)){
                    File::delete($oldPath);
                }
            }

            $file = $request->file('feature');
            $destinationPath = public_path('/uploads/articles-feature');
            $filename = $file->getClientOriginalName();

            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            $newfilenam = time().'-'.uniqid().'.'.$ext;
            $file->move($destinationPath, $newfilenam);
            $filepath = 'uploads/articles-feature/'.$newfilenam;

            $articles->feature = $filepath;
        }


        $articles->users_id = $request->users_id;
        $articles->article_name = $request->article_name;
        $articles->excerpt = $request->excerpt;
        $articles->content = $request->content;

        $articles->save();

        return redirect(route('BN_articles'))->with('success', 'สร้างสำเร็จ !!!');

    }
}
