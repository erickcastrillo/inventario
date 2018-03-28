<?php

$factory->define(Inventario\DesechoDetalle::class, function (Faker\Generator $faker) {
    return [
        'articulo_id' => $faker->numberBetween($min = 1000, $max = 9000),
        'cantidad' => $faker->numberBetween($min = 1000, $max = 9000),
        'costo_unitario' => $faker->randomFloat($nbMaxDecimals = 3, $min = 0, $max = NULL),
        'moneda_id' => $faker->numberBetween($min = 1000, $max = 9000),
        'lote' => $faker->isbn13(),
        'serie' => $faker->ean8(),
        'pais' => $faker->country(),

        'estado' => $faker->boolean(),
        'creado_id' => $faker->numberBetween($min = 1000, $max = 9000),
        'editado_id' => $faker->numberBetween($min = 1000, $max = 9000),
    ];
});