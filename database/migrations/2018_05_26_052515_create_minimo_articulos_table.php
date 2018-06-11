<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMinimoArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('minimo_articulos', function (Blueprint $table) {
            // Primary key
            $table->increments('id');

            $table->integer('bodega_id');
            $table->integer('articulo_id');
            $table->integer('minimo');

            $table->integer('pais');
            // This 5 lines must appear on all migrations
            $table->boolean('estado');
            $table->integer('creado_id');
            $table->integer('editado_id');

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
        Schema::drop('minimo_articulos');
    }
}
