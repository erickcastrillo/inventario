<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Erick',
            'last_name' => 'Castrillo',
            'user_name' => 'erick.castrillo',
            'password' => bcrypt('ndrk1396'),
            'email' => 'erick.castrillo@gmail.com',
            'access_level' => 'Superuser',
            'country' => 'Costa Rica',
            'estado' => 1,
            'creado_id' => 1,
            'editado_id' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'Diego',
            'last_name' => 'Madrigal',
            'user_name' => 'diego81db',
            'password' => bcrypt('admin'),
            'email' => 'diego81db@gmail.com',
            'access_level' => 'Superuser',
            'country' => 'Costa Rica',
            'estado' => 1,
            'creado_id' => 1,
            'editado_id' => 1
        ]);

        factory(Inventario\User::class, 15)->create();
    }
}
