<?php

$factory->define(App\MinimoArticulo::class, function (Faker\Generator $faker) {
    return [
        'bodega_id' => $faker->numberBetween($min = 1, $max = 10),
        'articulo_id' => $faker->numberBetween($min = 1, $max = 50),
        'minimo' => $faker->numberBetween($min = 10, $max = 100),

        'pais' => $faker->numberBetween($min = 1, $max = 6),
        'estado' => true,
        'creado_id' => $faker->numberBetween($min = 1, $max = 2),
        'editado_id' => $faker->numberBetween($min = 1, $max = 2),
        'created_at' => $faker->dateTimeBetween($startDate = '-1 months', $endDate = 'now', $timezone = null)
    ];
});
