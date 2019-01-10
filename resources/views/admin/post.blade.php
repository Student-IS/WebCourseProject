@extends('layouts.app')
@section('content')
    <h3>Редактирование записи "{{$post->ru_title}}"</h3>
        <table class="table">
            <tbody>
            <tr><td>Дата создания записи</td><td>Дата обновления записи</td></tr>
            <tr><td>{{$post->created_at}}</td><td>{{$post->updated_at}}</td></tr>
            </tbody>
        </table>
    <form id="postUpd" action="/admin/news/{{$post->id}}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="row no-gutters">
            <div class="col mr-2 form-group">
                <label for="title">Заголовок</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Заголовок новости" value="{{$post->ru_title}}" required>
                <label for="image">Иллюстрация</label>
                <input type="file" accept="image/*" class="form-control-file" id="image" name="image">
                @isset($post->image)
                    <a href="{{asset('storage/'.$post->image)}}" class="btn btn-outline-primary">Посмотреть текущую иллюстрацию</a>
                @endisset
                <br>
                <label for="short">Краткое описание новости (отображается на главной странице)</label>
                <textarea id="short" name="short" class="form-control" placeholder="Краткое описание">{{$post->ru_short}}</textarea>
            </div>
            <div class="col ml-2 form-group">
                <label for="text">Основной текст новости</label>
                <textarea id="text" name="text" class="form-control" rows="10" placeholder="Основной текст">{{$post->ru_text}}</textarea>
            </div>
        </div>
        <!-- Optional collapse form controls for localization -->
        <a href="#enLocale" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="enLocale">Добавление перевода на английский язык</a>
        <div class="collapse" id="enLocale">
            <div class="row no-gutters">
                <div class="col mr-2 form-group">
                    <label for="enTitle">Заголовок на английском</label>
                    <input type="text" class="form-control" id="enTitle" name="enTitle" placeholder="Title of the post" value="{{$post->en_title}}">
                    <label for="enShort">Краткое описание новости на английском</label>
                    <textarea id="short" name="enShort" class="form-control" placeholder="The short description">{{$post->en_short}}</textarea>
                </div>
                <div class="col ml-2 form-group">
                    <label for="enText">Основной текст новости на английском</label>
                    <textarea id="text" name="enText" class="form-control" rows="10" placeholder="The main text">{{$post->en_text}}</textarea>
                </div>
            </div>
        </div>
    </form>
    <form id="postDel" action="/admin/news/{{$post->id}}" method="POST" hidden>
        @csrf @method('DELETE')
    </form>
    @isset($updated)
        <div class="alert alert-success alert-dismissible" role="alert">
            Запись обновлена
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endisset
    <div class="row no-gutters justify-content-center">
        <div class="btn-group mt-3">
            <a href="/admin/news" class="btn btn-outline-primary"> << Назад к списку</a>
            <input type="submit" form="postUpd" class="btn btn-outline-primary" value="Обновить">
            <input type="submit" form="postDel" class="btn btn-outline-danger" value="Удалить">
        </div>
    </div>
@endsection