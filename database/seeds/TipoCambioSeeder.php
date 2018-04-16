<?php

use Illuminate\Database\Seeder;

class TipoCambioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\TipoCambio::class, 10)->create();
    }
}
