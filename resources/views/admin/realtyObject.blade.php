@extends('layouts.app')
@section('content')
    <h3>Объект "{{$r->name}}"</h3>
    <form id="realtyUpd" action="/admin/realty/{{$r->id}}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="row no-gutters">
            <div class="col mr-2 form-group">
                <table class="table">
                    <tbody>
                    <tr><th>Номер в базе</th><td>{{$r->id}}</td></tr>
                    <tr><td>Дата добавления</td><td>{{$r->created_at}}</td></tr>
                    <tr><td>Дата обновления</td><td>{{$r->updated_at}}</td></tr>
                    </tbody>
                </table>
                <label for="name">Название</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Название" value="{{$r->name}}" required>
                <label for="address">Адрес объекта</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Город, район (необязятельно), улица, дом" value="{{$r->address}}" required>
                <label for="text">Описание объекта</label>
                <textarea id="text" name="text" class="form-control" placeholder="Описание объекта, его особенности" required>{{$r->ru_description}}</textarea>
                <!-- Optional collapse form controls for localization -->
                <a href="#enLocale" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="enLocale">Добавление перевода на английский язык</a>
                <div class="collapse" id="enLocale">
                    <textarea id="enText" name="enText" class="form-control" placeholder="Object description, its features">{{$r->en_description}}</textarea>
                </div>
                <h5>Контакты</h5>
                <label for="phone">Номер телефона</label>
                <input type="tel" class="form-control" id="phone" name="phone" pattern="[0-9]{8-11}" placeholder="От 8 до 11 цифр" value="{{$r->phone}}" required>
                <label for="email">Адрес электронной почты <small>(необязательно)</small></label>
                <input type="email" class="form-control mb-3" id="email" name="email" placeholder="address@example.org" value="{{$r->email}}">
            </div>
            <div class="col ml-2 form-group">
                <label for="type">Категория недвижимости</label>
                <select id="type" name="type" class="form-control" required>
                    <option value="residential" @if($r->realtyType->type_name == 'residential') selected @endif>Жилая</option>
                    <option value="country"     @if($r->realtyType->type_name == 'country') selected @endif>Загородная</option>
                    <option value="commercial"  @if($r->realtyType->type_name == 'commercial') selected @endif>Коммерческая</option>
                </select>
                <label for="cost">Стоимость (руб.)</label>
                <input type="text" id="cost" name="cost" class="form-control" value="{{number_format($r->cost, 2, '.', '')}}" required>
                <label for="areaTotal">Общая площадь (кв. м)</label>
                <input type="text" id="areaTotal" name="areaTotal" class="form-control" value="{{number_format($r->area_total, 1, '.', '')}}" required>
                <label for="areaResidential">Жилая площадь (кв. м) <small>(необязательно)</small></label>
                <input type="text" id="areaResidential" name="areaResidential" class="form-control" value="{{number_format($r->area_residential, 1, '.', '')}}">
                <label for="areaKitchen">Площадь кухни (кв. м) <small>(необязательно)</small></label>
                <input type="text" id="areaKitchen" name="areaKitchen" class="form-control" value="{{number_format($r->area_kitchen, 1, '.', '')}}">
                <label for="floors">Общее число этажей</label>
                <input type="number" id="floors" name="floors" class="form-control" min="-1" value="{{$r->floors}}" required>
                <label for="floor">Этаж, на котором расположен объект <small>(необязательно)</small></label>
                <input type="number" id="floor" name="floor" min="-1" class="form-control" value="{{$r->floor}}">
                <br>
                <label for="images">Добавить изображения<small>(всего должно быть не более 5-ти)</small></label>
                <input type="file" class="form-control-file" id="images" name="images[]" multiple accept="image/*">
                <br>
            </div>
        </div>
    </form>
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
        </div>
        <div class="col ml-3">
            @if($r->realtyImages()->exists())
                @foreach($r->realtyImages as $ri)
                    <div class="container mb-3">
                        <form id="imgDel{{$ri->id}}" action="/admin/realty/img/{{$ri->id}}" method="POST">
                            @csrf @method('DELETE')
                            <img src="{{asset('storage/'.$ri->image)}}" alt="{{$r->id}}-{{$ri->id}}" style="height: 100px;">
                            <input type="submit" form="imgDel{{$ri->id}}" class="btn btn-outline-danger" value="Удалить">
                        </form>
                    </div>
                @endforeach
            @else
                <p>С объектом не связано ни одно изображение</p>
            @endif
        </div>
    </div>
    <form id="realtyDel" action="/admin/realty/{{$r->id}}" method="POST" hidden>
        @csrf @method('DELETE')
    </form>
    <div class="row no-gutters justify-content-center">
        <div class="btn-group mt-3">
            <a href="/admin/realty" class="btn btn-outline-primary"> << Назад к списку</a>
            <input type="submit" form="realtyUpd" class="btn btn-outline-primary" value="Обновить информацию">
            <input type="submit" form="realtyDel" class="btn btn-outline-danger" value="Удалить">
        </div>
    </div>
@endsection