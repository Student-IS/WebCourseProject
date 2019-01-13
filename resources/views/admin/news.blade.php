@extends('layouts.app')
@section('content')
    <h3>Новости</h3>
    @isset($deleted)
        <div class="alert alert-info alert-dismissible" role="alert">
            Удалена запись с номером {{$deleted}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endisset
    @isset($created)
        <div class="alert alert-success alert-dismissible" role="alert">
            Номер созданной записи: {{$created}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endisset
    <a href="/admin/news/create" class="btn btn-outline-success mb-3">Добавить новую запись</a>
    <table class="table">
        <tbody>
        <tr><th>№</th><th>Заголовок</th><th>Иллюстрация</th><th>Дата создания</th><th>Дата обновления</th><th></th></tr>
        @foreach($news as $post)
            <tr>
                <td>{{$post->id}}</td><td>{{$post->ru_title}}</td>
                <td>
                    @if(isset($post->image))
                        <img src="{{asset('storage/'.$post->image)}}" title="{{$post->ru_title}}" alt="{{$post->ru_title}}" style="height:30px;">
                    @else
                        Нет
                    @endif
                </td>
                <td>{{$post->created_at}}</td><td>{{$post->updated_at}}</td>
                <td><a href="/admin/news/{{$post->id}}">Подробнее</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="row no-gutters mt-3 justify-content-center">{{$news->links()}}</div>
@endsection