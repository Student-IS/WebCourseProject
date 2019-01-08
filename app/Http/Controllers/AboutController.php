<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StaticContent;

class AboutController extends Controller
{
    function index()
    {
        return view('user.about');
    }

    function history()
    {
        $data = StaticContent::where('page_name','=','history')->first();
        return view('user.history', ['text' => $data->ru_content]);
    }

    function service()
    {
        $data = StaticContent::where('page_name','=','service')->first();
        return view('user.service', ['text' => $data->ru_content]);
    }

    function awards()
    {
        $data = StaticContent::where('page_name','=','awards')->first();
        return view('user.awards', ['text' => $data->ru_content]);
    }

    function reviews()
    {
        $data = StaticContent::where('page_name','=','reviews')->first();
        return view('user.reviews', ['text' => $data->ru_content]);
    }
}
