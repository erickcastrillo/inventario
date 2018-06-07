<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('almacen_id');

            // Dates and times
            $table->date('fecha');
            $table->time('hora');

            $table->integer('supervisor_id');
            $table->integer('departamento_id');

            $table->string('nombre_retira', 150);
            $table->string('id_personal_retira', 15);

            $table->text('notas');

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
        Schema::drop('solicitudes');
    }
}
