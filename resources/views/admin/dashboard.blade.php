@extends('layouts.app')
@section('content')
    <h3>Панель инструментов администрирования</h3>
    <p>Здравствуйте, {{$name}}!</p>
    <p>Доступны средства администрирования для следующих разделов:</p>
    <ul class="nav flex-column">
        <li class="nav-item"><a class="nav-link" href="/admin/news">Новости</a></li>
        <li class="nav-item"><a class="nav-link" href="/admin/realty">Недвижимость</a></li>
        <li class="nav-item"><a class="nav-link" href="/admin/staticContent">Неизменяемые страницы</a></li>
        <li class="nav-item"><a class="nav-link" href="/admin/booking">Список заявок на бронирование</a></li>
        <li class="nav-item"><a class="nav-link" href="/admin/users">Пользователи</a></li>
    </ul>
@endsection