<?php

use Illuminate\Database\Seeder;

class NotificacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Inventario\Notificacion::class, 50)->create()->each(function($u) {
            $u->detalles()->save(factory(Inventario\NotificacionDetalle::class)->make());
        });
    }
}
