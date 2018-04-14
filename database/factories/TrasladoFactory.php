<?php

$factory->define(Inventario\Traslado::class, function (Faker\Generator $faker) {
    return [
        'bodega_id_entrada' => $faker->numberBetween($min = 1, $max = 50),
        'bodega_id_salida' => $faker->numberBetween($min = 1, $max = 50),
        'fecha_retiro' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'hora_retiro' => time($format = 'H:i:s', $max = 'now'),
        'motivo' => $faker->word(),
        'departamento_id' => $faker->numberBetween($min = 1, $max = 10),
        'nombre_retira' => $faker->name($gender = null|'male'|'female'),
        'pais' => $faker->country(),

        'estado' => $faker->boolean(),
        'creado_id' => $faker->numberBetween($min = 1, $max = 2),
        'editado_id' => $faker->numberBetween($min = 1, $max = 2),
        'created_at' => $faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now', $timezone = null)
    ];
});