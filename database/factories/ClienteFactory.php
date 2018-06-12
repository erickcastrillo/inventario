<?php

$factory->define(App\Cliente::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->name(),
        // 'cedula' => $faker->ean13(),
        // 'nombre_contacto' => $faker->name(),
        // 'tel_contacto' => $faker->phoneNumber(),
        // 'tel_empresa' => $faker->e164PhoneNumber(),
        // 'correo' => $faker->email(),

        'pais' => $faker->numberBetween($min = 1, $max = 6),

        'estado' => true,
        'creado_id' => $faker->numberBetween($min = 1, $max = 2),
        'editado_id' => $faker->numberBetween($min = 1, $max = 2),
        'created_at' => $faker->dateTimeBetween($startDate = '-1 months', $endDate = 'now', $timezone = null)
    ];
});
