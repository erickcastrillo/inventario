<?php

$factory->define(Inventario\Moneda::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->firstName(),
        'sigla' => $faker->currencyCode(),
        'por_defecto' => $faker->boolean(),

        'pais' => $faker->country(),

        'estado' => $faker->boolean(),
        'creado_id' => $faker->numberBetween($min = 1000, $max = 9000),
        'editado_id' => $faker->numberBetween($min = 1000, $max = 9000),
    ];
});