<?php

namespace Inventario;

use Illuminate\Database\Eloquent\Model;
use Inventario\Departamento;
use Inventario\Proyecto;
use Inventario\Tarea;
use Inventario\User;


class Gasto extends Model
{
    public function detalles()
    {
        return $this->hasMany('Inventario\GastoDetalle');
    }

    public function get_departamento()
    {
        return Departamento::find($this->departamento_id);
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

    public function get_editor()
    {
        return User::find($this->editado_id);
    }

    protected $table = 'gastos';
}
