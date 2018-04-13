<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Entrada extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entradas', function (Blueprint $table) {
            
            // Primary key
            $table->increments('id');
            
            $table->dateTime('fecha_factura');
            $table->integer('n_factura');
            $table->integer('proveedor_id');
            $table->integer('movimiento_id');
            $table->integer('proyecto_id');
            $table->integer('tarea_id');
            $table->integer('tipo_concepto_id');
            $table->string('pais', 50);
            $table->string('notas', 300);
            $table->string('notas_devolucion', 300);
            
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
        Schema::drop('entradas');
    }
}
