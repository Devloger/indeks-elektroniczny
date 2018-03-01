<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudenciTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studenci', function (Blueprint $table) {
            $table->increments('id');
			$table->string('imie', 35);
			$table->string('nazwisko', 35);
			$table->string('pesel', 11);
			$table->date('data_urodzenia');
			$table->string('album', 5)->unique();
			$table->integer('wydzial')->index()->unsigned();
			$table->integer('semestr')->index()->unsigned();
			$table->integer('grupa')->index()->unsigned();
			$table->integer('kierunek')->index()->unsigned();
            $table->timestamps();
    
            $table->foreign('wydzial')->references('id')->on('wydzialy');
            $table->foreign('semestr')->references('id')->on('semestry');
            $table->foreign('grupa')->references('id')->on('grupy');
            $table->foreign('kierunek')->references('id')->on('kierunki');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('studenci');
    }
}
