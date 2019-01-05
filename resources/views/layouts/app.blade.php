<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <title>Продажа недвижимости &mdash; Курсовой проект</title>
</head>
<body>
<header>
    <div class="container-fluid justify-content-center">
        <nav class="navbar-expand-lg bg-light">
            <a href="/" class="navbar-brand"><img name="Логотип" alt="Логотип" height=100 src="/img/logo-big.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="/" class="nav-link">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a href="news" class="nav-link">Новости</a>
                    </li>
                    <li class="nav-item">
                        <a href="realty" class="nav-link">Недвижимость</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="about" class="nav-link dropdown-toggle" id="dropdownAboutLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            О компании
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownAboutLink">
                            <a href="about/history" class="dropdown-item">Наша история</a>
                            <a href="about/service" class="dropdown-item">Услуги</a>
                            <a href="about/awards" class="dropdown-item">Награды</a>
                            <a href="about/reviews" class="dropdown-item">Отзывы</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="location" class="nav-link">Схема проезда</a>
                    </li>
                    <li class="nav-item">
                        <a href="sitemap" class="nav-link">Карта сайта</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<main class="row justify-content-center bg-secondary">
    <section class="col-7 bg-light">
        <p>Основная секция</p>
        @yield('content')
    </section>
</main>
<footer>
    <div class="container-fluid no-gutters">
        <section class="row justify-content-center bg-dark">
            <div class="col-7 justify-content-center">
                <p>Подвал сайта</p>
            </div>
        </section>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>