<?php

use Illuminate\Database\Seeder;

class DesechoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Inventario\Desecho::class, 50)->create()->each(function($u) {
            for ($i = 1; $i <= 10; $i++) {
                $u->detalles()->save(factory(Inventario\DesechoDetalle::class)->make());
            }
        });
    }
}
