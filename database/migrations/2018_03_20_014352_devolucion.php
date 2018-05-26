<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Devolucion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devoluciones', function (Blueprint $table) {
            
            // Primary key
            $table->increments('id');
            
            // Table specific entries
            $table->dateTime('fecha_devolucion');
            $table->integer('movimiento_id');
            $table->integer('tipo_movimiento_id');
            $table->integer('cliente_id');
            $table->integer('almacen_id');
            $table->string('notas', 500);
            $table->string('pais', 50);
            
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
        Schema::drop('devoluciones');
    }
}
