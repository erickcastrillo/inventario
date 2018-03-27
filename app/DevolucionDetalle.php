<?php

namespace Inventario;

use Illuminate\Database\Eloquent\Model;

class DevolucionDetalle extends Model
{
    public function devolucion()
    {
        return $this->belongsTo('Inventario\Devolucion');
    }

    protected $table = 'devoluciones_detalle';
}
