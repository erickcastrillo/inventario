<?php

namespace Inventario;

use Illuminate\Database\Eloquent\Model;

class GastoDetalle extends Model
{
    public function entrada()
    {
        return $this->belongsTo('Inventario\Gasto');
    }

    protected $table = 'gastos_detalle';
}
