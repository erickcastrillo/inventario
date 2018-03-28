<?php

$factory->define(Inventario\Traslado::class, function (Faker\Generator $faker) {
    return [
        'bodega_id_entrada' => $faker->numberBetween($min = 1000, $max = 9000),
        'bodega_id_salida' => $faker->numberBetween($min = 1000, $max = 9000),
        'fecha_retiro' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'hora_retiro' => time($format = 'H:i:s', $max = 'now'),
        'motivo_id' => $faker->numberBetween($min = 1000, $max = 9000),
        'departamento_id' => $faker->numberBetween($min = 1000, $max = 9000),
        'nombre_retira' => $faker->name($gender = null|'male'|'female'),
        'pais' => $faker->country(),

        'estado' => $faker->boolean(),
        'creado_id' => $faker->numberBetween($min = 1000, $max = 9000),
        'editado_id' => $faker->numberBetween($min = 1000, $max = 9000),
    ];
});