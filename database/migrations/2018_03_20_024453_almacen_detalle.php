<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlmacenDetalle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('almacenes_detalle', function (Blueprint $table) {
            // Primary key
            $table->increments('id');
            
            // Table specific entries
            $table->integer('almacen_id');
            $table->integer('articulo_id');
            $table->integer('cantidad');
            $table->float('costo_unitario', 15, 3);
            $table->integer('moneda_id');
            $table->string('lote', 100);
            $table->string('serie', 100);
            $table->float('tipo_cambio', 10, 3);
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
        Schema::drop('almacenes_detalle');
    }
}
