<?php

$factory->define(Inventario\Devolucion::class, function (Faker\Generator $faker) {
    return [
        'fecha_devolucion' => $faker->dateTime($max = 'now', $timezone = null),
        'cliente_id' => $faker->numberBetween($min = 1000, $max = 9000),
        'bodega_id' => $faker->numberBetween($min = 1000, $max = 9000),
        'notas' => $faker->text($maxNbChars = 200),
        'pais' => $faker->country(),

        'estado' => $faker->boolean(),
        'creado_id' => $faker->numberBetween($min = 1000, $max = 9000),
        'editado_id' => $faker->numberBetween($min = 1000, $max = 9000),
    ];
});