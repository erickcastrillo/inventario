<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NotificacionDetalle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notificaciones_detalle', function (Blueprint $table) {
            // Primary key
            $table->increments('id');

            // Table specific entries
            $table->string('correo', 200);
            $table->integer('notificacion_id');
            $table->integer('pais');

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
        Schema::drop('notificaciones_detalle');
    }
}
