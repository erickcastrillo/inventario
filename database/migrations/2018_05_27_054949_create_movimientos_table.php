<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientos', function (Blueprint $table) {
            // IDs
            $table->increments('id');

            // Relationships IDs
            $table->integer('consecutivo');
            $table->integer('movimiento_id');
            $table->integer('bodega_id');

            // Dates and times
            $table->date('fecha');
            $table->time('hora');
            
            $table->integer('supervisor_id');
            $table->integer('departamento_id');

            $table->string('nombre_retira', 150);
            $table->string('id_personal_retira', 15);
            $table->integer('auditor_id');

            $table->integer('n_factura');
            $table->integer('proveedor_id');
            $table->integer('proyecto_id');
            $table->integer('tarea_id');
            $table->integer('tipo_concepto_id');
            $table->integer('cuenta_id');
            $table->integer('cliente_id');
            $table->integer('enlace_id');

            $table->text('notas_1');
            $table->text('notas_2');

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
        Schema::drop('movimientos');
    }
}
