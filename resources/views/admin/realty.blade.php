@extends('layouts.app')
@section('content')
    <h3>Недвижимость</h3>
    @isset($deleted)
        <div class="alert alert-info alert-dismissible" role="alert">
            Объект "{{$deleted[1]}}" (созданный {{$deleted[2]}}, №{{$deleted[0]}}) был удалён
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endisset
    @isset($created)
        <div class="alert alert-success alert-dismissible" role="alert">
            Создан новый объект "{{$created[1]}}" ({{$created[2]}}, №{{$created[0]}})
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endisset
    <a href="/admin/realty/create" class="btn btn-outline-success mb-3">Добавить новый объект</a>
    <p>Показать недвижимость в категории:
        <a href="/admin/realty?class=residential"> @lang('realty.residential')</a>,
        <a href="/admin/realty?class=country"> @lang('realty.country')</a>,
        <a href="/admin/realty?class=commercial"> @lang('realty.commercial')</a>.
        <a href="/admin/realty"> @lang('realty.ShowAll')</a>.
    </p>
    @isset($type)
        <h4>@lang("realty.category"): @lang("realty.{$type}")</h4>
    @endisset
    <table class="table">
        <tbody>
        <tr><th>№</th><th>Изображение</th><th>Название</th><th>Адрес</th><th>@lang("realty.category")</th><th>Заказана</th><th>Дата обновления</th><th></th></tr>
        @foreach($realty as $r)
            <tr>
                <td>{{$r->id}}</td>
                <td>
                    @if($r->realtyImages()->exists())
                        <img src="{{asset('storage/'.$r->realtyImages()->firstOrFail()->image)}}" title="{{$r->name}}" alt="{{$r->name}}" style="height:50px;">
                    @else
                        Нет
                    @endif
                </td>
                <td>{{$r->name}}</td>
                <td>{{$r->address}}</td>
                <td>@lang("realty.{$r->realtyType->type_name}")</td>
                <td>
                    @if($r->booking()->exists()) Да
                    @else Нет
                    @endif
                </td>
                <td>{{$r->updated_at}}</td>
                <td><a href="/admin/realty/{{$r->id}}">Подробнее</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="row no-gutters mt-3 justify-content-center">{{$realty->links()}}</div>
@endsection