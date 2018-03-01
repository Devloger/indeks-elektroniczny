<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$class = factory(\App\Student::class, 5)->create();
	
	
		$user = factory(\App\User::class)->create([
			'imie' => 'Michał',
			'nazwisko' => 'Miładowski',
			'pesel' => '95041600111',
			'email' => 'admin@admin',
			'password' => bcrypt('qwerty'),
		]);
    }
}
