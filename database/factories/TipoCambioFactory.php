<?php

$factory->define(Inventario\TipoCambio::class, function (Faker\Generator $faker) {
    return [
        'moneda_id' => $faker->numberBetween($min = 1000, $max = 9000),
        'fecha' => $faker->dateTime($max = 'now', $timezone = null),
        'cambio' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
        'pais' => $faker->country(),

        'estado' => $faker->boolean(),
        'creado_id' => $faker->numberBetween($min = 1000, $max = 9000),
        'editado_id' => $faker->numberBetween($min = 1000, $max = 9000),
    ];
});