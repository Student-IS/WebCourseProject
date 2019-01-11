@extends('layouts.app')
@section('content')
    <h3>&laquo;Горстрой&raquo; &mdash; интернет-магазин недвижимости</h3>
    <hr>
    <div class="row no-gutters justify-content-center">
        <div class="container-fluid">
            <p>На нашем сайте размещено {{$totalCount}} объявлений в различных кателогиях недвижимости</p>
            <ul class="nav nav-pills nav-fill">
                <li class="nav-item"><a class="nav-link text-capitalize" href="/realty?class=residential">@lang('realty.residential')</a></li>
                <li class="nav-item"><a class="nav-link text-capitalize" href="/realty?class=country">@lang('realty.country')</a></li>
                <li class="nav-item"><a class="nav-link text-capitalize" href="/realty?class=commercial">@lang('realty.commercial')</a></li>
            </ul>
        </div>
    </div>
    <hr>
    @isset($slides)
        <div id="slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner bg-secondary">
                @foreach($slides as $slide)
                    <div class="carousel-item slider-wcp @if($loop->first)active @endif">
                        <img class="d-block" src="{{asset('storage/'.$slide->image)}}" alt="{{$slide->realtyObject->name}}">
                    </div>
                @endforeach
                <a class="carousel-control-prev" href="#slider" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Предыдущий</span>
                </a>
                <a class="carousel-control-next" href="#slider" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Следующий</span>
                </a>
            </div>
        </div>
        <hr>
    @endisset
    <div class="row no-gutters justify-content-center">
        <h4 class="mb-3">Новости</h4>
        <div class="card-group">
        @forelse($news as $n)
            <div class="card">
                @isset($n->image)
                    <img class="card-img-top" src="{{asset('storage/'.$n->image)}}" alt="{{$n->ru_title}}">
                @endisset
                <div class="card-body">
                    <h5>{{$n->ru_title}}</h5>
                    <p class="card-text">{{$n->ru_short}}</p>
                    <a href="/news/{{$n->id}}" class="btn btn-outline-primary">Подробнее</a>
                </div>
                <div class="card-footer">{{$n->updated_at}}</div>
            </div>
        @empty
            <h5>Мы готовы к приёму заявок</h5>
        @endforelse
        </div>
    </div>
@endsection