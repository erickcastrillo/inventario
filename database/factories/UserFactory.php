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

// use the factory to create a Faker\Generator instance
$faker1 = Faker\Factory::create();

$factory->define(Inventario\User::class, function (Faker\Generator $faker) {

    $name = $faker->firstName;
    $lastName = $faker->lastName;
    $randomIndex = $faker->numberBetween($min = 0, $max = 2);
    $userRoles = array('Usuario', 'Administrador', 'Supervisor');

    return [
        'name' => $name,
        'last_name' => $lastName,
        'user_name' => $lastName . '.' . $lastName,
        'password' => bcrypt('Password-'.$userRoles[$randomIndex]),
        'email' => lcfirst($name) . '.' . lcfirst($lastName) .'@' . $faker->domainName,
        'access_level' => $userRoles[$randomIndex],
        'country' => $faker->country,
        'estado' => 1,
        'creado_id' => 1,
        'editado_id' => 1
    ];
});
