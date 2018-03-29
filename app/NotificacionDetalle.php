<?php

namespace Inventario;

use Illuminate\Database\Eloquent\Model;

class NotificacionDetalle extends Model
{
    public function notificacion()
    {
        return $this->belongsTo('Inventario\Notificacion');
    }

    protected $table = 'notificaciones_detalle';
}
