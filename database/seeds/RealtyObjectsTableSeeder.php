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
        factory(RealtyObject::class, 30)->create();
    }
}
