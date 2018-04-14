<?php

$factory->define(Inventario\Cliente::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->company(),
        'cedula' => $faker->ean13(),
        'nombre_contacto' => $faker->name(),
        'tel_contacto' => $faker->phoneNumber(),
        'tel_empresa' => $faker->e164PhoneNumber(),
        'correo' => $faker->email(),

        'pais' => $faker->country(),

        'estado' => $faker->boolean(),
        'creado_id' => $faker->numberBetween($min = 1, $max = 2),
        'editado_id' => $faker->numberBetween($min = 1, $max = 2),
        'created_at' => $faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now', $timezone = null)
    ];
});