<?php

use Faker\Generator as Faker;

$factory->define(App\Wydzial::class, function (Faker $faker) {
    return [
		'nazwa' => $faker->text(40),
    ];
});
