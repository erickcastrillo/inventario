<?php

namespace App\Http\Controllers;

use App\EntradaDetalle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Entrada;
use App\Proveedor;
use App\Moneda;
use App\Proyecto;
use App\Tarea;
use App\TipoConcepto;
use App\Articulo;
use App\Almacen;
use App\Http\Requests\EntradaRequest;
use App\CuentaContable;

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
        return view('entradas.todas', ['entradas' => Entrada::orderBy("created_at", "des")->limit(50)->get() ]);
    }

    public function get_data($fecha_inicio, $fecha_final) {

        $data = Entrada::whereBetween('created_at', [$fecha_inicio, $fecha_final])->orderBy("created_at", "des")->where('estado' , '=', 1)->get();
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

        $result = Entrada::where('n_factura', $n_factura)->where('proveedor_id', 10)->get();

        if (!$result->isEmpty()) {

            return response()->json([
                'mensaje' => "El numero de Factura asociado al Proveedor seleccionado ya existe",
                'tipo' => 'error'
            ], 405);

        } else {

            $entrada = new Entrada();

            $entrada->fecha_factura = $request->input('informacion.fecha_factura');
            $entrada->proveedor_id = $request->input('informacion.id_proveedor');
            if($request->input('informacion.notas')){
                $entrada->notas = $request->input('informacion.notas');
            }
            $entrada->cuenta_contable = $request->input('informacion.cuenta_contable');
            $entrada->n_factura = $request->input('informacion.n_factura');
            $entrada->proyecto_id = $request->input('informacion.proyecto_id');
            $entrada->tarea_id = $request->input('informacion.tarea_id');
            $entrada->tipo_concepto_id = $request->input('informacion.tipo_concepto_id');
            $entrada->pais = Auth::user()->country;
            $entrada->estado = 1;
            $entrada->movimiento_id = 1;
            $entrada->creado_id = Auth::user()->id;
            $entrada->editado_id = Auth::user()->id;
    
            $saved_entrada = $entrada->save();
    
            foreach ($request->input('rows') as $key => $val)
            {
                $entrada_detalle = new EntradaDetalle();
                $entrada_detalle->articulo_id = $request->input('rows.'.$key.'.articulo');
                $entrada_detalle->cantidad = $request->input('rows.'.$key.'.cantidad');
                $entrada_detalle->costo_unitario = $request->input('rows.'.$key.'.costo');
                $entrada_detalle->moneda_id = $request->input('informacion.moneda_id.id');
                $entrada_detalle->lote = $request->input('rows.'.$key.'.lote');
                $entrada_detalle->serie = $request->input('rows.'.$key.'.serie');
                $entrada_detalle->pais = Auth::user()->country;
                $entrada_detalle->estado = 1;
    
                $saved_entrada_detalle = $entrada->detalles()->save($entrada_detalle);
    
            }
    
            if($saved_entrada and $saved_entrada_detalle){
    
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
