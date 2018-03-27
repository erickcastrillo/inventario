<?php

use Illuminate\Database\Seeder;

class AjusteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Inventario\Ajuste::class, 50)->create()->each(function($u) {
            $u->detalles()->save(factory(Inventario\AjusteDetalle::class)->make());
        });
    }
}
