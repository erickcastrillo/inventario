<?php

$factory->define(App\Movimiento::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'tipo' => $faker->numberBetween($min = 1, $max = 3),

        'pais' => $faker->numberBetween($min = 1, $max = 6),

        'estado' => true,
        'creado_id' => $faker->numberBetween($min = 1, $max = 2),
        'editado_id' => $faker->numberBetween($min = 1, $max = 2),
        'created_at' => $faker->dateTimeBetween($startDate = '-1 months', $endDate = 'now', $timezone = null)
    ];
});