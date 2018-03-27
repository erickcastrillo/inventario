<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Gasto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gastos', function (Blueprint $table) {
            // Primary key
            $table->increments('id');
            
            // Table specific entries
            $table->dateTime('fecha_gasto');
            $table->integer('id_enlace');
            $table->integer('id_proyecto');
            $table->integer('id_cliente');
            $table->integer('id_tarea');
            $table->integer('id_departamento');
            $table->string('pais', 50);
            
            // This 5 lines must appear on all migrations
            $table->boolean('estado');
            $table->integer('id_creado');
            $table->integer('id_editado');

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
        Schema::drop('gastos');
    }
}
