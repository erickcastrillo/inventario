<?php

use Illuminate\Database\Seeder;

class TrasladoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Inventario\Traslado::class, 50)->create()->each(function($u) {
            for ($i = 1; $i <= 10; $i++) {
                $u->detalles()->save(factory(Inventario\TrasladoDetalle::class)->make());
            }
        });
    }
}
