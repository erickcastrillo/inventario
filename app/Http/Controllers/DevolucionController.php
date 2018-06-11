<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Devolucion;
use App\DevolucionDetalle;
use Illuminate\Support\Facades\Auth;
use App\Articulo;
use App\Almacen;
use App\Moneda;
use App\Cliente;
use App\Http\Requests\DevolucionRequest;
use App\Movimiento;
use App\MovimientoDetalle;

class DevolucionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Administrador');
    }

    public function nueva_entrada_devolucion()
    {
      return view('devoluciones.nueva.devolucion', [
          'clientes' => Cliente::where('estado' , '=', 1)->get(),
          'monedas' => Moneda::where('estado' , '=', 1)->get(),
          'almacenes' => Auth::user()->get_almacenes()->where('estado' , '=', 1)->get(),
          'articulos' => Articulo::where('estado' , '=', 1)->get(),
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

      return view('devoluciones.nueva.devolucion', [
          'clientes' => Cliente::where('estado' , '=', 1)->get(),
          'monedas' => Moneda::where('estado' , '=', 1)->get(),
          'almacenes' => Almacen::where('estado' , '=', 1)->get(),
          'articulos' => Articulo::where('estado' , '=', 1)->get(),
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
      $devolucion = new Movimiento();

      $devolucion->fecha = $request->input('informacion.fecha_devolucion');
      $devolucion->cliente_id = $request->input('informacion.cliente_id');
      if($request->input('informacion.notas')){
          $devolucion->notas = $request->input('informacion.notas');
      }
      //$entrada->moneda_id = $request->input('informacion.moneda_id');
      $devolucion->almacen_id = $request->input('informacion.almacen_id');
      $devolucion->pais = Auth::user()->pais;
      $devolucion->estado = 1;
      $devolucion->creado_id = Auth::user()->id;
      $devolucion->editado_id = Auth::user()->id;
      $devolucion->estado = 1;
      $devolucion->categoria_movimiento_id = 1;

      $saved_devolucion = $devolucion->save();

      foreach ($request->input('rows') as $key => $val)
      {
          $DevolucionDetalle = new MovimientoDetalle();
          $DevolucionDetalle->articulo_id = $request->input('rows.'.$key.'.articulo');
          $DevolucionDetalle->cantidad = $request->input('rows.'.$key.'.cantidad');
          $DevolucionDetalle->costo_unitario = $request->input('rows.'.$key.'.costo');
          $DevolucionDetalle->moneda_id = $request->input('informacion.moneda_id.id');
          $DevolucionDetalle->lote = $request->input('rows.'.$key.'.lote');
          $DevolucionDetalle->serie = $request->input('rows.'.$key.'.serie');
          $DevolucionDetalle->pais = Auth::user()->pais;
          $DevolucionDetalle->estado = 1;
          $DevolucionDetalle->subcategoria_movimiento_id = 2;

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
              'mensaje' => "La nueva desinstalación no se ha podido guardar",
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
      $entrada = Devolucion::find($id);

      if(!$entrada) {
          return response()->json([
              'estado' => '¡Error!',
              'mensaje' => "Entrada con id '" . $id . "' no existe",
              'tipo' => 'error'
          ]);
      }
      else
      {
          if ($entrada->delete())
          {
              return response()->json([
                  'estado' => '¡Exito!',
                  'mensaje' => "Entrada con id '" . $id . "' ha sido borrado exitosamente",
                  'tipo' => 'success'
              ]);
          }
          else
          {
              return response()->json([
                  'estado' => '¡Error!',
                  'mensaje' => "Entrada con id '" . $id . "' no se ha borrado",
                  'tipo' => 'error'
              ]);
          }
      }
    }

}
