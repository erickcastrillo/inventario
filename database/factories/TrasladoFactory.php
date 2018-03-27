<?php

$factory->define(Inventario\Traslado::class, function (Faker\Generator $faker) {
    return [
        'id_bodega_entrada' => $faker->numberBetween($min = 1000, $max = 9000),
        'id_bodega_salida' => $faker->numberBetween($min = 1000, $max = 9000),
        'fecha_retiro' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'hora_retiro' => time($format = 'H:i:s', $max = 'now'),
        'id_motivo' => $faker->numberBetween($min = 1000, $max = 9000),
        'id_departamento' => $faker->numberBetween($min = 1000, $max = 9000),
        'nombre_retira' => $faker->name($gender = null|'male'|'female'),
        'pais' => $faker->country(),

        'estado' => $faker->boolean(),
        'id_creado' => $faker->numberBetween($min = 1000, $max = 9000),
        'id_editado' => $faker->numberBetween($min = 1000, $max = 9000),
    ];
});