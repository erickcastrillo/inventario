<?php

use Illuminate\Database\Seeder;

class CategoriaMovimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categoria_movimiento')->insert([
            'nombre' => 'Entradas',
            'tipo' => 1,
            'pais' => 'Costa Rica',
            'estado' => 1,
            'creado_id' => 1,
            'editado_id' => 1
        ]);
        DB::table('categoria_movimiento')->insert([
            'nombre' => 'Traslados',
            'tipo' => 1,
            'pais' => 'Costa Rica',
            'estado' => 1,
            'creado_id' => 1,
            'editado_id' => 1
        ]);

        DB::table('categoria_movimiento')->insert([
            'nombre' => 'Ajustes',
            'tipo' => 1,
            'pais' => 'Costa Rica',
            'estado' => 1,
            'creado_id' => 1,
            'editado_id' => 1
        ]);
        DB::table('categoria_movimiento')->insert([
            'nombre' => 'Salidas',
            'tipo' => 1,
            'pais' => 'Costa Rica',
            'estado' => 1,
            'creado_id' => 1,
            'editado_id' => 1
        ]);
    }
}
