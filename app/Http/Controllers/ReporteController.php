<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

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

    
}
