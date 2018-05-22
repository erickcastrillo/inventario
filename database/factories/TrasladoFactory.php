<?php

use Carbon\Carbon;

$factory->define(App\Traslado::class, function (Faker\Generator $faker) {
    return [
        'almacen_id' => $faker->numberBetween($min = 1, $max = 10),
        'supervisor_id' => $faker->numberBetween($min = 1, $max = 10),
        'fecha_retiro' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'hora_retiro' => $faker->time($format = 'H:i:s', $max = 'now'),
        'movimiento_id' => $faker->numberBetween($min = 1, $max = 8),
        'departamento_id' => $faker->numberBetween($min = 1, $max = 10),
        'nombre_retira' => $faker->name($gender = null|'male'|'female'),
        'pais' => $faker->country(),
        'notas' => $faker->text(),

        'estado' => 0,
        'creado_id' => $faker->numberBetween($min = 1, $max = 2),
        'editado_id' => $faker->numberBetween($min = 1, $max = 2),
        'created_at' => $faker->dateTimeBetween($startDate = '-1 months', $endDate = 'now', $timezone = null)
    ];
});