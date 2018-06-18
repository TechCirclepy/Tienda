<?php

namespace Tienda\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaFormRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'descripcion'=>'required|max:200',
            'direccion'=>'required|max:150',
            'cel'=>'required|max:45',
            'foto'=>'mimes:jpeg,bmp,png|max:2000',
            'activo'=>'nemeric'
        ];
    }
}
