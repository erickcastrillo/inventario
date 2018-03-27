<?php

namespace Inventario;

use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    public function detalles()
    {
        return $this->hasMany('Inventario\GastoDetalle');
    }

    protected $table = 'gastos';
}
