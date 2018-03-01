<?php

use Faker\Generator as Faker;

$factory->define(App\Semestr::class, function (Faker $faker) {
    return [
		'nazwa' => $faker->text(30),
    ];
});
