<?php

$factory->define(Inventario\Articulo::class, function (Faker\Generator $faker) {
    return [
        'codigo' => $faker->isbn13(),
        'descripcion' => $faker->word,
        'categoria_id' => $faker->numberBetween($min = 1, $max = 50),
        'medida_id' => $faker->numberBetween($min = 1, $max = 50),
        'cantidad_minima' => $faker->numberBetween($min = 1, $max = 50),
        'fotografia' => $faker->imageUrl($width = 640, $height = 480, 'technics'),

        'pais' => $faker->country(),

        'estado' => $faker->boolean(),
        'creado_id' => $faker->numberBetween($min = 1, $max = 2),
        'editado_id' => $faker->numberBetween($min = 1, $max = 2),
        'created_at' => $faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now', $timezone = null)
    ];
});