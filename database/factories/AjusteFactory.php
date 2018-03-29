<?php

$factory->define(Inventario\Ajuste::class, function (Faker\Generator $faker) {
    return [
        'fecha_gasto' => $faker->dateTime($max = 'now', $timezone = null),
        'enlace_id' => $faker->numberBetween($min = 1, $max = 50),
        'proyecto_id' => $faker->numberBetween($min = 1, $max = 50),
        'cliente_id' => $faker->numberBetween($min = 1, $max = 50),
        'tarea_id' => $faker->numberBetween($min = 1, $max = 50),
        'departamento_id' => $faker->numberBetween($min = 1, $max = 50),
        'pais' => $faker->country(),

        'estado' => $faker->boolean(),
        'creado_id' => $faker->numberBetween($min = 1, $max = 2),
        'editado_id' => $faker->numberBetween($min = 1, $max = 2),
    ];
});