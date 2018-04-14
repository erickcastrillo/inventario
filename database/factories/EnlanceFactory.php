<?php

$factory->define(Inventario\Enlace::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->text(),
        'latitud' => $faker->latitude(),
        'longitud' => $faker->longitude(),
        'proyecto_id' => $faker->numberBetween($min = 1, $max = 50),
        'pais' => $faker->country(),

        'estado' => $faker->boolean(),
        'creado_id' => $faker->numberBetween($min = 1, $max = 2),
        'editado_id' => $faker->numberBetween($min = 1, $max = 2),
        'created_at' => $faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now', $timezone = null)
    ];
});