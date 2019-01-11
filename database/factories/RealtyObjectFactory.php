<?php

use Faker\Generator as Faker;

$factory->define(App\RealtyObject::class, function (Faker $faker) {
    return [
        'name' => 'Объект '.$faker->realText(20),
        'address' => $faker->unique()->address(),
        'cost' => $faker->randomFloat(2,800000,2000000),
        'type_id' => $faker->numberBetween(1, 3),
        'area_total' => $faker->randomFloat(1,20,100),
        'area_residential' => $faker->randomFloat(1,5,20),
        'floors' => $faker->numberBetween(0, 5),
        'floor' => 1,
        'ru_description' => $faker->realText(100),
        'phone' => 88005553535,
        'email' => $faker->safeEmail()
    ];
});