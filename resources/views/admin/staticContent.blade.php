@extends('layouts.app')
@section('content')
<h3>Редактирование содержимого справочного раздела "@lang("static.{$pagename}")"</h3>
<div class="row no-gutters">
    <div class="col">
        <form id="staticContentUpd" action="/admin/about/{{$pagename}}" method="POST">
            @csrf @method('PUT')
            <div class="form-group">
                <label for="text">Текст страницы</label>
                <textarea id="text" name="text" class="form-control" rows=10 placeholder="Текст страницы" required>{{$content->ru_content}}</textarea>
                <a href="#enLocale" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="enLocale">Добавление перевода на английский язык</a>
                <div class="collapse" id="enLocale">
                    <textarea id="enText" name="enText" class="form-control" rows=10 placeholder="The text of the page">{{$content->en_content}}</textarea>
                </div>
            </div>
        </form>
    </div>
</div>
@isset($updated)
    <div class="alert alert-success alert-dismissible" role="alert">
        Информация обновлена
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endisset
<div class="row no-gutters justify-content-center">
    <div class="btn-group mt-3">
        <a href="/admin" class="btn btn-outline-primary"> << Назад к разделам</a>
        <input type="submit" form="staticContentUpd" class="btn btn-outline-primary" value="Обновить">
        <input type="reset" form="staticContentUpd" class="btn btn-outline-warning" value="Очистить форму">
    </div>
</div>
@endsection