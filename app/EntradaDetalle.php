<?php

namespace Inventario;

use Illuminate\Database\Eloquent\Model;

class EntradaDetalle extends Model
{
    
    public function entrada()
    {
        return $this->belongsTo('Inventario\Entrada');
    }

    protected $table = 'entradas_detalle';
}
