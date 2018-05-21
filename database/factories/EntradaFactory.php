<?php

$factory->define(App\Entrada::class, function (Faker\Generator $faker) {
    return [
        'fecha_factura' => $faker->dateTime($max = 'now', $timezone = null),
        'n_factura' => $faker->numberBetween($min = 1, $max = 50),
        'movimiento_id' => $faker->numberBetween($min = 1, $max = 10),
        'proveedor_id' => $faker->numberBetween($min = 1, $max = 10),
        'proyecto_id' => $faker->numberBetween($min = 1, $max = 10),
        'tarea_id' => $faker->numberBetween($min = 1, $max = 10),
        'tipo_concepto_id' => $faker->numberBetween($min = 1, $max = 10),
        'cuenta_contable' => $faker->numberBetween($min = 1, $max = 10),
        'almacen_id' => $faker->numberBetween($min = 1, $max = 10),
        'pais' => $faker->country(),

        'estado' => true,
        'creado_id' => $faker->numberBetween($min = 1, $max = 2),
        'editado_id' => $faker->numberBetween($min = 1, $max = 2),
        'created_at' => $faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now', $timezone = null)
    ];
});