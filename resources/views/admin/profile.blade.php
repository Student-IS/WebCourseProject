@extends('layouts.app')
@section('content')
    <h3>Пользователь {{$user->name}}. Профиль</h3>
    <div class="row no-gutters">
        <div class="col">
            <h5>Подробности</h5>
            <table class="table">
                <tbody>
                <tr><td>Имя</td><td>{{$user->name}}</td></tr>
                <tr><td>Адрес электронной почты (E-mail)</td><td>{{$user->email}}</td></tr>
                <tr><td>Дата подтверждения адреса электронной почты</td><td>{{$user->email_verified_at}}</td></tr>
                <tr><td>Номер учётной записи</td><td>{{$user->id}}</td></tr>
                <tr><td>Дата создания учётной записи</td><td>{{$user->created_at}}</td></tr>
                <tr><td>Дата обновления учётной записи</td><td>{{$user->updated_at}}</td></tr>
                </tbody>
            </table>
        </div>
        <div class="col">
            <h5>Права пользователя</h5>
        </div>
    </div>
    <div class="row no-gutters justify-content-center">
        <div class="btn-group">
            <input type="submit" class="btn btn-primary" value="Обновить">
            <a href="/admin/users" class="btn btn-outline-primary">Назад к списку</a>
            <button class="btn btn-outline-danger">Удалить</button>
        </div>
    </div>
@endsection