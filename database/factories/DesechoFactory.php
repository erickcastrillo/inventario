<?php

$factory->define(Inventario\Gasto::class, function (Faker\Generator $faker) {
    return [
        'fecha_gasto' => $faker->dateTime($max = 'now', $timezone = null),
        'auditor_id' => $faker->numberBetween($min = 1000, $max = 9000),
        'bodega_id' => $faker->numberBetween($min = 1000, $max = 9000),
        'notas' => $faker->text($maxNbChars = 200),
        'pais' => $faker->country(),

        'estado' => $faker->boolean(),
        'creado_id' => $faker->numberBetween($min = 1000, $max = 9000),
        'editado_id' => $faker->numberBetween($min = 1000, $max = 9000),
    ];
});