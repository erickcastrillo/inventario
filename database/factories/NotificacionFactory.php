<?php

$factory->define(Inventario\Notificacion::class, function (Faker\Generator $faker) {
    return [
        'departamento' => $faker->lastName(),
        'pais' => $faker->country(),

        'estado' => $faker->boolean(),
        'creado_id' => $faker->numberBetween($min = 1000, $max = 9000),
        'editado_id' => $faker->numberBetween($min = 1000, $max = 9000),
    ];
});