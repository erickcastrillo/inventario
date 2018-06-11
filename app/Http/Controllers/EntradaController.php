<?php

namespace App\Http\Controllers;

use App\MovimientoDetalle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Movimiento;
use App\Proveedor;
use App\Moneda;
use App\Proyecto;
use App\Tarea;
use App\TipoConcepto;
use App\Articulo;
use App\Almacen;
use App\Http\Requests\EntradaRequest;
use App\CuentaContable;
use App\AlmacenDetalle;

class EntradaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Administrador');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('entradas.todas', ['entradas' => Movimiento::orderBy("created_at", "des")->limit(50)->get() ]);
    }

    public function get_data($fecha_inicio, $fecha_final) {

        $data = Movimiento::whereBetween('created_at', [$fecha_inicio, $fecha_final])->orderBy("created_at", "des")->where('estado' , '=', 1)->get();
        return view('entradas.todas', ['entradas' => $data ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('entradas.nueva.compra', [
          'proveedores' => Proveedor::where('estado' , '=', 1)->get(),
          'monedas' => Moneda::where('estado' , '=', 1)->get(),
          'proyectos' => Proyecto::where('estado' , '=', 1)->get(),
          'tareas' => Tarea::where('estado' , '=', 1)->get(),
          'tiposconcepto' => TipoConcepto::where('estado' , '=', 1)->get(),
          'articulos' => Articulo::where('estado' , '=', 1)->get(),
          'cuentas_contable' => CuentaContable::where('estado' , '=', 1)->get(),
          'almacenes' => Almacen::where('estado' , '=', 1)->orderBy('tipo_almacen')->get(),
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EntradaRequest $request)
    {
        
        $n_factura = $request->input('informacion.n_factura');
        $proveedor_id = $request->input('informacion.id_proveedor');

        $result = Movimiento::where('n_factura', $n_factura)->where('proveedor_id', $proveedor_id   )->get();

        if (!$result->isEmpty()) {

            return response()->json([
                'mensaje' => "El numero de Factura asociado al Proveedor seleccionado ya existe",
                'tipo' => 'error'
            ], 405);

        } else {

            $entrada = new Movimiento();

            $entrada->fecha = $request->input('informacion.fecha_factura');
            $entrada->proveedor_id = $request->input('informacion.id_proveedor');
            if($request->input('informacion.notas')){
                $entrada->notas = $request->input('informacion.notas');
            }
            $entrada->cuenta_id = $request->input('informacion.cuenta_contable');
            $entrada->n_factura = $request->input('informacion.n_factura');
            $entrada->proyecto_id = $request->input('informacion.proyecto_id');
            $entrada->tarea_id = $request->input('informacion.tarea_id');
            $entrada->tipo_concepto_id = $request->input('informacion.tipo_concepto_id');
            $entrada->almacen_id = $request->input('informacion.almacen_id');
            $entrada->pais = Auth::user()->pais;
            $entrada->estado = 1;
            $entrada->categoria_movimiento_id = 1;
            $entrada->creado_id = Auth::user()->id;
            $entrada->editado_id = Auth::user()->id;
    
            $saved_entrada = $entrada->save();

            $saved_entrada_detalle = true;
            $saved_new_stock = true;
    
            foreach ($request->input('rows') as $key => $val)
            {
                // Adds the row data entrada_detalle to db colum
                $entrada_detalle = new MovimientoDetalle();
                $entrada_detalle->articulo_id = $request->input('rows.'.$key.'.articulo');
                $entrada_detalle->cantidad = $request->input('rows.'.$key.'.cantidad');
                $entrada_detalle->costo_unitario = $request->input('rows.'.$key.'.costo');
                $entrada_detalle->moneda_id = $request->input('informacion.moneda_id.value');
                $entrada_detalle->lote = $request->input('rows.'.$key.'.lote');
                if($request->input('rows.'.$key.'.serie')){
                    $entrada_detalle->serie = $request->input('rows.'.$key.'.serie');
                }
                $entrada_detalle->pais = Auth::user()->pais;
                $entrada_detalle->estado = 1;
                $entrada_detalle->subcategoria_movimiento_id = 1;
                
                // Saves the data to db
                $saved_entrada_detalle = $saved_entrada_detalle and $entrada->detalles()->save($entrada_detalle);

                // Look for existing articles

                $stock_existentes = AlmacenDetalle::where('estado' , '=', 1)
                                    ->where('almacen_id', $request->input('informacion.almacen_id'))
                                    ->where("articulo_id", $request->input('rows.'.$key.'.articulo'))
                                    ->get();

                foreach($stock_existentes as $stock_existente) {
                    if(
                        $stock_existente->moneda_id ==  $request->input('informacion.moneda_id.value') &&
                        $stock_existente->costo_unitario ==  $request->input('rows.'.$key.'.costo') &&
                        $stock_existente->serie ==  $request->input('rows.'.$key.'.serie') &&
                        $stock_existente->lote ==  $request->input('rows.'.$key.'.lote')
                    ){
                        $stock_existente->cantidad += $request->input('rows.'.$key.'.cantidad');
                        $saved_new_stock = $saved_new_stock and $stock_existente->save();

                    } else {
                        $nuevo_detalle_almacen = new AlmacenDetalle();

                        $nuevo_detalle_almacen->almacen_id = $request->input('informacion.almacen_id');
                        $nuevo_detalle_almacen->articulo_id = $request->input('rows.'.$key.'.articulo');
                        $nuevo_detalle_almacen->cantidad = $request->input('rows.'.$key.'.cantidad');
                        $nuevo_detalle_almacen->costo_unitario = $request->input('rows.'.$key.'.costo');
                        $nuevo_detalle_almacen->moneda_id = $request->input('informacion.moneda_id.value');
                        $nuevo_detalle_almacen->lote = $request->input('rows.'.$key.'.lote');
                        $nuevo_detalle_almacen->serie =  $request->input('rows.'.$key.'.serie');
                        $nuevo_detalle_almacen->pais = Auth::user()->pais;

                        $nuevo_detalle_almacen->estado = 1;

                        $saved_new_stock = $saved_new_stock and $nuevo_detalle_almacen->save();
                        
                    }
                }
    
            }
    
            if($saved_entrada and $saved_entrada_detalle and $saved_new_stock){
    
                return response()->json([
                    'estado' => '¡Exito!',
                    'mensaje' => "Entrada se ha sido guardado exitosamente",
                    'tipo' => 'success'
                ], 201);

            } else {

                return response()->json([
                    'mensaje' => "La nueva entrada no se ha podido guardar",
                    'tipo' => 'error'
                ], 201);

            }
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
        $entrada = Entrada::find($id);

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
