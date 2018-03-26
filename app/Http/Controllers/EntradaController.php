<?php

namespace Inventario\Http\Controllers;

use Illuminate\Http\Request;

use Inventario\Http\Requests;
use Inventario\Http\Controllers\Controller;
use Inventario\Entrada;
use Inventario\EntradaDetalle;

class EntradaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('supervisor');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('entradas.todas', ['entradas' => Entrada::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('entradas.ver', [
            'entrada' => Entrada::find($id),
            'detalles' => Entrada::find($id)->detalles()->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        return view('entradas.editar', [
            'entrada' => Entrada::find($id),
            'detalles' => Entrada::find($id)->detalles()->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Entrada = Entrada::find($id);
        if ($Entrada->delete()) 
        {
            return response()->json(['status' => 'Success', 'mensaje' => "Entrada con id '" . $id . "' ha sido borrado exitosamente"]);
        }
        else
        {
            return response()->json(['status' => 'Error', 'mensaje' => "Entrada con id '" . $id . "' no se ha borrado"]);
        }
    }
}
