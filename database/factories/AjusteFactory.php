<?php

$factory->define(Inventario\Entrada::class, function (Faker\Generator $faker) {
    return [
        'fecha_ajuste' => $faker->dateTime($max = 'now', $timezone = null),
        'id_auditor' => $faker->numberBetween($min = 1000, $max = 9000),
        'id_bodega' => $faker->numberBetween($min = 1000, $max = 9000),
        'notas' => $faker->text($maxNbChars = 200),
        'pais' => $faker->country(),

        'estado' => $faker->boolean(),
        'id_creado' => $faker->numberBetween($min = 1000, $max = 9000),
        'id_editado' => $faker->numberBetween($min = 1000, $max = 9000),
    ];
});