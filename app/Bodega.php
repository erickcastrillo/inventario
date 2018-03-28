<?php

namespace Inventario;

use Illuminate\Database\Eloquent\Model;

class Bodega extends Model
{
    public function detalles()
    {
        return $this->hasMany('Inventario\BodegaDetalle');
    }

    protected $table = 'bodegas';
}
