<?php

$factory->define(App\Gasto::class, function (Faker\Generator $faker) {
    return [
        'fecha_gasto' => $faker->dateTime($max = 'now', $timezone = null),
        'enlace_id' => $faker->numberBetween($min = 1, $max = 50),
        'proyecto_id' => $faker->numberBetween($min = 1, $max = 10),
        'cliente_id' => $faker->numberBetween($min = 1, $max = 50),
        'tarea_id' => $faker->numberBetween($min = 1, $max = 10),
        'departamento_id' => $faker->numberBetween($min = 1, $max = 10),
        'pais' => $faker->country(),

        'estado' => $faker->boolean(),
        'creado_id' => $faker->numberBetween($min = 1, $max = 2),
        'editado_id' => $faker->numberBetween($min = 1, $max = 2),
        'created_at' => $faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now', $timezone = null)
    ];
});