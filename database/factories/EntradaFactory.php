<?php

$factory->define(Inventario\Entrada::class, function (Faker\Generator $faker) {
    return [
        'fecha_factura' => $faker->dateTime($max = 'now', $timezone = null),
        'n_factura' => $faker->numberBetween($min = 1000, $max = 9000),
        'proyecto_id' => $faker->numberBetween($min = 1000, $max = 9000),
        'tarea_id' => $faker->numberBetween($min = 1000, $max = 9000),
        'tipo_concepto_id' => $faker->numberBetween($min = 1000, $max = 9000),
        'pais' => $faker->country(),

        'estado' => $faker->boolean(),
        'creado_id' => $faker->numberBetween($min = 1000, $max = 9000),
        'editado_id' => $faker->numberBetween($min = 1000, $max = 9000),
    ];
});