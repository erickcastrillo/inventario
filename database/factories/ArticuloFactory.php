<?php

$factory->define(App\Articulo::class, function (Faker\Generator $faker) {
    return [
        'codigo' => $faker->isbn13(),
        'descripcion' => $faker->word,
        'grupo_id' => $faker->numberBetween($min = 1, $max = 10),
        'linea_id' => $faker->numberBetween($min = 1, $max = 10),
        'medida_id' => $faker->numberBetween($min = 1, $max = 10),
        'abc' => $faker->randomLetter(),
        'fotografia' => $faker->imageUrl($width = 640, $height = 480, 'technics'),

        'pais' => $faker->country(),

        'estado' => true,
        'creado_id' => $faker->numberBetween($min = 1, $max = 2),
        'editado_id' => $faker->numberBetween($min = 1, $max = 2),
        'created_at' => $faker->dateTimeBetween($startDate = '-1 months', $endDate = 'now', $timezone = null)
    ];
});