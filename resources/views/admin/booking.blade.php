@extends('layouts.app')
@section('content')
    <h3>Заявки</h3>
    @isset($cancelled)
        <div class="alert alert-info alert-dismissible" role="alert">
            Отменено бронирование объекта с номером {{$cancelled}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endisset
    @isset($sold)
        <div class="alert alert-info alert-dismissible" role="alert">
            Продан объект с номером {{$sold}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endisset
    <p>Показать недвижимость в категории:
        @isset($type)
            <?php $types = ['residential', 'country', 'commercial'] ?>
            @foreach($types as $t)
                @if($t != $type)
                    <a href="/admin/booking?class={{$t}}">@lang("realty.{$t}")</a>,
                @endif
            @endforeach
            <a href="/admin/booking">@lang('realty.all')</a>.
    </p>
    <h4>@lang("realty.category"): @lang("realty.{$type}")</h4>
    @else
        <a href="/admin/booking?class=residential">@lang('realty.residential')</a>,
        <a href="/admin/booking?class=country">@lang('realty.country')</a>,
        <a href="/admin/booking?class=commercial">@lang('realty.commercial')</a>.
        </p>
    @endisset
    <table class="table">
        <tbody>
        <tr><th>№</th><th>Изображение</th><th>Название</th><th>@lang("realty.category")</th><th>Об объекте</th><th>Контакты покупателя</th><th>Продано</th><th colspan=2>Действия</th></tr>
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
                <td>@lang("realty.{$r->realtyType->type_name}")</td>
                <td><a href="/realty/{{$r->id}}?src=list">Подробнее</a></td>
                <td>
                    {{$r->user->email}},<br>
                    {{$r->user->name}}
                </td>
                @isset($r->sold_at)
                    <td>
                        <span class="badge badge-success">{{$r->sold_at}}</span>
                    </td>
                    <td></td>
                    <td></td>
                @else
                    <td>Нет</td>
                    <td>
                        <form id="sell{{$r->id}}" action="/admin/realty/sell/{{$r->id}}" method="POST" hidden>
                            @csrf @method('PUT')
                        </form>
                        <input type="submit" form="sell{{$r->id}}" class="btn btn-outline-primary" value="Продать">
                    </td>
                    <td>
                        <form id="cancelBooking{{$r->id}}" action="/realty/cancelBooking/{{$r->id}}" method="POST" hidden>
                            @csrf @method('PUT')
                        </form>
                        <input type="submit" form="cancelBooking{{$r->id}}" class="btn btn-outline-secondary" value="Отменить">
                    </td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="row no-gutters mt-3 justify-content-center">{{$realty->links()}}</div>
    <div class="row no-gutters justify-content-center">
        <div class="btn-group mt-3">
            <a href="/admin" class="btn btn-outline-primary"> << Назад к средствам администрирования</a>
        </div>
    </div>
@endsection