<!doctype html>
<html lang="en">
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
    <header class="row no-gutters justify-content-center bg-primary">
        <div class="header-wcp container w-960-1200">
            <nav class="navbar navbar-expand justify-content-center fixed-top navbar-dark bg-primary">
                <a class="navbar-brand" href="/">
                    <img alt="Logo" title="Logo" src="/img/logo-sm.png" style="height: 75px;">
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
                            <a class="dropdown-item" href="/realty/residential">Жилая</a>
                            <a class="dropdown-item" href="/realty/country">Загородная</a>
                            <a class="dropdown-item" href="/realty/commercial">Коммерческая</a>
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
                    <li class="nav-item">
                        <a class="nav-link" href="/admin">Раздел администратора</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <main class="flex-grow-1 row no-gutters justify-content-center bg-secondary">
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