<?php

$factory->define(Inventario\Desecho::class, function (Faker\Generator $faker) {
    return [
        'fecha_desecho' => $faker->dateTime($max = 'now', $timezone = null),
        'auditor_id' => $faker->numberBetween($min = 1, $max = 50),
        'bodega_id' => $faker->numberBetween($min = 1, $max = 50),
        'notas' => $faker->text($maxNbChars = 200),
        'pais' => $faker->country(),

        'estado' => $faker->boolean(),
        'creado_id' => $faker->numberBetween($min = 1, $max = 2),
        'editado_id' => $faker->numberBetween($min = 1, $max = 2),
    ];
});