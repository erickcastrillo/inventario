<?php

$factory->define(App\Movimiento::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'tipo' => $faker->numberBetween($min = 1, $max = 3),

        'pais' => $faker->country(),

        'estado' => true,
        'creado_id' => $faker->numberBetween($min = 1, $max = 2),
        'editado_id' => $faker->numberBetween($min = 1, $max = 2),
        'created_at' => $faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now', $timezone = null)
    ];
});