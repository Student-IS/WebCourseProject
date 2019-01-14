@extends('layouts.app')
@section('content')
    <h3>Список зарегистрированных пользователей</h3>
    @isset($deleted)
        <div class="alert alert-info alert-dismissible" role="alert">
            Удалён профиль с номером {{$deleted}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endisset
    <table class="table">
        <tbody>
        <tr><th>Номер</th><th>E-mail</th><th>Имя</th><th>Зарегистрирован</th><th></th></tr>
        @foreach($users as $u)
            <tr><td>{{$u->id}}</td><td>{{$u->email}}</td><td>{{$u->name}}</td><td>{{$u->created_at}}</td><td><a href="/admin/users/{{$u->id}}">Подробнее</a></td></tr>
        @endforeach
        </tbody>
    </table>
    <div class="row no-gutters mt-3 justify-content-center">{{$users->links()}}</div>
    <div class="row no-gutters justify-content-center">
        <div class="btn-group mt-3">
            <a href="/admin" class="btn btn-outline-primary"> << Назад к средствам администрирования</a>
        </div>
    </div>
@endsection