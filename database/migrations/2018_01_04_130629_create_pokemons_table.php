<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePokemonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pokemons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pokemonName');
            $table->integer('element_id')->references('id')->on('elements');
            $table->string('pokemonPicture');
            $table->string('gender');
            $table->text('description');
            $table->integer('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pokemons');
    }
}
