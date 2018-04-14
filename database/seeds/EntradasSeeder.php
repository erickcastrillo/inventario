<?php

use Illuminate\Database\Seeder;

class EntradasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Inventario\Entrada::class, 50)->create()->each(function($u) {
            for ($i = 1; $i <= 10; $i++) {
                $u->detalles()->save(factory(Inventario\EntradaDetalle::class)->make());
            }
        });
    }
}
