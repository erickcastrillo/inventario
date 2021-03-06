<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Traslado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traslados', function (Blueprint $table) {
            // Primary key
            $table->increments('id');
            
            // Table specific entries
            $table->integer('almacen_id');
            $table->integer('supervisor_id');
            $table->date('fecha_retiro');
            $table->time('hora_retiro');
            $table->integer('movimiento_id');
            $table->integer('tipo_movimiento_id');
            $table->integer('departamento_id');
            $table->string('nombre_retira', 100);
            $table->string('id_personal_retira', 100);
            $table->string('notas', 300);
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
        Schema::drop('traslados');
    }
}
