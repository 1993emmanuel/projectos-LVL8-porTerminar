<?php

namespace App\Http\Requests\Provider;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name'=>'required|string|max:50',

            'email'=>'required|email|string|unique:providers,email,'
            .$this->route('provider')->id.'|max:255',

            'ruc_number'=>'required|string|min:11|unique:providers,ruc_number,'
            .$this->route('provider')->id.'|max:11',

            'address'=>'nullable|string|max:250',

            'phone'=>'required|string|min:9|unique:providers,phone,'.$this->route('provider')->id.'|max:9',

        ];
    }

    public function messages(){
        return [];
    }
}
