@extends('layouts.app')
@section('content')
    <h3>Объект "{{$r->name}}"</h3>
    <div class="row no-gutters mb-3">
        @if($r->realtyImages()->exists())
            <div id="slider" class="carousel slide w-100" data-ride="carousel">
                <div class="carousel-inner bg-secondary">
                    @foreach($r->realtyImages as $slide)
                        <div class="carousel-item slider-wcp @if($loop->first)active @endif">
                            <img class="d-block" src="{{asset('storage/'.$slide->image)}}" alt="{{$slide->realtyObject->name}}">
                        </div>
                    @endforeach
                    <a class="carousel-control-prev" href="#slider" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Предыдущий</span>
                    </a>
                    <a class="carousel-control-next" href="#slider" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Следующий</span>
                    </a>
                </div>
            </div>
        @endif
    </div>
    <div class="row no-gutters">
        <div class="col mr-2">
            <h5>Описание</h5>
            <p>{{$r->ru_description}}</p>
            <h5>Адрес</h5>
            <p>{{$r->address}}</p>
            <h5>Контакты</h5>
            <div class="alert alert-primary">
                <p>Телефон: {{$r->phone}}</p>
                @isset($r->email)
                    <p>Электронная почта: {{$r->email}}</p>
                @endisset
            </div>
        </div>
        <div class="col ml-2 form-group">
            <table class="table">
                <tbody>
                <tr><th>Тип</th><td>@lang("realty.{$r->realtyType->type_name}")</td></tr>
                <tr><th>Цена</th><td>{{number_format($r->cost, 2, ',', ' ')}} р.</td></tr>
                <tr><th>Площадь</th><td>{{number_format($r->area_total, 1, ',', ' ')}} кв. м</td></tr>
                <tr><th>Жилая площадь</th><td>{{number_format($r->area_residential, 1, ',', ' ')}} кв. м</td></tr>
                <tr><th>Кухня</th><td>{{number_format($r->area_kitchen, 1, ',', ' ')}} кв. м</td></tr>
                <tr><th>Всего этажей</th><td>{{$r->floors}}</td></tr>
                <tr><th>Этаж</th><td>{{$r->floor}}</td></tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row no-gutters">
        <div class="col mr-3">
            @isset($updated)
                <div class="alert alert-success alert-dismissible" role="alert">
                    Информация обновлена
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endisset
            @if($booked)
                <div class="alert alert-success alert-dismissible" role="alert">
                    Объект недвижимости забронирован
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endisset
            @isset($r->sold_at)
                <div class="alert alert-warning" role="alert">
                    Объект продан
                </div>
            @endisset
        </div>
    </div>
    <div class="row no-gutters justify-content-center">
        <div class="btn-group mt-3">
            <a href="/realty" class="btn btn-outline-primary"> << Назад к списку</a>
            @auth
                <form id="realtyBooking"
                      @if($r->booked_by && ($r->booked_by == Auth::id()))
                        action="/realty/cancelBooking/{{$r->id}}"
                      @else
                        action="/realty/book/{{$r->id}}"
                      @endif
                      method="POST" hidden>
                    @csrf @method('PUT')
                </form>
                <input type="submit" form="realtyBooking"
                    @isset($r->booked_by)
                        class="btn btn-outline-secondary" value="Забронировано" disabled
                    @else
                        class="btn btn-outline-primary" value="Забронировать"
                    @endif
                    >
                @if($r->booked_by == Auth::id() && !isset($r->sold_at))
                    <input type="submit" form="realtyBooking" class="btn btn-outline-primary" value="Отменить бронирование">
                @endif
            @endauth
            @isset($src)
                @if($src == 'profile')
                    <a href="/profile" class="btn btn-outline-primary">Назад в личный кабинет</a>
                @elseif($src == 'list')
                    <a href="/admin/booking" class="btn btn-outline-primary">Назад к списку заявок</a>
                @endif
            @endisset
        </div>
    </div>
@endsection