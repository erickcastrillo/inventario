<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Almacen extends Model
{
    public function detalles()
    {
        return $this->hasMany('App\AlmacenDetalle');
    }

    public function get_responsable()
    {
        return User::find($this->responsable_id);
    }

    public function get_responsable_name()
    {
        $name = User::find($this->responsable_id)->name;
        $last_name = User::find($this->responsable_id)->last_name;

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

    protected $table = 'almacenes';
}
