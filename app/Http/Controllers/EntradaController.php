<?php

namespace Inventario\Http\Controllers;

use Illuminate\Http\Request;

use Inventario\Http\Requests;
use Inventario\Http\Controllers\Controller;
use Inventario\Entrada;
use Inventario\Proveedor;
use Inventario\Moneda;
use Inventario\Proyecto;
use Inventario\Tarea;
use Inventario\TipoConcepto;

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
        return view('entradas.todas', ['entradas' => Entrada::orderBy("created_at", "des")->limit(50)->get() ]);
    }

    public function get_data($fecha_inicio, $fecha_final) {
        $data = Entrada::whereBetween('created_at', [$fecha_inicio, $fecha_final])->orderBy("created_at", "des")->get();

        return view('entradas.todas', ['entradas' => $data ]);
    }

    public function nueva_entrada()
    {
        return view('entradas.nueva.compra', [
            'proveedores' => Proveedor::all(),
            'monedas' => Moneda::all(),
            'proyectos' => Proyecto::all(),
            'tareas' => Tarea::all(),
            'tiposconcepto' => TipoConcepto::all()
        ]);
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
        $entrada = Entrada::find($id);
        if ($entrada->delete())
        {
            return response()->json(['status' => 'Success', 'mensaje' => "Entrada con id '" . $id . "' ha sido borrado exitosamente"]);
        }
        else
        {
            return response()->json(['status' => 'Error', 'mensaje' => "Entrada con id '" . $id . "' no se ha borrado"]);
        }
    }
}
