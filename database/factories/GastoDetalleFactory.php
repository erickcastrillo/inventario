<?php

$factory->define(Inventario\GastoDetalle::class, function (Faker\Generator $faker) {
    return [
        'articulo_id' => $faker->numberBetween($min = 1000, $max = 9000),
        'cantidad' => $faker->numberBetween($min = 1000, $max = 9000),
        'costo_unitario' => $faker->numberBetween($min = 1000, $max = 9000),
        'moneda_id' => $faker->numberBetween($min = 1000, $max = 9000),
        'lote' => $faker->numberBetween($min = 1000, $max = 9000),
        'serie' => $faker->numberBetween($min = 1000, $max = 9000),
        'pais' => $faker->country(),

        'estado' => $faker->boolean(),
        'creado_id' => $faker->numberBetween($min = 1000, $max = 9000),
        'editado_id' => $faker->numberBetween($min = 1000, $max = 9000),
    ];
});