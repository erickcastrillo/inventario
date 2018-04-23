<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bodega;
use App\BodegaDetalle;
use App\Articulo;

class BodegaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getProductos($id)
    {
      $results = [];
      $detalles_bodega =  Bodega::find($id)->detalles()->select('id', 'articulo_id', 'bodega_id')->get();
      foreach ($detalles_bodega as $detalle_bodega) {
        $detalle_bodega['nombre_producto'] = Articulo::find($detalle_bodega->articulo_id)->descripcion;
      }
      return response()->json( $detalles_bodega );
    }

    public function getLotes($bodega_id, $producto_id)
    {
      $lotes =  Bodega::find($bodega_id)->detalles()->where('articulo_id', '=', $producto_id)->select('lote', 'id', 'articulo_id')->get();
      return response()->json( $lotes );
    }

    public function getSerie($bodega_id, $producto_id, $lote)
    {
      $serie =  Bodega::find($bodega_id)
                            ->detalles()
                            ->where('articulo_id', '=', $producto_id)
                            ->where('lote', '=', $lote)
                            ->select('serie', 'id', 'articulo_id')
                            ->get();
      return response()->json( $serie );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Bodega::all());
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }


}
