<?php

$factory->define(App\Tarea::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->firstName(),

        'pais' => $faker->numberBetween($min = 1, $max = 6),

        'estado' => true,
        'creado_id' => $faker->numberBetween($min = 1, $max = 2),
        'editado_id' => $faker->numberBetween($min = 1, $max = 2),
        'created_at' => $faker->dateTimeBetween($startDate = '-1 months', $endDate = 'now', $timezone = null)
    ];
});