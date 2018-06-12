<?php

$factory->define(App\Enlace::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->firstName(),
        //'latitud' => $faker->latitude(),
        //'longitud' => $faker->longitude(),
        'proyecto_id' => $faker->numberBetween($min = 1, $max = 10),
        'pais' => $faker->numberBetween($min = 1, $max = 6),

        'estado' => true,
        'creado_id' => $faker->numberBetween($min = 1, $max = 2),
        'editado_id' => $faker->numberBetween($min = 1, $max = 2),
        'created_at' => $faker->dateTimeBetween($startDate = '-1 months', $endDate = 'now', $timezone = null)
    ];
});
