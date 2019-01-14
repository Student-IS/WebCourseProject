@extends('layouts.app')
@section('content')
    <h3>Карта сайта</h3>
    <div class="row justify-content-center">
        <div class="col-6">
            <ul class="flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="/">Главная страница</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/news">Новости</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/realty">Недвижимость</a>
                    <ul class="flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="/realty?class=residential">Жилая</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/realty?class=country">Загородная</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/realty?class=commercial">Коммерческая</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    О компании
                    <ul class="flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="/about/history">История</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about/service">Услуги</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about/awards">Награды</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about/reviews">Отзывы</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/location">Схема проезда</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/sitemap">Карта сайта</a>
                </li>
                <li class="nav-item">
                    Учётные записи
                    <ul class="flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Вход</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/register">Регистрация</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
@endsection