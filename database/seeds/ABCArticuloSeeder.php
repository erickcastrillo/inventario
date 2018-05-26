<?php

use Illuminate\Database\Seeder;

class ABCArticuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ABCArticulo::class, 10)->create();
    }
}
