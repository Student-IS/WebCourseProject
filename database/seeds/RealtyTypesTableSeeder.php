<?php

use Illuminate\Database\Seeder;
use App\RealtyType;

class RealtyTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $res = new RealtyType();
        $res->type_name = 'residential';
        $res->save();

        $ctr = new RealtyType();
        $ctr->type_name = 'country';
        $ctr->save();

        $com = new RealtyType();
        $com->type_name = 'commercial';
        $com->save();
    }
}
