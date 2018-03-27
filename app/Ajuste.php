<?php

namespace Inventario;

use Illuminate\Database\Eloquent\Model;

class Ajuste extends Model
{
    public function detalles()
    {
        return $this->hasMany('Inventario\AjusteDetalle');
    }

    protected $table = 'ajustes';
}
