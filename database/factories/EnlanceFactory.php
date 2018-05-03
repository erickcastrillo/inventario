<?php

$factory->define(App\Enlace::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->text(),
        'latitud' => $faker->latitude(),
        'longitud' => $faker->longitude(),
        'proyecto_id' => $faker->numberBetween($min = 1, $max = 10),
        'pais' => $faker->country(),

        'estado' => true,
        'creado_id' => $faker->numberBetween($min = 1, $max = 2),
        'editado_id' => $faker->numberBetween($min = 1, $max = 2),
        'created_at' => $faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now', $timezone = null)
    ];
});