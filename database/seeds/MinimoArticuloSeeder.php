<?php

use Illuminate\Database\Seeder;

class MinimoArticuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\MinimoArticulo::class, 10)->create();
    }
}
