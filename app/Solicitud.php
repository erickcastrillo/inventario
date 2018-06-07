<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    //
    public function detalles()
    {
        return $this->hasMany('App\SolicitudDetalle');
    }

    protected $table = 'solicitudes';
}
