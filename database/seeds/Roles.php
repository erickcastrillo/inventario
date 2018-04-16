<?php

use Illuminate\Database\Seeder;

class Roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Superuser',
            'display_name' => 'Superuser',
            'description' => 'Rol creado para tareas administrativas y de desarrollo',
        ]);

        DB::table('roles')->insert([
            'name' => 'Administrador',
            'display_name' => 'Administrador',
            'description' => 'Rol de administrador',
        ]);

        DB::table('roles')->insert([
            'name' => 'Supervisor',
            'display_name' => 'Supervisor',
            'description' => 'Rol de supervisor',
        ]);

    }
}
