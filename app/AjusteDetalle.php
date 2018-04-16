<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Articulo;
use App\Moneda;

class AjusteDetalle extends Model
{
    public function ajuste()
    {
        return $this->belongsTo('App\Ajuste');
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

    protected $table = 'ajustes_detalle';
}
