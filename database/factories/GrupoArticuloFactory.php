<?php

$factory->define(App\GrupoArticulo::class, function (Faker\Generator $faker) {
    return [
        'descripcion' => $faker->word,
        'estado' => true,
        'creado_id' => $faker->numberBetween($min = 1, $max = 2),
        'editado_id' => $faker->numberBetween($min = 1, $max = 2),
        'created_at' => $faker->dateTimeBetween($startDate = '-1 months', $endDate = 'now', $timezone = null)
    ];
});