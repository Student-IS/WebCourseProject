@extends('layouts.app')
@section('content')
    <h3>Создание новой записи</h3>
    <form id="postAdd" action="/admin/news" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row no-gutters">
            <div class="col mr-2 form-group">
                <label for="title">Заголовок</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Заголовок новости" required>
                <label for="image">Иллюстрация</label>
                <input type="file" accept="image/*" class="form-control-file" id="image" name="image">
                <br>
                <label for="short">Краткое описание новости (отображается на главной странице)</label>
                <textarea id="short" name="short" class="form-control" placeholder="Краткое описание"></textarea>
            </div>
            <div class="col ml-2 form-group">
                <label for="text">Основной текст новости</label>
                <textarea id="text" name="text" class="form-control" rows="10" placeholder="Основной текст"></textarea>
            </div>
        </div>
        <!-- Optional collapse form controls for localization -->
        <a href="#enLocale" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="enLocale">Добавление перевода на английский язык</a>
        <div class="collapse" id="enLocale">
            <div class="row no-gutters">
                <div class="col mr-2 form-group">
                    <label for="enTitle">Заголовок на английском</label>
                    <input type="text" class="form-control" id="enTitle" name="enTitle" placeholder="Title of the post">
                    <label for="enShort">Краткое описание новости на английском</label>
                    <textarea id="short" name="enShort" class="form-control" placeholder="The short description"></textarea>
                </div>
                <div class="col ml-2 form-group">
                    <label for="enText">Основной текст новости на английском</label>
                    <textarea id="text" name="enText" class="form-control" rows="10" placeholder="The main text"></textarea>
                </div>
            </div>
        </div>
    </form>
    <div class="row no-gutters justify-content-center">
        <div class="btn-group mt-3">
            <a href="/admin/news" class="btn btn-outline-primary"> << Назад к списку</a>
            <input type="submit" form="postAdd" class="btn btn-outline-success" value="Опубликовать запись">
            <input type="reset" form="postAdd" class="btn btn-outline-warning" value="Очистить форму">
        </div>
    </div>
@endsection