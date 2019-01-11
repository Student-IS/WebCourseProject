@extends('layouts.app')
@section('content')
    <h3>История</h3>
    <div class="row no-gutters justify-content-center mb-3">
        <div class="col-6 mr-3">
            <img src="/img/history.jpg" class="img-thumbnail w-100" alt="История" title="История">
        </div>
        <div class="col">
            <p>{{$content}}</p>
        </div>
    </div>
@endsection