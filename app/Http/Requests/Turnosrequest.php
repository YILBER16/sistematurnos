<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Turnosrequest extends FormRequest
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
    public function messages()
    {
        return [
            'id_usuario.required' => 'Por favor digite el numero de identicación',          
            'tipo_turno.required' => 'Por favor elija el tipo de turno',          
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id_usuario'=>'required',
            'tipo_turno'=>'required',
        ];
    }
}
