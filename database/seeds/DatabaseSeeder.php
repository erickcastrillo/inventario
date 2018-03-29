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

        $this->call(UserSeeder::class);
        $this->call(EntradasSeeder::class);
        $this->call(DevolucionSeeder::class);
        $this->call(TrasladoSeeder::class);
        $this->call(GastoSeeder::class);
        $this->call(DesechoSeeder::class);
        $this->call(BodegaSeeder::class);
        $this->call(TipoCambioSeeder::class);
        $this->call(ArticuloSeeder::class);
        $this->call(ProveedorSeeder::class);
        $this->call(CuentaContableSeeder::class);
        $this->call(ProyectoSeeder::class);
        $this->call(TareaSeeder::class);
        $this->call(MonedaSeeder::class);
        $this->call(UnidadMedidaSeeder::class);
        $this->call(MovimientoSeeder::class);
        $this->call(TipoConceptoSeeder::class);
        $this->call(DepartamentoSeeder::class);
        $this->call(NotificacionSeeder::class);

        Model::reguard();
    }
}
