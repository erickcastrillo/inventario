<?php

$factory->define(Inventario\TrasladoDetalle::class, function (Faker\Generator $faker) {
    return [
        'id_traslado' => $faker->numberBetween($min = 1000, $max = 9000),
        'id_articulo' => $faker->numberBetween($min = 1000, $max = 9000),
        'cantidad' => $faker->numberBetween($min = 10, $max = 90),
        'costo_unitario' => $faker->randomFloat($nbMaxDecimals = 3, $min = 0, $max = NULL),
        'id_moneda' => $faker->numberBetween($min = 10, $max = 90),
        'lote' => $faker->isbn13(),
        'serie' => $faker->ean8(),
        'pais' => $faker->country(),

        'estado' => $faker->boolean(),
        'id_creado' => $faker->numberBetween($min = 1000, $max = 9000),
        'id_editado' => $faker->numberBetween($min = 1000, $max = 9000),
    ];
});