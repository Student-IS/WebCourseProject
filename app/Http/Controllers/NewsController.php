<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\File;

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(News $post)
    {
        return view('admin.post', ['post' => $post]);
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
        $post->ru_title = $request->title;
        $post->ru_short = $request->short;
        $post->ru_text = $request->text;

        if ($request->hasFile('image'))
        {
            if($request->file('image')->isValid())
            {
                if (isset($post->image))
                {
                    $prev = new File($post->image);
                    $prev->move('img/news/bak');
                }
                $request->image->store('img/news');
            }
        }

        $post->en_title = $request->enTitle;
        $post->en_short = $request->enShort;
        $post->en_text = $request->enText;

        $post->updated_at = now();
        $post->save();
        return view('admin.post', ['post' => $post, 'updated' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $post)
    {
        $id = $post->id;
        $title = $post->title;
        $datetime = $post->created_at;

        $post->delete();
        $news = News::latest()->orderBy('id','desc')->get();
        return view('admin.news', ['news' => $news, 'deleted' => [$id, $title, $datetime]]);
    }
}
