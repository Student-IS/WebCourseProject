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
@endsection