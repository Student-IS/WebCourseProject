<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    function index()
    {
        return view('user.about');
    }

    function history()
    {
        return view('user.history');
    }

    function service()
    {
        return view('user.service');
    }

    function awards()
    {
        return view('user.awards');
    }

    function reviews()
    {
        return view('user.reviews');
    }
}
