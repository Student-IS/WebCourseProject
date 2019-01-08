@extends('layouts.app')
@section('content')
    <h3>Недвижимость в категории {{$type}}</h3>
    <hr>
    @foreach($objects as $obj)
        <h4>{{$obj->name}}</h4>
        <small>{{$obj->created_at}}</small>
        <p>{{$obj->ru_description}}</p>
        <p>{{$obj->realtyType()->type_name}}</p>
    @endforeach
@endsection