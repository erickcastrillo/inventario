<?php

$factory->define(Inventario\Entrada::class, function (Faker\Generator $faker) {
    return [
        'fecha_factura' => $faker->dateTime($max = 'now', $timezone = null),
        'n_factura' => $faker->numberBetween($min = 1000, $max = 9000),
        'id_proyecto' => $faker->numberBetween($min = 1000, $max = 9000),
        'id_tarea' => $faker->numberBetween($min = 1000, $max = 9000),
        'id_tipo_concepto' => $faker->numberBetween($min = 1000, $max = 9000),
        'pais' => $faker->country(),

        'estado' => $faker->boolean(),
        'id_creado' => $faker->numberBetween($min = 1000, $max = 9000),
        'id_editado' => $faker->numberBetween($min = 1000, $max = 9000),
    ];
});