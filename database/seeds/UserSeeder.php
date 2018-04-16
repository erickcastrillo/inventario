<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

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
            'country' => 'Costa Rica',
            'estado' => 1,
            'creado_id' => 1,
            'editado_id' => 1
        ]);

        $Superuser = Role::where('name', '=', 'Superuser')->first();
        $Administrador = Role::where('name', '=', 'Administrador')->first();
        $Supervisor = Role::where('name', '=', 'Supervisor')->first();

        $erick = User::find(1);
        $diego = User::find(2);

        $erick->attachRole($Superuser);
        $erick->attachRole($Administrador);
        $erick->attachRole($Supervisor);

        $diego->attachRole($Superuser);
        $diego->attachRole($Administrador);
        $diego->attachRole($Supervisor);

        factory(App\User::class, 5)->create()->each(function($u) {
            $Administrador = Role::where('name', '=', 'Administrador')->first();
            $Supervisor = Role::where('name', '=', 'Supervisor')->first();

            $u->attachRole($Administrador);
            $u->attachRole($Supervisor);

        });

        factory(App\User::class, 5)->create()->each(function($u) {
            $Supervisor = Role::where('name', '=', 'Supervisor')->first();
            $u->attachRole($Supervisor);

        });
    }
}
