<?php

namespace Inventario;

use Illuminate\Database\Eloquent\Model;
use Inventario\User;
use Inventario\Bodega;

class Desecho extends Model
{
    public function detalles()
    {
        return $this->hasMany('Inventario\DesechoDetalle');
    }

    public function get_bodega()
    {
        return Bodega::find($this->bodega_id);
    }

    public function get_auditor()
    {
        return User::find($this->auditor_id);
    }

    public function get_auditor_name()
    {
        $name = User::find($this->auditor_id)->name;
        $last_name = User::find($this->auditor_id)->last_name;

        return $name . " " . $last_name;
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

    protected $table = 'desechos';
}
