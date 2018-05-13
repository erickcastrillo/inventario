<?php

use Illuminate\Database\Seeder;

class CategoriaMovimientosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categoriamovimientos')->insert([
            'nombre' => 'Entradas',
            'pais' => 'Costa Rica',
            'estado' => 1,
            'creado_id' => 1,
            'editado_id' => 1
        ]);
        DB::table('categoriamovimientos')->insert([
            'nombre' => 'Salidas',
            'pais' => 'Costa Rica',
            'estado' => 1,
            'creado_id' => 1,
            'editado_id' => 1
        ]);
        DB::table('categoriamovimientos')->insert([
            'nombre' => 'Traslados',
            'pais' => 'Costa Rica',
            'estado' => 1,
            'creado_id' => 1,
            'editado_id' => 1
        ]);
    }
}
