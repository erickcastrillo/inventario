<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovimientoDetalle extends Model
{
    public function movimiento()
    {
        return $this->belongsTo('App\Movimiento');
    }

    public function get_tipo_movimiento()
    {
        return CategoriaMovimiento::find($this->movimiento_id);
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

    protected $table = "movimiento_detalles";
}
