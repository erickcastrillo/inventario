<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Proyecto;
use App\Tarea;
use App\TipoConcepto;
use App\User;
use App\Proveedor;

class Entrada extends Model
{
    public function detalles()
    {
        return $this->hasMany('App\EntradaDetalle');
    }

    public function movimientos() {
        return $this->hasOne('App\Movimiento');
    }

    public function get_proyecto()
    {
        return Proyecto::find($this->proyecto_id);
    }

    public function get_movimiento()
    {
        return Movimiento::find($this->movimiento_id);
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
