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
    <p>Показать недвижимость в категории:
    @isset($type)
        <?php $types = ['residential', 'country', 'commercial'] ?>
        @foreach($types as $t)
            @if($t != $type)
                <a href="/realty?class={{$t}}">@lang("realty.{$t}")</a>,
            @endif
        @endforeach
        <a href="/realty">@lang('realty.all')</a>.
        </p>
        <h4>@lang("realty.category"): @lang("realty.{$type}")</h4>
    @else
        <a href="/realty?class=residential">@lang('realty.residential')</a>,
        <a href="/realty?class=country">@lang('realty.country')</a>,
        <a href="/realty?class=commercial">@lang('realty.commercial')</a>.
        </p>
    @endisset
    <div class="card-deck">
        @forelse($realty as $r)
            <div class="card">
                @if($r->realtyImages()->exists())
                    <img class="card-img-top" src="{{asset('storage/'.$r->realtyImages()->firstOrFail()->image)}}" alt="{{$r->name}}" title="{{$r->name}}">
                @endif
                <div class="card-body">
                    <h5>{{$r->name}}</h5>
                    <p class="card-text">{{$r->address}}</p>
                    <table class="table">
                        <tbody>
                        <tr><th>Цена</th><td>{{number_format($r->cost, 2, ',', ' ')}} р.</td></tr>
                        <tr><th>Площадь</th><td>{{number_format($r->area_total, 1, ',', ' ')}} кв. м</td></tr>
                        <tr><th>Тип</th><td class="text-capitalize">@lang("realty.{$r->realtyType->type_name}")</td></tr>
                        </tbody>
                    </table>
                    @isset($r->booked_by)
                        <div class="alert alert-primary">Забронировано</div>
                    @endif
                    <a href="/realty/{{$r->id}}" class="btn btn-outline-primary">Подробнее</a>
                </div>
                <div class="card-footer">{{$r->updated_at}}</div>
            </div>
        @empty
            <h5>Пусто</h5>
        @endforelse
    </div>
    <div class="row no-gutters mt-3 justify-content-center">{{$realty->links()}}</div>
@endsection