<?php

namespace Inventario;

use Illuminate\Database\Eloquent\Model;

class Devolucion extends Model
{
    public function detalles()
    {
        return $this->hasMany('Inventario\DevolucionDetalle');
    }

    protected $table = 'devoluciones';
}
