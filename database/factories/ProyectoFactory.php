<?php

$factory->define(Inventario\Proyecto::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->text(),

        'pais' => $faker->country(),

        'estado' => $faker->boolean(),
        'creado_id' => $faker->numberBetween($min = 1000, $max = 9000),
        'editado_id' => $faker->numberBetween($min = 1000, $max = 9000),
    ];
});