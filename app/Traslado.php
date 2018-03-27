<?php

namespace Inventario;

use Illuminate\Database\Eloquent\Model;

class Traslado extends Model
{
    public function detalles()
    {
        return $this->hasMany('Inventario\TrasladoDetalleController');
    }

    protected $table = 'traslados';
}
