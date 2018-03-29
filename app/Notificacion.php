<?php

namespace Inventario;

use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    public function detalles()
    {
        return $this->hasMany('Inventario\NotificacionDetalle');
    }

    protected $table = 'notificaciones';
}
