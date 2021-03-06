<?php

$factory->define(App\Ajuste::class, function (Faker\Generator $faker) {
    return [
        'fecha_gasto' => $faker->dateTime($max = 'now', $timezone = null),
        'enlace_id' => $faker->numberBetween($min = 1, $max = 10),
        'movimiento_id' => $faker->numberBetween($min = 1, $max = 4),
        'proyecto_id' => $faker->numberBetween($min = 1, $max = 10),
        'cliente_id' => $faker->numberBetween($min = 1, $max = 50),
        'tarea_id' => $faker->numberBetween($min = 1, $max = 10),
        'departamento_id' => $faker->numberBetween($min = 1, $max = 50),
        'pais' => $faker->country(),

        'estado' => true,
        'creado_id' => $faker->numberBetween($min = 1, $max = 2),
        'editado_id' => $faker->numberBetween($min = 1, $max = 2),
        'created_at' => $faker->dateTimeBetween($startDate = '-1 months', $endDate = 'now', $timezone = null)
    ];
});