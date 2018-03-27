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
            'id_creado' => 1,
            'id_editado' => 1
        ]);
    }
}
