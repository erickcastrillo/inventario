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
        factory(App\Bodega::class, 50)->create()->each(function($u) {
            for ($i = 1; $i <= 10; $i++) {
                $u->detalles()->save(factory(App\BodegaDetalle::class)->make());
            }
        });
    }
}
