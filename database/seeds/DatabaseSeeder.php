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

        $this->call(Roles::class);
        $this->call(UserSeeder::class);
        $this->call(AlmacenSeeder::class);
        $this->call(TipoCambioSeeder::class);
        $this->call(ArticuloSeeder::class);
        $this->call(ProveedorSeeder::class);
        $this->call(CuentaContableSeeder::class);
        $this->call(ProyectoSeeder::class);
        $this->call(TareaSeeder::class);
        $this->call(MonedaSeeder::class);
        $this->call(UnidadMedidaSeeder::class);
        $this->call(CategoriaMovimientoSeeder::class);
        $this->call(SubCategoriaMovimientoSeeder::class);
        $this->call(TipoConceptoSeeder::class);
        $this->call(DepartamentoSeeder::class);
        $this->call(NotificacionSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(EnlaceSeeder::class);
        $this->call(PaisSeeder::class);
        $this->call(LineaArticuloSeeder::class);
        $this->call(GrupoArticuloSeeder::class);
        $this->call(ABCArticuloSeeder::class);
        $this->call(MinimoArticuloSeeder::class);

        Model::reguard();
    }
}
