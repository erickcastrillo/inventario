<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EntradaRequest extends Request
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
            'informacion.fecha_factura' => 'required|date_format:Y-m-d',
            'informacion.cuenta_contable' => 'required',
            'informacion.almacen_id' => 'required',
            'informacion.total' => 'required|numeric',
            'informacion.id_proveedor' => 'required|numeric',
            'informacion.moneda_id' => 'required',
            'informacion.n_factura' => 'required|numeric',
            'informacion.proyecto_id' => 'required|numeric',
            'informacion.tarea_id' => 'required|numeric',
            'informacion.tipo_concepto_id' => 'required|numeric',
            'informacion.notas' => 'required',

        ];
        foreach($this->request->get('rows') as $key => $val)
        {
            $rules['rows.'.$key.'.articulo'] = 'required|numeric';
            $rules['rows.'.$key.'.cantidad'] = 'required|numeric';
            $rules['rows.'.$key.'.costo'] = 'required|numeric';
            $rules['rows.'.$key.'.lote'] = 'required|numeric';
            $rules['rows.'.$key.'.serie'] = 'required|numeric';
            $rules['rows.'.$key.'.subtotal'] = 'required|numeric';
        }
        return $rules;
    }
    public function messages()
    {
        $messages = [
            'informacion.fecha_factura' => 'Fecha de factura es requesrida y debe contener fechas',
            'informacion.cuenta_contable' => 'La cuenta contable es requerida',
            'informacion.grand_total' => 'El total es requerido y debe contener solo numeros',
            'informacion.id_proveedor' => 'ID del Proveedor es requerido y debe contener solo numeros',
            'informacion.moneda_id' => 'ID de la Moneda es requerido y debe contener solo numeros',
            'informacion.n_factura' => 'Numero de la Factura es requerido y debe contener solo numeros',
            'informacion.proyecto_id' => 'ID del Proyecto es requerido y debe contener solo numeros',
            'informacion.tarea_id' => 'ID de la tarea es requerido y debe contener solo numeros',
            'informacion.tipo_concepto_id' => 'Tipo de Concepto requerido y debe contener solo numeros',
            'informacion.notas' => 'El campo Notas solo puede contener letras, nombres, y dashes.'
        ];
        foreach($this->request->get('rows') as $key => $val)
        {
            $messages['rows.'.$key.'.articulo'] = 'El campo articulo es requerido y solo puede contener números.';
            $messages['rows.'.$key.'.cantidad'] = 'El campo cantidad es requerido y solo puede contener números.';
            $messages['rows.'.$key.'.costo'] = 'El campo costo es requerido y solo puede contener números.';
            $messages['rows.'.$key.'.lote'] = 'El campo lote es requerido y solo puede contener números.';
            $messages['rows.'.$key.'.serie'] = 'El campo serie es requerido y solo puede contener números.';
            $messages['rows.'.$key.'.total'] = 'El campo total es requerido y solo puede contener números.';
        }
        return $messages;
    }
}
