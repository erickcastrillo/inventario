<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Categoria;
use App\UnidadMedida;

class Articulo extends Model
{
    public function almacenes()
    {
        return $this->belongsTo('App\Almacen');
    }

    public function get_categoria()
    {
        return Categoria::find($this->categoria_id);
    }

    public function get_unidad_medida()
    {
        return UnidadMedida::find($this->medida_id);
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

    protected $table = 'articulos';
}
