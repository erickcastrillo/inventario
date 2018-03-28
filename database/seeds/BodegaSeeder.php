<?php

use Illuminate\Database\Seeder;

class BodegaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Inventario\Bodega::class, 50)->create()->each(function($u) {
            $u->detalles()->save(factory(Inventario\BodegaDetalle::class)->make());
        });
    }
}
