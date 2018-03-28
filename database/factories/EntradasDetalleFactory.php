<?php

$factory->define(Inventario\EntradaDetalle::class, function (Faker\Generator $faker) {
    return [
        'compra_id' => $faker->numberBetween($min = 1000, $max = 9000),
        'articulo_id' => $faker->numberBetween($min = 1000, $max = 9000),
        'cantidad' => $faker->numberBetween($min = 10, $max = 90),
        'costo_unitario' => $faker->randomFloat($nbMaxDecimals = 3, $min = 0, $max = NULL),
        'moneda_id' => $faker->numberBetween($min = 10, $max = 90),
        'lote' => $faker->isbn13(),
        'serie' => $faker->ean8(),
        'pais' => $faker->country(),

        'estado' => $faker->boolean(),
        'creado_id' => $faker->numberBetween($min = 1000, $max = 9000),
        'editado_id' => $faker->numberBetween($min = 1000, $max = 9000),
    ];
});