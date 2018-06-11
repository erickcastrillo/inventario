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

$factory->define(App\User::class, function (Faker\Generator $faker) {

    $name = $faker->firstName;
    $lastName = $faker->lastName;

    return [
        'name' => $name,
        'last_name' => $lastName,
        'user_name' => $lastName . '.' . $lastName,
        'password' => bcrypt('Password123'),
        'email' => lcfirst($name) . '.' . lcfirst($lastName) .'@' . $faker->domainName,
        'pais' => $faker->numberBetween($min = 1, $max = 6),
        'profile_pic' => 'https://randomuser.me/api/portraits/lego/' . $faker->numberBetween($min = 0, $max = 8)  . '.jpg',
        'estado' => 1,
        'creado_id' => 1,
        'editado_id' => 1
    ];
});
