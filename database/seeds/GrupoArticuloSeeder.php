<?php

use Illuminate\Database\Seeder;

class GrupoArticuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\GrupoArticulo::class, 10)->create();
    }
}
