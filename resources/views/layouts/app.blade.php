<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/bootstrap.min.css"> <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="/css/app.custom.css"> <!-- Custom styles -->
    <title>Продажа недвижимости &mdash; Курсовой проект</title>
</head>
<body>
<div class="container-wcp d-flex">
    <header class="row no-gutters justify-content-center bg-wcp-primary">
        <div class="header-wcp col w-960-1200">
            <nav class="navbar navbar-expand justify-content-center navbar-dark fixed-top bg-wcp-primary">
                <a class="navbar-brand" href="/">
                    <img alt="Logo" title="Logo" src="/img/logo.png" style="height: 75px;">
                </a>
                <ul class="navbar-nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/news">Новости</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dd-realty" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Недвижимость</a>
                        <div class="dropdown-menu" aria-labelledby="dd-realty">
                            <a class="dropdown-item text-capitalize" href="/realty?class=residential">@lang('realty.residential')</a>
                            <a class="dropdown-item text-capitalize" href="/realty?class=country">@lang('realty.country')</a>
                            <a class="dropdown-item text-capitalize" href="/realty?class=commercial">@lang('realty.commercial')</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dd-about" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            О компании</a>
                        <div class="dropdown-menu" aria-labelledby="dd-about">
                            <a class="dropdown-item" href="/about/history">История</a>
                            <a class="dropdown-item" href="/about/service">Услуги</a>
                            <a class="dropdown-item" href="/about/awards">Награды</a>
                            <a class="dropdown-item" href="/about/reviews">Отзывы</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/location">Схема проезда</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/sitemap">Карта сайта</a>
                    </li>
                    <li class="nav-item dropdown">
                    @guest
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            @lang('auth.login') <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('login') }}">@lang('auth.login')</a>
                            @if (Route::has('register'))
                                <a class="dropdown-item" href="{{ route('register') }}">@lang('auth.register')</a>
                            @endif
                        </div>
                    @else
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/profile">Личный кабинет</a>
                            @if(Auth::user()->rights()->count() > 1)
                                <a class="dropdown-item" href="/admin">Раздел администратора</a>
                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                @lang('auth.logout')
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" hidden>
                                @csrf
                            </form>
                        </div>
                    @endguest
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <main class="flex-grow-1 row no-gutters justify-content-center bg-wcp-secondary">
        <div class="w-960-1200 content-place bg-light">
            @yield('content')
        </div>
    </main>
    <footer class="bg-dark">
        <div class="row no-gutters justify-content-center">
            <div class="footer-wcp col w-960-1200">
                <div class="row no-gutters">
                    <div class="col"><p class="text-white">2018-2019 &copy; Student IS</p></div>
                    <div class="col"><a href="https://github.com/Student-IS/WebCourseProject" class="text-white">Проект на GitHub</a></div>
                </div>
            </div>
        </div>
    </footer>
</div>
<script src="/js/jquery-3.3.1.slim.min.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
</body>
</html>