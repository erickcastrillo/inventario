<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Devolucion;
use App\DevolucionDetalle;
use Illuminate\Support\Facades\Auth;
use App\Articulo;
use App\Bodega;
use App\Moneda;
use App\Cliente;
use App\Http\Requests\DevolucionRequest;

class DevolucionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function nueva_entrada_devolucion()
    {
      $detalles_bodega_usuario = Auth::user()->get_bodega()->first()->detalles()->get();
      $articulos = [];
      foreach ($detalles_bodega_usuario as $detalle_bodega_usuario)
      {
          array_push($articulos, Articulo::find($detalle_bodega_usuario->articulo_id) );
      }
      return view('devoluciones.nueva.devolucion', [
          'clientes' => Cliente::all(),
          'monedas' => Moneda::all(),
          'bodegas' => Auth::user()->get_bodega()->get(),
          'articulos' => $articulos,
      ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $detalles_bodega_usuario = Auth::user()->get_bodega()->first()->detalles()->get();
      $articulos = [];
      foreach ($detalles_bodega_usuario as $detalle_bodega_usuario)
      {
          array_push($articulos, Articulo::find($detalle_bodega_usuario->articulo_id) );
      }
      return view('devoluciones.nueva.devolucion', [
          'clientes' => Cliente::all(),
          'monedas' => Moneda::all(),
          'bodegas' => Auth::user()->get_bodega()->get(),
          'articulos' => $articulos,
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DevolucionRequest $request)
    {
      $devolucion = new Devolucion();

      $devolucion->fecha_devolucion = $request->input('informacion.fecha_devolucion');
      $devolucion->cliente_id = $request->input('informacion.cliente_id');
      if(defined($request->input('informacion.notas'))){
          $devolucion->notas = $request->input('informacion.notas');
      }
      //$entrada->moneda_id = $request->input('informacion.moneda_id');
      $devolucion->bodega_id = $request->input('informacion.bodega_id');
      $devolucion->pais = Auth::user()->country;
      $devolucion->estado = 1;
      $devolucion->creado_id = Auth::user()->id;
      $devolucion->editado_id = Auth::user()->id;

      foreach ($request->input('rows') as $key => $val)
      {
          $DevolucionDetalle = new DevolucionDetalle();
          $DevolucionDetalle->articulo_id = $request->input('rows.'.$key.'.articulo');
          $DevolucionDetalle->cantidad = $request->input('rows.'.$key.'.cantidad');
          $DevolucionDetalle->costo_unitario = $request->input('rows.'.$key.'.costo');
          $DevolucionDetalle->moneda_id = $request->input('informacion.moneda_id');
          $DevolucionDetalle->lote = $request->input('rows.'.$key.'.lote');
          $DevolucionDetalle->serie = $request->input('rows.'.$key.'.serie');
          $DevolucionDetalle->pais = Auth::user()->country;

          $saved_devolucion = $devolucion->save();
          $saved_devolucion_detalle = $devolucion->detalles()->save($DevolucionDetalle);
      }

      if($saved_devolucion and $saved_devolucion_detalle){

          return response()->json([
              'estado' => '¡Exito!',
              'mensaje' => "Devolución se ha sido guardado exitosamente",
              'tipo' => 'success'
          ], 201);
      } else {
          return response()->json([
              'estado' => '¡Error!',
              'mensaje' => "La nueva devolución no se ha podido guardar",
              'tipo' => 'error'
          ]. 201);
      }
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
