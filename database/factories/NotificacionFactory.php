<?php

$factory->define(App\Notificacion::class, function (Faker\Generator $faker) {
    return [
        'departamento_id' => $faker->numberBetween($min = 1, $max = 10),
        'pais' => $faker->country(),

        'estado' => true,
        'creado_id' => $faker->numberBetween($min = 1, $max = 2),
        'editado_id' => $faker->numberBetween($min = 1, $max = 2),
        'created_at' => $faker->dateTimeBetween($startDate = '-1 months', $endDate = 'now', $timezone = null)
    ];
});