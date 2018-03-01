<?php

use Faker\Generator as Faker;

$factory->define(App\Student::class, function (Faker $faker) {
    return [
		'imie' => $faker->firstName(),
		'nazwisko' => $faker->lastName(),
		'pesel' => $faker->pesel(),
		'data_urodzenia' => $faker->date(),
		'album' => $faker->randomNumber(5),
		'wydzial' => function()
		{
			return factory(\App\Wydzial::class)->create()->id;
		},
		'semestr' => function()
		{
			return factory(\App\Semestr::class)->create()->id;
		},
		'grupa' => function()
		{
			return factory(\App\Grupa::class)->create()->id;
		},
		'kierunek' => function()
		{
			return factory(\App\Kierunek::class)->create()->id;
		},
    ];
});
