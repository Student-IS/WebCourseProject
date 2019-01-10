@extends('layouts.app')
@section('content')
    <h4>{{$post->ru_title}}</h4>
    <small>
        {{$post->created_at}}
        @if($post->created_at != $post->updated_at)
            , обновлено {{$post->updated_at}}
        @endif
    </small>
    @isset($post->image)
        <img class="img-row h-360-480" src="{{asset('storage/'.$post->image)}}" title="{{$post->ru_title}}" alt="{{$post->ru_title}}">
    @endisset
    <div>{{$post->ru_text}}</div>
    <hr>
    <a href="/news" class="btn btn-outline-primary">Ко всем новостям</a>
@endsection