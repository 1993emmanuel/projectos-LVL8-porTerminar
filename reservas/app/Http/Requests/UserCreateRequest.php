<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
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
             'name'=>'required|min:3|max:5',
             'username'=>'required|min:5|unique:users',
             'email'=>'required|email|unique:users',
             'password'=>'required'
        ];
    }

    public function messages(){
        return [
            'name.required'=>'el valor nombre es requerido para la operacion',
            'name.min'=>'tiene que ser mayor a 3 caracteres el nombre.',
            'name.max'=>'no puede ser mayor a 5 caracteres el nombre.',
        ];
    }

}
