<?php

$factory->define(Inventario\Bodega::class, function (Faker\Generator $faker) {
    return [
        'descripcion' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'responsable_id' => $faker->numberBetween($min = 1000, $max = 9000),
        'pais' => $faker->country(),

        'estado' => $faker->boolean(),
        'creado_id' => $faker->numberBetween($min = 1000, $max = 9000),
        'editado_id' => $faker->numberBetween($min = 1000, $max = 9000),
    ];
});