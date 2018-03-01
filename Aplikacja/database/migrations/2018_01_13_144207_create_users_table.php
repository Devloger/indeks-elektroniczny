<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('imie', 35);
            $table->string('nazwisko', 35);
            $table->string('pesel', 11)->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('wydzial')->index()->unsigned();
            $table->rememberToken();
            $table->timestamps();
    
            $table->foreign('wydzial')->references('id')->on('wydzialy');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
