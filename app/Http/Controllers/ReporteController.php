<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Almacen;

class ReporteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // todo
        return view('reportes.generar', [
            'tipos_reporte' => [
                    [
                        "id" => 1,
                        "name" => "Entradas"
                    ],
                    [
                        "id" => 2,
                        "name" => "Solicitudes de Traslado"
                    ]
                ]
        ]);
    }

    public function generar(Request $request)
    {
        try
        {
            $table = strtolower($request->input('table'));
            $fechaInicio = $request->input('fechaInicio');
            $fechaFinal = $request->input('fechaFinal');

            $replace_underscore = function($a) {
                return str_replace("_"," ",$a);
            };
            $replace_N = function($a) {
                return str_replace("n ","# ",$a);
            };
            $replace_ID = function($a) {
                return str_replace("_id","",$a);
            };

            $replace_index = function($a) {
                return str_replace("Id","#",$a);
            };
            
            $replace_Created_at = function($a) {
                return str_replace("created at","Creado",$a);
            };

            $replace_empty = function($a) {
                return str_replace("","-",$a);
            };

            $headers = DB::getSchemaBuilder()->getColumnListing($table);
            $headers = array_diff($headers, ["estado", "creado_id", "editado_id", "updated_at"]);
            
            
            $headers = array_map($replace_N, $headers);
            $headers = array_map($replace_ID, $headers);
            $headers = array_map($replace_underscore, $headers);
            $headers = array_map($replace_Created_at, $headers);
            $headers = array_map('trim', $headers);
            $headers = array_map('ucwords', $headers);
            $headers = array_map($replace_index, $headers);
            
            

            $data = DB::table($table)->whereBetween('created_at', [$fechaInicio, $fechaFinal])->get();
            foreach($data as $dataEntry)
            {
                unset($dataEntry->estado);
                unset($dataEntry->creado_id);
                unset($dataEntry->editado_id);
                unset($dataEntry->updated_at);
                foreach ($dataEntry as $key => $value) {
                    if ($value == "" || !isset($value))
                    {
                        $dataEntry->$key = "-";
                    }
                }
            }
            $returnData = [
                "headers" => $headers,
                "data" => $data,
            ];

            return response()->json($returnData);

        }
        catch(Exception $e)
        {
            $error = [
                "returnCode" => "error",
                "data" => $e->getMessage()
            ];
            return response()->json($error, 500);
        }
        
    }

    public function reporte_inventario() {
        return view('reportes.inventario', [
            'almacenes' => Almacen::where('estado' , '=', 1)->get()
        ]);
    }

    public function genear_reporte_inventario(Request $request) {
        
        // deletes incomplete filter data
        $filtros = $request->input('ajaxData.filtros');
        foreach ($filtros as $key => $val) {
            if( !isset($key) || !isset($value) ) {         
                array_splice($filtros, $key, 1);
            }
        }

        // If filters are empty, we proceed to get all products from the given Almacen
        if(empty($filtros)) {
            if ($request->input('ajaxData.almacen') == -1) {
                return response()->json("Todas la bodegas");
            } else {
                $id = $request->input('ajaxData.almacen');
                $fechaInicio = $request->input('ajaxData.fechaInicio');
                $fechaFinal = $request->input('ajaxData.fechaFinal');
                $raw = "SELECT 
                            almacenes_detalle.articulo_id AS 'ID Artitulo',
                            almacenes_detalle.cantidad AS 'Cantidad',
                            almacenes_detalle.costo_unitario AS 'Costo Unitario',
                            monedas.nombre AS 'Moneda',
                            articulos.codigo AS 'Codigo de Producto',
                            articulos.descripcion AS 'Descripcion',
                            unidades_medidas.nombre AS 'Unidad de Medida',
                            articulos.cantidad_minima AS 'Cantidad Minima',
                            almacenes_detalle.lote AS 'Lote',
                            almacenes_detalle.serie AS 'Serie',
                            almacenes_detalle.pais AS 'Pais'
                        FROM
                            almacenes_detalle
                                INNER JOIN
                            articulos ON almacenes_detalle.articulo_id = articulos.id
                                INNER JOIN
                            unidades_medidas ON articulos.medida_id = unidades_medidas.id
                                INNER JOIN
                            monedas ON almacenes_detalle.moneda_id = monedas.id
                        WHERE
                            almacen_id = {$id} AND
                            almacenes_detalle.estado = 1 AND
                            almacenes_detalle.created_at between '{$fechaInicio}' AND '{$fechaFinal}';";
                $data = DB::select($raw);
                $headers = [
                    'ID Artitulo',
                    'Cantidad',
                    'Costo Unitario',
                    'Moneda',
                    'Codigo de Producto',
                    'Descripcion',
                    'Unidad de Medida',
                    'Cantidad Minima',
                    'Lote',
                    'Serie',
                    'Pais'
                ];

                $result = [
                    "headers" => $headers,
                    "data" => $data,
                ];

                return response()->json($result);
            }
        } else {

        }
        return response()->json(empty($filtros));
    }


}
