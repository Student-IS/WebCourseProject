<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::latest()->orderBy('id','desc')->paginate(5);
        return view('user.news', ['news' => $news]);
    }

    public function indexAdmin()
    {
        $news = News::latest()->orderBy('id','desc')->paginate(10);
        return view('admin.news', ['news' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.postCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new News();
        $post->ru_title = $request->title;
        $post->ru_short = $request->short;
        $post->ru_text = $request->text;

        if ($request->hasFile('image'))
        {
            $f = $request->file('image');
            if($f->isValid())
            {
                //$f->storeAs('img/news', $f->getClientOriginalName(), 'public');
                //$post->image = 'img/news/'.$f->getClientOriginalName();
                $path = Storage::disk('public')->put('img/news', $f);
                $post->image = $path;
            }
        }

        $post->en_title = $request->enTitle;
        $post->en_short = $request->enShort;
        $post->en_text = $request->enText;
        $post->save();

        $news = News::latest()->orderBy('id','desc')->get();
        return view('admin.news', ['news' => $news, 'created' => [$post->id, $post->ru_title, $post->created_at]]);
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
            $f = $request->file('image');
            if($f->isValid())
            {
                if (isset($post->image) && Storage::disk('public')->exists($post->image))
                {
                    Storage::disk('public')->move($post->image, 'img/news/bak/'.basename($post->image));
                }
                $path = Storage::disk('public')->put('img/news', $f);
                $post->image = $path;
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
        $title = $post->ru_title;
        $datetime = $post->created_at;

        if (isset($post->image))
        {
            Storage::disk('public')->move($post->image, 'img/news/bak/' . basename($post->image));
        }
        $post->delete();
        $news = News::latest()->orderBy('id','desc')->get();
        return view('admin.news', ['news' => $news, 'deleted' => [$id, $title, $datetime]]);
    }
}
