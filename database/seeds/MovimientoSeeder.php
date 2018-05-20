<?php

use Illuminate\Database\Seeder;

class MovimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movimientos')->insert([
            'nombre' => 'Mantenimiento Preventivo',
            'tipo' => 1,
            'pais' => 'Costa Rica',
            'estado' => 1,
            'creado_id' => 1,
            'editado_id' => 1
        ]);
        DB::table('movimientos')->insert([
            'nombre' => 'Mantenimiento Preventivo',
            'tipo' => 2,
            'pais' => 'Costa Rica',
            'estado' => 1,
            'creado_id' => 1,
            'editado_id' => 1
        ]);

        DB::table('movimientos')->insert([
            'nombre' => 'Mantenimiento Correctivo',
            'tipo' => 1,
            'pais' => 'Costa Rica',
            'estado' => 1,
            'creado_id' => 1,
            'editado_id' => 1
        ]);
        DB::table('movimientos')->insert([
            'nombre' => 'Mantenimiento Correctivo',
            'tipo' => 2,
            'pais' => 'Costa Rica',
            'estado' => 1,
            'creado_id' => 1,
            'editado_id' => 1
        ]);

        DB::table('movimientos')->insert([
            'nombre' => 'Nuevo Servicio',
            'tipo' => 1,
            'pais' => 'Costa Rica',
            'estado' => 1,
            'creado_id' => 1,
            'editado_id' => 1
        ]);
        DB::table('movimientos')->insert([
            'nombre' => 'Nuevo Servicio',
            'tipo' => 2,
            'pais' => 'Costa Rica',
            'estado' => 1,
            'creado_id' => 1,
            'editado_id' => 1
        ]);

        DB::table('movimientos')->insert([
            'nombre' => 'Reposición de Stock',
            'tipo' => 1,
            'pais' => 'Costa Rica',
            'estado' => 1,
            'creado_id' => 1,
            'editado_id' => 1
        ]);
        DB::table('movimientos')->insert([
            'nombre' => 'Reposición de Stock',
            'tipo' => 2,
            'pais' => 'Costa Rica',
            'estado' => 1,
            'creado_id' => 1,
            'editado_id' => 1
        ]);
        factory(App\Movimiento::class, 10)->create();
    }
}
