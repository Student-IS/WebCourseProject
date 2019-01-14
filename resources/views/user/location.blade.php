@extends('layouts.app')
@section('content')
    <h3 class="mb-3">Схема проезда</h3>
    <div class="row justify-content-center mb-3">
        <div class="col-6">
            <a href="https://yandex.ru/maps/?um=constructor%3A5bc82227aa72ff412d61726fbce0662ee84239f0bcc2bbf8855e13deb34a68dd&amp;source=constructorStatic" target="_blank"><img src="https://api-maps.yandex.ru/services/constructor/1.0/static/?um=constructor%3A5bc82227aa72ff412d61726fbce0662ee84239f0bcc2bbf8855e13deb34a68dd&amp;width=600&amp;height=450&amp;lang=ru_RU" alt="" style="border: 0;" /></a>
            <h5 class="mt-3">Как нас найти</h5>
            <p>Рядом с нами в Москве находится знаменитый стадион &laquo;Лужники&raquo; (через Воробьёвскую набережную и реку Москву).</p>
            <p>Однако значительно ближе к нам находится другой ориентир &mdash; здание Московского Государственного Университета.</p>
            <p>Между Мичуринским проспектом и Университетской площадью есть газон напротив Ботанического сада МГУ. На нём и расположен наш офис.</p>
        </div>
    </div>
    <!--
    <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A5bc82227aa72ff412d61726fbce0662ee84239f0bcc2bbf8855e13deb34a68dd&amp;source=constructor" width="100%" height="450" frameborder="0"></iframe>
    -->
@endsection