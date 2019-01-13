<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Auth::user()->rights()->count() == 0 ||
            (Auth::user()->rights()->count() == 1 && Auth::user()->rights[0]->name == 'basic'))
        {
            return redirect()->route('home');
        }

        return view('admin.dashboard', ['name' => Auth::user()->name]);
    }
}
