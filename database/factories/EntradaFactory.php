<?php

$factory->define(Inventario\Entrada::class, function (Faker\Generator $faker) {
    return [
        'fecha_factura' => $faker->dateTime($max = 'now', $timezone = null),
        'n_factura' => $faker->numberBetween($min = 1, $max = 50),
        'proyecto_id' => $faker->numberBetween($min = 1, $max = 50),
        'tarea_id' => $faker->numberBetween($min = 1, $max = 50),
        'tipo_concepto_id' => $faker->numberBetween($min = 1, $max = 50),
        'pais' => $faker->country(),

        'estado' => $faker->boolean(),
        'creado_id' => $faker->numberBetween($min = 1, $max = 2),
        'editado_id' => $faker->numberBetween($min = 1, $max = 2),
    ];
});