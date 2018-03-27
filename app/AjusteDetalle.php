<?php

namespace Inventario;

use Illuminate\Database\Eloquent\Model;

class AjusteDetalle extends Model
{
    public function ajuste()
    {
        return $this->belongsTo('Inventario\Ajuste');
    }

    protected $table = 'ajustes_detalle';
}
