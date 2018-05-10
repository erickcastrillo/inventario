<?php

use Illuminate\Database\Seeder;

class MonedaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('monedas')->insert([
            'nombre' => 'Colon',
            'sigla' => 'CRC',
            'por_defecto' => 1,
            'pais' => 'Costa Rica',
            'estado' => 1,
            'creado_id' => 1,
            'editado_id' => 1
        ]);

        factory(App\Moneda::class, 10)->create();
    }
}
