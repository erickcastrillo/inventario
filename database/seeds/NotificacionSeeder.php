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
        factory(App\Notificacion::class, 50)->create()->each(function($u) {
            for ($i = 1; $i <= 10; $i++) {
                $u->detalles()->save(factory(App\NotificacionDetalle::class)->make());
            }
        });
    }
}
