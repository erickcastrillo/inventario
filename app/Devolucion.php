<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Almacen;
use App\Cliente;

class Devolucion extends Model
{

    public function detalles()
    {
        return $this->hasMany('App\DevolucionDetalle');
    }

    public function get_almacenes()
    {
        return Almacen::find($this->almacen_id);
    }

    public function get_cliente()
    {
        return Cliente::find($this->cliente_id);
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

    protected $table = 'devoluciones';
}
