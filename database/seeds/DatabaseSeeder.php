<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(EntradasSeeder::class);
        $this->call(DevolucionSeeder::class);
        $this->call(TrasladoSeeder::class);
        $this->call(GastoSeeder::class);
        $this->call(DesechoSeeder::class);
        $this->call(BodegaSeeder::class);
        $this->call(TipoCambioSeeder::class);

        Model::reguard();
    }
}
