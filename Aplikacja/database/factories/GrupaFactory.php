<?php

use Faker\Generator as Faker;

$factory->define(App\Grupa::class, function (Faker $faker) {
    return [
		'nazwa' => $faker->text(40),
    ];
});
