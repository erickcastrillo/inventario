<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserBasicInfoRequest extends Request
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
        return [
            'basic.name' => 'required',
            'basic.last_name'  => 'required',
            'basic.user_name'  => 'required',
            'basic.email'      => 'required|email'
        ];
    }
}
