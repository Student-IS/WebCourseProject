@extends('layouts.app')
@section('content')
    <h3>Добавление нового объекта</h3>
    <form id="realtyAdd" action="/admin/realty" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row no-gutters">
            <div class="col mr-2 form-group">
                <label for="name">Название</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Название" required>
                <label for="address">Адрес объекта</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Город, район (необязятельно), улица, дом" required>
                <label for="text">Описание объекта</label>
                <textarea id="text" name="text" class="form-control" placeholder="Описание объекта, его особенности" required></textarea>
                <!-- Optional collapse form controls for localization -->
                <a href="#enLocale" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="enLocale">Добавление перевода на английский язык</a>
                <div class="collapse" id="enLocale">
                    <textarea id="enText" name="enText" class="form-control" placeholder="Object description, its features"></textarea>
                </div>
                <br>
                <label for="images">Изображения <small>(не более пяти)</small></label>
                <input type="file" class="form-control-file" id="images" name="images[]" multiple accept="image/*">
                <br>
                <h5>Контакты</h5>
                <label for="phone">Номер телефона</label>
                <input type="tel" class="form-control" id="phone" name="phone" pattern="[0-9]{8-11}" placeholder="От 8 до 11 цифр" required>
                <label for="email">Адрес электронной почты <small>(необязательно)</small></label>
                <input type="email" class="form-control" id="email" name="email" placeholder="address@example.org">
            </div>
            <div class="col ml-2 form-group">
                <label for="type">Категория недвижимости</label>
                <select id="type" name="type" class="form-control" required>
                    <option value="residential">Жилая</option>
                    <option value="country">Загородная</option>
                    <option value="commercial">Коммерческая</option>
                </select>
                <label for="cost">Стоимость (руб.)</label>
                <input type="text" id="cost" name="cost" class="form-control" required>
                <label for="areaTotal">Общая площадь (кв. м)</label>
                <input type="text" id="areaTotal" name="areaTotal" class="form-control" required>
                <label for="areaResidential">Жилая площадь (кв. м) <small>(необязательно)</small></label>
                <input type="text" id="areaResidential" name="areaResidential" class="form-control">
                <label for="areaKitchen">Площадь кухни (кв. м) <small>(необязательно)</small></label>
                <input type="text" id="areaKitchen" name="areaKitchen" class="form-control">
                <label for="floors">Общее число этажей</label>
                <input type="number" id="floors" name="floors" class="form-control" min="-1" required>
                <label for="floor">Этаж, на котором расположен объект <small>(необязательно)</small></label>
                <input type="number" id="floor" name="floor" min="-1" class="form-control">
            </div>
        </div>
    </form>
    <div class="row no-gutters justify-content-center">
        <div class="btn-group mt-3">
            <a href="/admin/realty" class="btn btn-outline-primary"> << Назад к списку</a>
            <input type="submit" form="realtyAdd" class="btn btn-outline-success" value="Опубликовать запись">
            <input type="reset" form="realtyAdd" class="btn btn-outline-warning" value="Очистить форму">
        </div>
    </div>
@endsection