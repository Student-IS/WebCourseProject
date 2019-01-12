@extends('layouts.app')
@section('content')
    <h3>Панель инструментов администрирования</h3>
    <p>Здравствуйте, {{$name}}!</p>
    <p>Доступны средства администрирования для следующих разделов:</p>
    <ul class="nav nav-pills nav-fill">
        <li class="nav-item"><a class="nav-link" href="/admin/news">Новости</a></li>
        <li class="nav-item"><a class="nav-link" href="/admin/realty">Недвижимость</a></li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dd-about" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Справочные страницы (о компании)</a>
            <div class="dropdown-menu" aria-labelledby="dd-about">
                <a class="dropdown-item" href="/admin/about?name=history">История</a>
                <a class="dropdown-item" href="/admin/about?name=service">Услуги</a>
                <a class="dropdown-item" href="/admin/about?name=awards">Награды</a>
                <a class="dropdown-item" href="/admin/about?name=reviews">Отзывы</a>
            </div>
        </li>
        <li class="nav-item"><a class="nav-link" href="/admin/booking">Список заявок на бронирование</a></li>
        <li class="nav-item"><a class="nav-link" href="/admin/users">Пользователи</a></li>
    </ul>
@endsection