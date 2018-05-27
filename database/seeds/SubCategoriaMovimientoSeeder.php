<?php

use Illuminate\Database\Seeder;

class SubCategoriaMovimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_categoria_movimiento')->insert([
            'movimiento_id' => 1,
            'nombre' => 'Compra',
            'pais' => 'Costa Rica',
            'estado' => 1,
            'creado_id' => 1,
            'editado_id' => 1
        ]);
        DB::table('sub_categoria_movimiento')->insert([
            'movimiento_id' => 1,
            'nombre' => 'Desinstalacion',
            'pais' => 'Costa Rica',
            'estado' => 1,
            'creado_id' => 1,
            'editado_id' => 1
        ]);

        DB::table('sub_categoria_movimiento')->insert([
            'movimiento_id' => 2,
            'nombre' => 'Entrada',
            'pais' => 'Costa Rica',
            'estado' => 1,
            'creado_id' => 1,
            'editado_id' => 1
        ]);
        DB::table('sub_categoria_movimiento')->insert([
            'movimiento_id' => 2,
            'nombre' => 'Salida',
            'pais' => 'Costa Rica',
            'estado' => 1,
            'creado_id' => 1,
            'editado_id' => 1
        ]);

        DB::table('sub_categoria_movimiento')->insert([
            'movimiento_id' => 4,
            'nombre' => 'Gasto',
            'pais' => 'Costa Rica',
            'estado' => 1,
            'creado_id' => 1,
            'editado_id' => 1
        ]);
        DB::table('sub_categoria_movimiento')->insert([
            'movimiento_id' => 4,
            'nombre' => 'Devolucion',
            'pais' => 'Costa Rica',
            'estado' => 1,
            'creado_id' => 1,
            'editado_id' => 1
        ]);
        DB::table('sub_categoria_movimiento')->insert([
            'movimiento_id' => 4,
            'nombre' => 'Desecho',
            'pais' => 'Costa Rica',
            'estado' => 1,
            'creado_id' => 1,
            'editado_id' => 1
        ]);
    }
}
