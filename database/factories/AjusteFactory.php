<?php

$factory->define(Inventario\Gasto::class, function (Faker\Generator $faker) {
    return [
        'fecha_gasto' => $faker->dateTime($max = 'now', $timezone = null),
        'id_enlace' => $faker->numberBetween($min = 1000, $max = 9000),
        'id_proyecto' => $faker->numberBetween($min = 1000, $max = 9000),
        'id_cliente' => $faker->numberBetween($min = 1000, $max = 9000),
        'id_tarea' => $faker->numberBetween($min = 1000, $max = 9000),
        'id_departamento' => $faker->numberBetween($min = 1000, $max = 9000),
        'pais' => $faker->country(),

        'estado' => $faker->boolean(),
        'id_creado' => $faker->numberBetween($min = 1000, $max = 9000),
        'id_editado' => $faker->numberBetween($min = 1000, $max = 9000),
    ];
});