<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StaticContent;

class AboutController extends Controller
{
    public function index()
    {
        return view('user.about');
    }

    public function history()
    {
        $data = StaticContent::where('page_name','history')->firstOrFail();
        return view('user.about.history', ['content' => $data->ru_content]);
    }

    public function service()
    {
        $data = StaticContent::where('page_name','service')->firstOrFail();
        return view('user.about.service', ['content' => $data->ru_content]);
    }

    public function awards()
    {
        $data = StaticContent::where('page_name','awards')->firstOrFail();
        return view('user.about.awards', ['content' => $data->ru_content]);
    }

    public function reviews()
    {
        $data = StaticContent::where('page_name','reviews')->firstOrFail();
        return view('user.about.reviews', ['content' => $data->ru_content]);
    }

    public function edit(Request $request)
    {
        if ($request->has('name'))
        {
            $data = StaticContent::where('page_name', $request->name)->firstOrFail();
        }
        return view('admin.staticContent', ['content' => $data]);
    }

    public function update(Request $request)
    {
        //
        if ($request->has('name'))
        {
            $data = StaticContent::where('page_name', $request->name)->firstOrFail();
        }
        return view('admin.staticContent', ['content' => $data, 'updated' => true]);
    }
}
