<?php

namespace Inventario;

use Illuminate\Database\Eloquent\Model;
use Inventario\Bodega;
use Inventario\Departamento;
use Inventario\User;

class Traslado extends Model
{
    public function detalles()
    {
        return $this->hasMany('Inventario\TrasladoDetalle');
    }

    public function get_departamento()
    {
        return Departamento::find($this->departamento_id);
    }

    public function get_bodega_entrada()
    {
        return Bodega::find($this->bodega_id_entrada);
    }

    public function get_bodega_salida()
    {
        return Bodega::find($this->bodega_id_salida);
    }

    public function get_creador_name()
    {
        $name = User::find($this->creado_id)->name;
        $last_name = User::find($this->creado_id)->last_name;

        return $name . " " . $last_name;
    }

    public function get_editor_name()
    {
        $name = User::find($this->editado_id)->name;
        $last_name = User::find($this->editado_id)->last_name;

        return $name . " " . $last_name;
    }

    public function get_creador()
    {
        return User::find($this->creado_id);
    }

    public function get_editor()
    {
        return User::find($this->editado_id);
    }

    protected $table = 'traslados';
}
