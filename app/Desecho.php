<?php

namespace Inventario;

use Illuminate\Database\Eloquent\Model;

class Desecho extends Model
{
    public function detalles()
    {
        return $this->hasMany('Inventario\DesechoDetalle');
    }

    protected $table = 'desechos';
}
