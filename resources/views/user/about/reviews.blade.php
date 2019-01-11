@extends('layouts.app')
@section('content')
    <h3>Отзывы</h3>
    <div class="row no-gutters justify-content-center mb-3">
        <div class="col-6 mr-3">
            <img src="/img/reviews.jpg" class="img-thumbnail w-100" alt="Отзывы" title="Отзывы">
        </div>
        <div class="col">
            <p>{{$content}}</p>
        </div>
    </div>
@endsection