<?php

$factory->define(Inventario\NotificacionDetalle::class, function (Faker\Generator $faker) {
    return [
        
        'correo' => $faker->email(),

        'estado' => $faker->boolean(),
        'creado_id' => $faker->numberBetween($min = 1, $max = 2),
        'editado_id' => $faker->numberBetween($min = 1, $max = 2),
        'created_at' => $faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now', $timezone = null)
    ];
});