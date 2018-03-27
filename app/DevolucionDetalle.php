<?php

namespace Inventario;

use Illuminate\Database\Eloquent\Model;

class DevolucionDetalle extends Model
{
    public function entrada()
    {
        return $this->belongsTo('Inventario\Devolucion');
    }

    protected $table = 'devoluciones_detalle';
}
