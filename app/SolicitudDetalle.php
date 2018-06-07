<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolicitudDetalle extends Model
{
    //
    public function solicitud()
    {
        return $this->belongsTo('App\Solicitud');
    }
    protected $table = 'solicitud_detalles';
}
