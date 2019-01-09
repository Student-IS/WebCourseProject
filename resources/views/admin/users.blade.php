@extends('layouts.app')
@section('content')
    <h3>Список зарегистрированных пользователей</h3>
    <table class="table">
        <tbody>
        <tr><th>E-mail</th><th>Имя</th><th>Зарегистрирован</th><th></th></tr>
        @foreach($users as $u)
            <tr><td>{{$u->email}}</td><td>{{$u->name}}</td><td>{{$u->created_at}}</td><td><a href="/admin/users/{{$u->id}}">Подробнее</a></td></tr>
        @endforeach
        </tbody>
    </table>
    @isset($deleted)
        <div class="alert alert-info alert-dismissible" role="alert">
            Профиль №{{$deleted[0]}} ({{$deleted[1]}}) был удалён
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endisset
@endsection