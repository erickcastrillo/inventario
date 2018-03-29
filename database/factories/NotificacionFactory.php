<?php

$factory->define(Inventario\Notificacion::class, function (Faker\Generator $faker) {
    return [
        'departamento_id' => $faker->numberBetween($min = 1, $max = 50),
        'pais' => $faker->country(),

        'estado' => $faker->boolean(),
        'creado_id' => $faker->numberBetween($min = 1, $max = 2),
        'editado_id' => $faker->numberBetween($min = 1, $max = 2),
    ];
});