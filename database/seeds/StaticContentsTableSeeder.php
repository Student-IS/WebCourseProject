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
        $hst->ru_content = 'История компании начинается в 2018 году';
        $hst->save();

        $srv = new StaticContent();
        $srv->page_name = 'service';
        $srv->ru_content = 'Выбор и покупка жилья с возможностью бронирования заявки';
        $srv->save();

        $awd = new StaticContent();
        $awd->page_name = 'awards';
        $awd->ru_content = 'Награда "Лучший интернет-магазин недвижимости в декабре 2018 в СевГУ"';
        $awd->save();

        $rev = new StaticContent();
        $rev->page_name = 'reviews';
        $rev->ru_content = 'Кто-то похвалил сайт, но отзыв остался незаписанным';
        $rev->save();
    }
}
