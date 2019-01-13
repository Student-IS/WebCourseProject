@extends('layouts.app')
@section('content')
    <h3>Здравствуйте, {{$user->name}}</h3>
    <p>Данные Вашего профиля</p>
    <form id="userUpd" action="/profile/update" method="POST">
        @csrf @method('PUT')
        <div class="row no-gutters">
            <div class="col mr-2">
                <h5>Подробности</h5>
                <table class="table">
                    <tbody>
                    <tr>
                        <td colspan="2">
                            <label for="name">Имя</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Имя пользователя" value="{{$user->name}}" required>
                        </td>
                    </tr>
                    <tr><td>Адрес электронной почты (E-mail)</td><td>{{$user->email}}</td></tr>
                    <tr><td>Дата подтверждения адреса электронной почты</td><td>{{$user->email_verified_at}}</td></tr>
                    <tr><td>Дата создания учётной записи</td><td>{{$user->created_at}}</td></tr>
                    <tr><td>Дата обновления учётной записи</td><td>{{$user->updated_at}}</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="col ml-2">
                <h5>Права</h5>
                <table class="table">
                    <tbody>
                    @if($user->rights()->where('name','basic')->exists()) <tr><td>Базовые</td></tr> @endif
                    @if($user->rights()->where('name','view_bookings')->exists()) <tr><td>Просмотр списка заявок на бронирование</td></tr> @endif
                    @if($user->rights()->where('name','edit_content')->exists()) <tr><td>Редактирование содержимого страниц</td></tr> @endif
                    @if($user->rights()->where('name','add_admins')->exists()) <tr><td>Управление правами пользователей</td></tr> @endif
                    </tbody>
                </table>
                @isset($updated)
                    <div class="alert alert-success alert-dismissible" role="alert">
                        Учётная запись обновлена
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endisset
            </div>
        </div>
    </form>
    <form id="userDel" action="/profile/delete" method="POST" hidden>
        @csrf @method('DELETE')
    </form>
    <div class="row no-gutters justify-content-center">
        <div class="btn-group mt-3">
            <a href="/" class="btn btn-outline-primary"> << На главную</a>
            <input type="submit" form="userUpd" class="btn btn-outline-primary" value="Обновить">
            <button form="userDel" class="btn btn-outline-danger">Удалить учётную запись</button>
        </div>
    </div>
@endsection