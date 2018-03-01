<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLekcjeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lekcje', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student')->unsigned();
            $table->integer('grupa')->unsigned();
            $table->integer('wykladowca')->unsigned();
            $table->integer('przedmiot')->unsigned();
            $table->integer('ocena')->nullable();
            $table->date('data_oceny')->nullable();
			$table->integer('ocena_poprawkowa')->nullable();
			$table->date('data_oceny_poprawkowej')->nullable();
			$table->integer('czas')->nullable();
            $table->timestamps();
    
            $table->foreign('student')->references('id')->on('studenci');
            $table->foreign('grupa')->references('id')->on('grupy');
            $table->foreign('wykladowca')->references('id')->on('users');
            $table->foreign('przedmiot')->references('id')->on('przedmioty');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lekcje');
    }
}
