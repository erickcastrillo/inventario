<?php

use Illuminate\Database\Seeder;

class DevolucionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Inventario\Devolucion::class, 50)->create()->each(function($u) {
            $u->detalles()->save(factory(Inventario\DevolucionDetalle::class)->make());
        });
    }
}
