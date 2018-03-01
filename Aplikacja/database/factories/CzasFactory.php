<?php

use Faker\Generator as Faker;

$factory->define(App\Czas::class, function (Faker $faker) {
    return [
        'czas' => $faker->randomDigit(),
    ];
});
