<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RealtyImage;
use App\RealtyObject;
use App\News;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    private const SLIDES_COUNT = 8;
    public function index()
    {
        $imCount = RealtyImage::all()->count();
        if ($imCount >= self::SLIDES_COUNT)
        {
            $slides = RealtyImage::latest()->take(self::SLIDES_COUNT)->get();
        }
        elseif($imCount > 0)
        {
            $slides = RealtyImage::all();
        }
        else
        {
            $slides = null;
        }

        $count = RealtyObject::whereNull('sold_at')->count();
        $news = News::latest()->orderBy('id','desc')->take(3)->get();

        return view('user.home', ['slides' => $slides, 'totalCount' => $count, 'news' => $news]);
    }
}
