<?php

$factory->define(Inventario\Departamento::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->firstName(),

        'pais' => $faker->country(),

        'estado' => $faker->boolean(),
        'creado_id' => $faker->numberBetween($min = 1000, $max = 9000),
        'editado_id' => $faker->numberBetween($min = 1000, $max = 9000),
    ];
});