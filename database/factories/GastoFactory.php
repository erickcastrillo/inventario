<?php

$factory->define(Inventario\Gasto::class, function (Faker\Generator $faker) {
    return [
        'fecha_gasto' => $faker->dateTime($max = 'now', $timezone = null),
        'enlace_id' => $faker->numberBetween($min = 1000, $max = 9000),
        'proyecto_id' => $faker->numberBetween($min = 1000, $max = 9000),
        'cliente_id' => $faker->numberBetween($min = 1000, $max = 9000),
        'tarea_id' => $faker->numberBetween($min = 1000, $max = 9000),
        'departamento_id' => $faker->numberBetween($min = 1000, $max = 9000),
        'pais' => $faker->country(),

        'estado' => $faker->boolean(),
        'creado_id' => $faker->numberBetween($min = 1000, $max = 9000),
        'editado_id' => $faker->numberBetween($min = 1000, $max = 9000),
    ];
});