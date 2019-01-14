<?php

use Illuminate\Database\Seeder;
use App\StaticContent;

class StaticContentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hst = new StaticContent();
        $hst->page_name = 'history';
        $hst->ru_content = 'История компании начинается в 2018 году, когда автору данного интернет-магазина в университете дали задание на курсовой проект по дисциплине "Web-технологии". Таким образом, появилась первая версия сайта, которая была похожа на глянцевый журнал, который можно полистать и закрыть.
Всё изменилось с появлением на сайте системы учётных записей, позволившей удобным образом управлять содержимым сайта и делать заказы.
Мы надеемся, что Вам будет удобно пользоваться этим сайтом!';
        $hst->save();

        $srv = new StaticContent();
        $srv->page_name = 'service';
        $srv->ru_content = 'На нашем сайте Вы можете просматривать каталог недвижимости в трёх категориях, а также оставлять заказы на покупку объекта (для зарегистрированных пользователей). При регистрации учётная запись привязывается к адресу электронной почты, с помощью которой наши менеджеры свяжутся с Вами при появлении заявки на покупку объекта недвижимости.';
        $srv->save();

        $awd = new StaticContent();
        $awd->page_name = 'awards';
        $awd->ru_content = 'Награда "Лучший интернет-магазин недвижимости в декабре 2018 в СевГУ", награда "Лучший интернет-магазин недвижимости декабря 2018 в СевГУ на языке PHP", награда "Лучший интернет-магазин недвижимости декабря 2018 в СевГУ на языке PHP с использованием фреймворка Laravel". Примечание: все награды являются вымышленными.';
        $awd->save();

        $rev = new StaticContent();
        $rev->page_name = 'reviews';
        $rev->ru_content = 'Приятели автора данного сайта находят дизайн пользовательского интерфейса весьма неплохим, также им нравится возможность удобной навигации между разделами и понятное расположение управляющих кнопок и ссылок интерфейса. Интерфейс пользователя и его удобство - это первое, на что обращают внимание посетители. Именно поэтому очень важно позаботиться о его удобстве.';
        $rev->save();
    }
}
