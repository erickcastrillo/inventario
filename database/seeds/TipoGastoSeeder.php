<?php

use Illuminate\Database\Seeder;

class TipoGastoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\TipoGasto::class, 10)->create();
    }
}
