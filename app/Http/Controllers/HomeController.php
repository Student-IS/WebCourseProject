<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RealtyImage;
use App\RealtyObject;
use App\News;

class HomeController extends Controller
{
    private const SLIDES_COUNT = 5;
    public function index()
    {
        $imCount = RealtyImage::all()->count();
        if ($imCount >= self::SLIDES_COUNT)
        {
            $slides = RealtyImage::latest()->take(self::SLIDES_COUNT)->get();
        }
        elseif($imCount > 0)
        {
            $slides = RealtyImage::all()->take(self::SLIDES_COUNT)->get();
        }
        else
        {
            $slides = null;
        }

        $count = RealtyObject::all()->count();
        $news = News::latest()->orderBy('id','desc')->take(3)->get();

        return view('user.home', ['slides' => $slides, 'totalCount' => $count, 'news' => $news]);
    }
}
