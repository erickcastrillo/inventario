<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TrasladoRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      $rules = [
        'informacion.id_personal_retira' => 'required',
        'informacion.supervisor_id' => 'required',
        'informacion.nombre_retira' => 'required',
        'informacion.fecha_retiro' => 'required|date_format:Y-m-d',
        'informacion.hora_retiro' => 'required|date_format:H:i a',
        'informacion.departamento_id' => 'required|numeric',
        'informacion.movimiento_id' => 'required|numeric',
        'informacion.almacen_id' => 'required|numeric',
        //'informacion.notas' => 'required',

      ];
      foreach($this->request->get('rows') as $key => $val)
      {
        $rules['rows.'.$key.'.articulo'] = 'required|numeric';
        $rules['rows.'.$key.'.cantidad'] = 'required|numeric';
      }
      return $rules;
    }

    
}
