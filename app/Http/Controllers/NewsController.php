<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::latest()->orderBy('id','desc')->get();
        return view('user.news', ['news' => $news]);
    }

    public function indexAdmin()
    {
        $news = News::latest()->orderBy('id','desc')->get();
        return view('admin.news', ['news' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News $post
     * @return \Illuminate\Http\Response
     */
    public function show(News $post)
    {
        return view('user.post', ['post' => $post]);
    }

    public function showAdmin(News $post)
    {
        return view('admin.post', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(News $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $post)
    {
        //
    }
}
