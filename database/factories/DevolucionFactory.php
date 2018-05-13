<?php

$factory->define(App\Devolucion::class, function (Faker\Generator $faker) {
    return [
        'fecha_devolucion' => $faker->dateTime($max = 'now', $timezone = null),
        'cliente_id' => $faker->numberBetween($min = 1, $max = 50),
        'almacen_id' => $faker->numberBetween($min = 1, $max = 10),
        'notas' => $faker->text($maxNbChars = 200),
        'pais' => $faker->country(),

        'estado' => true,
        'creado_id' => $faker->numberBetween($min = 1, $max = 2),
        'editado_id' => $faker->numberBetween($min = 1, $max = 2),
        'created_at' => $faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now', $timezone = null)
    ];
});