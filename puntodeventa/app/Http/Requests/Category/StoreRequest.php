<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name'=> 'required|string|max:100',
            'description'=>'nullable|string|max:250'
        ];
    }

    public function messages(){
        return [
            'name.required'=>'Este campo es requerido',
            'name.string'=>'Este campo tiene que ser una cadena de texto',
            'name.max'=>'el maximo de este campo es 100 caracteres',
            'description.string'=>'Este campo tiene que ser una cadena de texto',
            'description.max'=>'Este campo tiene un maximo de 250 caracteres',
        ];
    }
}
