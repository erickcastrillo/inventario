<?php

use Illuminate\Database\Seeder;

class TipoConceptoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Inventario\TipoConcepto::class, 10)->create();
    }
}
