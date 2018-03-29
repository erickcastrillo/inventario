<?php

$factory->define(Inventario\Movimiento::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->firstName(),
        'tipo' => $faker->word(),

        'pais' => $faker->country(),

        'estado' => $faker->boolean(),
        'creado_id' => $faker->numberBetween($min = 1, $max = 2),
        'editado_id' => $faker->numberBetween($min = 1, $max = 2),
    ];
});