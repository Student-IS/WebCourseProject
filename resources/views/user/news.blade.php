@extends('layouts.app')
@section('content')
    <h3>Новости</h3>
    @foreach($news as $post)
        <hr>
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
        <p>{{$post->ru_short}}</p>
        <a href="/news/{{$post->id}}" class="btn btn-outline-primary">Подробнее</a>
    @endforeach
    <div class="row no-gutters mt-3 justify-content-center">{{$news->links()}}</div>
@endsection