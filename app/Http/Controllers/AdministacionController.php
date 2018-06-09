<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Articulo;
use App\ABCArticulo;
use App\GrupoArticulo;

class AdministacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Administrador');
    }


    /*
    * Section de administacion de Articulos
    */

    // Lista todos los articuloas
    public function list_all_articles()
    {
        return view('admin.articulos.todos', [
            'articulos' => Articulo::all()
        ]);
    }
    
}
