<?php

namespace Tienda\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoFormRequest extends FormRequest
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
            'pro_nom'=>'required|max:45',
            'pro_info'=>'required|max:200',
            'pro_precio'=>'numeric',
            'pro_foto'=>'mimes:jpeg,bmp,png|max:2000',
            'categoria_cat_id'=>'required',
            'users_id'=>'required'
        ];
    }
}
