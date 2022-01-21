<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class Usuariosrequest extends FormRequest
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
            'id_documento.required' => 'Por favor digite el numero de identicación',
            'id_documento.unique' => 'Esta identificación ya se encuentra registrada',
            'nom_usuario.required' => 'Por favor digite el nombre del usuario',
            'edad.required' => 'Por favor digite la edad del usuario',
            'genero.required' => 'Por favor escoja el genero del usuario',            
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
            'id_documento'=>'required|unique:usuarios',
            'nom_usuario'=>'required',
            'edad'=>'required',
            'genero'=>'required',
        ];
    }
}
