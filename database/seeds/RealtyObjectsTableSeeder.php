<?php

use Illuminate\Database\Seeder;
use App\RealtyObject;

class RealtyObjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ro = new RealtyObject();
        $ro->name = 'Пример названия объекта недвижимости';
        $ro->address = 'Город, район, улица, дом, квартира';
        $ro->cost = 1250000.00;
        $ro->type_id = 1;
        $ro->area_total = 48.1;
        $ro->area_residential = 47.0;
        $ro->floors = 5;
        $ro->floor = 3;
        $ro->ru_description = 'Замечательная 3-комнатная квартира с видом на море';
        $ro->phone = 88005553535;
        $ro->email = 'sample@example.org';
        $ro->save();
    }
}
