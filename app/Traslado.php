<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Almacen;
use App\Departamento;
use App\Movimiento;
use App\User;

class Traslado extends Model
{
    public function detalles()
    {
        return $this->hasMany('App\TrasladoDetalle');
    }

    public function get_departamento()
    {
        return Departamento::find($this->departamento_id);
    }

    public function get_movimiento()
    {
        return Movimiento::find($this->movimiento_id);
    }

    public function get_almacen()
    {
        return Almacen::find($this->almacen_id);
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
