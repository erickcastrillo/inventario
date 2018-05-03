<?php

$factory->define(App\GastoDetalle::class, function (Faker\Generator $faker) {
    return [
        'articulo_id' => $faker->numberBetween($min = 1, $max = 50),
        'cantidad' => $faker->numberBetween($min = 1, $max = 50),
        'costo_unitario' => $faker->numberBetween($min = 1, $max = 50),
        'moneda_id' => $faker->numberBetween($min = 1, $max = 10),
        'lote' => $faker->numberBetween($min = 1, $max = 50),
        'serie' => $faker->numberBetween($min = 1, $max = 50),
        'pais' => $faker->country(),

        'estado' => true,
        'creado_id' => $faker->numberBetween($min = 1, $max = 2),
        'editado_id' => $faker->numberBetween($min = 1, $max = 2),
        'created_at' => $faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now', $timezone = null)
    ];
});