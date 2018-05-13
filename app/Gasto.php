<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Departamento;
use App\Proyecto;
use App\Tarea;
use App\User;
use App\Cliente;
use App\Almacen;
use App\Movimiento;

class Gasto extends Model
{
    public function detalles()
    {
        return $this->hasMany('App\GastoDetalle');
    }

    public function get_departamento()
    {
        return Departamento::find($this->departamento_id);
    }

    public function get_cliente()
    {
        return Cliente::find($this->cliente_id);
    }

    public function get_proyecto()
    {
        return Proyecto::find($this->proyecto_id);
    }

    public function get_tarea()
    {
        return Tarea::find($this->tarea_id);
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

    public function get_almacenes() {
        return Almacen::find($this->almacenes_id);
    }

    public function get_editor()
    {
        return User::find($this->editado_id);
    }

    public function get_movimiento()
    {
        return Movimiento::find($this->movimiento_id);
    }

    protected $table = 'gastos';
}
