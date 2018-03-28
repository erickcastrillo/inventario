<?php

use Illuminate\Database\Seeder;

class CuentaContableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Inventario\CuentaContable::class, 50)->create();
    }
}
