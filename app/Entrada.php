<?php

namespace Inventario;

use Illuminate\Database\Eloquent\Model;
use Inventario\Proyecto;
use Inventario\Tarea;
use Inventario\TipoConcepto;
use Inventario\User;
use Inventario\Proveedor;

class Entrada extends Model
{
    public function detalles()
    {
        return $this->hasMany('Inventario\EntradaDetalle');
    }

    public function get_proyecto()
    {
        return Proyecto::find($this->proyecto_id);
    }

    public function get_proveedor() {
        return Proveedor::find($this->proveedor_id);
    }

    public function get_tarea()
    {
        return Tarea::find($this->tarea_id);
    }

    public function get_tipo_concepto()
    {
        return TipoConcepto::find($this->creado_id);
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

    protected $table = 'entradas';
}
