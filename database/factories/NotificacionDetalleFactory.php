<?php

$factory->define(App\NotificacionDetalle::class, function (Faker\Generator $faker) {
    return [
        
        'correo' => $faker->email(),

        'estado' => true,
        'creado_id' => $faker->numberBetween($min = 1, $max = 2),
        'editado_id' => $faker->numberBetween($min = 1, $max = 2),
        'created_at' => $faker->dateTimeBetween($startDate = '-1 months', $endDate = 'now', $timezone = null)
    ];
});