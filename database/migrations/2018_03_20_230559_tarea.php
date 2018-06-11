<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tarea extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tareas', function (Blueprint $table) {
            // Primary key
            $table->increments('id');
            
            // Table specific entries
            $table->string('nombre', 100);
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
        Schema::drop('tareas');
    }
}
