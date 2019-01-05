<?php

use Faker\Generator as Faker;

$factory->define(App\News::class, function (Faker $faker) {
    return [
        'ru_title' => $faker->realText(50),
        'en_title' => $faker->realText(50),
        'ru_short' => $faker->realText(150),
        'en_short' => $faker->realText(150),
        'ru_text' => $faker->realText(350),
        'en_text' => $faker->realText(350),
        'image' => null
    ];
});
