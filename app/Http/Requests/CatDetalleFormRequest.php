<?php

namespace Tienda\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CatDetalleFormRequest extends FormRequest
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
            'det_nom'=>'required|max:45',
        ];
    }
}
