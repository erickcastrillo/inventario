<?php

namespace Inventario;

use Illuminate\Database\Eloquent\Model;
use Inventario\User;
use Inventario\Articulo;
use Inventario\Moneda;

class GastoDetalle extends Model
{
    public function entrada()
    {
        return $this->belongsTo('Inventario\Gasto');
    }

    public function get_moneda()
    {
        return Moneda::find($this->moneda_id);
    }

    public function get_articulo()
    {
        return Articulo::find($this->articulo_id);
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

    protected $table = 'gastos_detalle';
}
