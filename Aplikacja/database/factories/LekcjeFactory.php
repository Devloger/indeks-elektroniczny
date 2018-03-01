<?php

use Faker\Generator as Faker;

$factory->define(App\Lekcje::class, function (Faker $faker) {
    return [
		'grupa' => function()
	{
		return factory(\App\Grupa::class)->create()->id;
	},
		'wykladowca' => function()
	{
		return factory(\App\User::class)->create()->id;
	},
		'przedmiot' => function()
	{
		return factory(\App\Przedmiot::class)->create()->id;
	},
		'czas' => function()
	{
		return factory(\App\Czas::class)->create()->id;
	},
    ];
});
