<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubCategoriaMovimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_categoria_movimiento', function (Blueprint $table) {
            $table->increments('id');
            
            // Table specific entries
            $table->string('movimiento_id', 50);
            $table->string('nombre', 50);
            $table->string('pais', 100);
            
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
        Schema::drop('sub_categoria_movimiento');
    }
}