<?php

namespace Inventario;

use Illuminate\Database\Eloquent\Model;

class TrasladoDetalle extends Model
{
    public function entrada()
    {
        return $this->belongsTo('Inventario\Traslado');
    }

    protected $table = 'traslados_detalle';
}
