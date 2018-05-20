<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Event;
use Illuminate\Support\Facades\App;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Traslado;
use App\TrasladoDetalle;
use App\Departamento;
use App\Almacen;
use App\Movimiento;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TrasladoRequest;
use App\Events\NotificationEvent;

class TrasladoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Supervisor');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return response()->json(Traslado::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('traslado.nuevo.traslado', [
        'almacenes' =>  Almacen::where('estado' , '=', 1)->get(),
        'departamentos' => Departamento::where('estado' , '=', 1)->get(),
        'movimientos' => Movimiento::where('tipo' , '=', 2)->where('estado' , '=', 1)->get(),
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TrasladoRequest $request)
    {
        $traslado = new Traslado();

        $traslado->almacen_id_entrada = $request->input('informacion.almacen_id_entrada');
        $traslado->almacen_id_salida = $request->input('informacion.almacen_id_salida');
        $traslado->fecha_retiro = $request->input('informacion.fecha_retiro');
        $traslado->hora_retiro = $request->input('informacion.hora_retiro');
        $traslado->movimiento_id = $request->input('informacion.movimiento_id');
        $traslado->departamento_id = $request->input('informacion.departamento_id');
        $traslado->nombre_retira = $request->input('informacion.nombre_retira');
        $traslado->id_personal_retira = $request->input('informacion.id_personal_retira');
        if($request->input('informacion.notas')){
            $traslado->notas = $request->input('informacion.notas');
        }
        $traslado->pais = Auth::user()->country;
        $traslado->creado_id = Auth::user()->id;
        $traslado->editado_id = Auth::user()->id;
        $traslado->estado = 1;

        $saved_traslado = $traslado->save();
        foreach ($request->input('rows') as $key => $val)
        {
          $p =  Almacen::find($request->input('informacion.almacen_id_salida'))
                                ->detalles()
                                ->where('articulo_id', '=', $request->input('rows.'.$key.'.articulo'))
                                ->where('lote', '=', $request->input('rows.'.$key.'.lote'))
                                ->where('serie', '=', $request->input('rows.'.$key.'.serie'))
                                ->select( 'costo_unitario')
                                ->get();
            $traslado_detalle = new TrasladoDetalle();
            $traslado_detalle->articulo_id = $request->input('rows.'.$key.'.articulo');
            $traslado_detalle->cantidad = $request->input('rows.'.$key.'.cantidad');
            $traslado_detalle->costo_unitario = $p;
            $traslado_detalle->lote = $request->input('rows.'.$key.'.lote');
            $traslado_detalle->serie = $request->input('rows.'.$key.'.serie');
            $traslado_detalle->moneda_id = Auth::user()->get_moneda()->first()->id;
            $traslado_detalle->pais = Auth::user()->country;

            // estado 0 means pending, 1 approved, 2 rejected
            $traslado_detalle->estado = 0;

            $saved_traslado_detalle = $traslado->detalles()->save($traslado_detalle);
        }

        if($saved_traslado and $saved_traslado_detalle){

            $notiticacion = new \stdClass();
            $notiticacion->title = "Nueva solicitud de traslado";
            $notiticacion->message = "El usuario " . Auth::user()->get_full_name() . " ha solicitado un nuevo traslado, por favor revisa los detalles aqui";
            $notiticacion->type = 'info';
            $notiticacion->url = '/';

            Event::fire(new NotificationEvent($notiticacion));

            return response()->json([
                'estado' => '¡Exito!',
                'mensaje' => "Traslado ha sido guardado exitosamente",
                'tipo' => 'success'
            ], 201);

        } else {

            return response()->json([
                'estado' => '¡Error!',
                'mensaje' => "El nuevo Traslado no se ha podido guardar",
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
