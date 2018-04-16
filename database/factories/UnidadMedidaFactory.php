<?php

$factory->define(App\UnidadMedida::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->firstName(),
        'sigla' => $faker->currencyCode(),
        'tipo' => $faker->word(),

        'pais' => $faker->country(),

        'estado' => $faker->boolean(),
        'creado_id' => $faker->numberBetween($min = 1, $max = 2),
        'editado_id' => $faker->numberBetween($min = 1, $max = 2),
        'created_at' => $faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now', $timezone = null)
    ];
});