<?php

$factory->define(Inventario\NotificacionDetalle::class, function (Faker\Generator $faker) {
    return [
        
        'correo' => $faker->email(),

        'estado' => $faker->boolean(),
        'creado_id' => $faker->numberBetween($min = 1000, $max = 9000),
        'editado_id' => $faker->numberBetween($min = 1000, $max = 9000),
    ];
});