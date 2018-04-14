<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(Inventario\User::class, function (Faker\Generator $faker) {

    $name = $faker->firstName;
    $lastName = $faker->lastName;
    $randomIndex = $faker->numberBetween($min = 1, $max = 3);
    $userRoles = array('Usuario', 'Administrador', 'Supervisor');

    return [
        'name' => $name,
        'last_name' => $lastName,
        'user_name' => $lastName . '.' . $lastName,
        'password' => 'Password'.$userRoles[$randomIndex],
        'email' => 'erick.castrillo@gmail.com',
        'access_level' => $userRoles[$randomIndex],
        'country' => $faker->country,
        'estado' => 1,
        'creado_id' => 1,
        'editado_id' => 1
    ];
});
