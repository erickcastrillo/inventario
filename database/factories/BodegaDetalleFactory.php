<?php

$factory->define(App\AlmacenDetalle::class, function (Faker\Generator $faker) {
    return [
        'articulo_id' => $faker->numberBetween($min = 1, $max = 50),
        'cantidad' => $faker->numberBetween($min = 1, $max = 50),
        'costo_unitario' => $faker->randomFloat($nbMaxDecimals = 3, $min = 0, $max = NULL),
        'tipo_cambio' => $faker->randomFloat($nbMaxDecimals = 3, $min = 0, $max = NULL), // 48.8932
        'moneda_id' => $faker->numberBetween($min = 1, $max = 10),
        'lote' => $faker->isbn13(),
        'serie' => $faker->ean8(),
        'pais' => $faker->numberBetween($min = 1, $max = 6),

        'estado' => true,
        'creado_id' => $faker->numberBetween($min = 1, $max = 2),
        'editado_id' => $faker->numberBetween($min = 1, $max = 2),
        'created_at' => $faker->dateTimeBetween($startDate = '-1 months', $endDate = 'now', $timezone = null)
    ];
});