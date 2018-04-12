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
            $table->integer('enlace_id');
            $table->integer('proyecto_id');
            $table->integer('movimientos_id');
            $table->integer('cliente_id');
            $table->integer('tarea_id');
            $table->integer('departamento_id');
            $table->string('pais', 50);
            $table->integer('bodega_id');
            $table->string('notas', 300);
            
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
        Schema::drop('gastos');
    }
}
