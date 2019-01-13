@extends('layouts.app')
@section('content')
    <h3>Пользователь {{$user->name}}. Профиль</h3>
    <form id="userUpd" action="/admin/users/{{$user->id}}" method="POST">
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
                    <tr><td>Номер учётной записи</td><td>{{$user->id}}</td></tr>
                    <tr><td>Дата создания учётной записи</td><td>{{$user->created_at}}</td></tr>
                    <tr><td>Дата обновления учётной записи</td><td>{{$user->updated_at}}</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="col ml-2">
                <h5>Права пользователя</h5>
                <table class="table">
                    <tbody>
                    <tr><th>Права</th><th>Наличие</th></tr>
                    <tr>
                        <td><label for="chkBasic">Базовые</label></td>
                        <td>
                            <input type="checkbox" id="chkBasic" name="chkBasic" @if($user->rights()->where('name','basic')->exists()) checked @endif disabled>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="chkBook">Просмотр списка заявок на бронирование</label></td>
                        <td>
                            <input type="checkbox" id="chkBook" name="chkBook" @if($user->rights()->where('name','view_bookings')->exists()) checked @endif>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="chkEdit">Редактирование содержимого страниц</label></td>
                        <td>
                            <input type="checkbox" id="chkEdit" name="chkEdit" @if($user->rights()->where('name','edit_content')->exists()) checked @endif>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="chkAdmin">Управление правами пользователей</label></td>
                        <td>
                            <input type="checkbox" id="chkAdmin" name="chkAdmin" @if($user->rights()->where('name','add_admins')->exists()) checked @endif>
                        </td>
                    </tr>
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
    <form id="userDel" action="/admin/users/{{$user->id}}" method="POST" hidden>
        @csrf @method('DELETE')
    </form>
    <div class="row no-gutters justify-content-center">
        <div class="btn-group mt-3">
            <a href="/admin/users" class="btn btn-outline-primary"> << Назад к списку</a>
            <input type="submit" form="userUpd" class="btn btn-outline-primary" value="Обновить">
            <button form="userDel" class="btn btn-outline-danger">Удалить</button>
        </div>
    </div>
@endsection