<?php

namespace Inventario;

use Illuminate\Database\Eloquent\Model;

class DesechoDetalle extends Model
{
    public function desecho()
    {
        return $this->belongsTo('Inventario\Desecho');
    }

    protected $table = 'desechos_detalle';
}
