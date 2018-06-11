<?php

$factory->define(App\Almacen::class, function (Faker\Generator $faker) {
    return [
        'descripcion' => $faker->streetAddress(),
        'responsable_id' => $faker->numberBetween($min = 1, $max = 12),
        'tipo_almacen' => $faker->numberBetween($min = 1, $max = 2),
        'pais' => $faker->numberBetween($min = 1, $max = 6),

        'estado' => true,
        'creado_id' => $faker->numberBetween($min = 1, $max = 2),
        'editado_id' => $faker->numberBetween($min = 1, $max = 2),
        'created_at' => $faker->dateTimeBetween($startDate = '-1 months', $endDate = 'now', $timezone = null),
    ];
});
