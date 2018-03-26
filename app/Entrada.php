<?php

namespace Inventario;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    public function detalles()
    {
        return $this->hasMany('Inventario\EntradaDetalle');
    }

    protected $table = 'entradas';
}
