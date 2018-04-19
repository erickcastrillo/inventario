<?php

$factory->define(App\Bodega::class, function (Faker\Generator $faker) {
    return [
        'descripcion' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'responsable_id' => $faker->numberBetween($min = 1, $max = 12),
        'pais' => $faker->country(),

        'estado' => $faker->boolean(),
        'creado_id' => $faker->numberBetween($min = 1, $max = 2),
        'editado_id' => $faker->numberBetween($min = 1, $max = 2),
        'created_at' => $faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now', $timezone = null),
    ];
});
