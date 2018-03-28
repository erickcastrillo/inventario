<?php

$factory->define(Inventario\UnidadMedida::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->firstName(),
        'sigla' => $faker->currencyCode(),
        'tipo' => $faker->word(),

        'pais' => $faker->country(),

        'estado' => $faker->boolean(),
        'creado_id' => $faker->numberBetween($min = 1000, $max = 9000),
        'editado_id' => $faker->numberBetween($min = 1000, $max = 9000),
    ];
});