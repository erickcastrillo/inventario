<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovimientoDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimiento_detalles', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('movimiento_id');
            $table->integer('almacen_id');
            $table->integer('subcategoria_movimiento_id');
            $table->integer('articulo_id');
            $table->integer('cantidad');
            $table->integer('costo_unitario');
            $table->integer('moneda_id');
            $table->integer('tipo_cambio');
            $table->integer('lote');
            $table->integer('serie');
            $table->integer('pais');

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
        Schema::drop('movimiento_detalles');
    }
}