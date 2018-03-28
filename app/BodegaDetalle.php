<?php

namespace Inventario;

use Illuminate\Database\Eloquent\Model;

class BodegaDetalle extends Model
{
    public function bodega()
    {
        return $this->belongsTo('Inventario\Bodega');
    }

    protected $table = 'bodegas_detalle';
}
