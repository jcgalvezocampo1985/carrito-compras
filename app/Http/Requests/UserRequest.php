<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|min:3|max:255',
            'email' => 'required|email',
            'password' => 'required|min:3|max:15',
            'role_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Requerido',
            'name.min' => 'Debe contener minimo 1 caracteres',
            'name.max' => 'Debe contener máximo 255 caracteres',
            'email.required' => 'Requerido',
            'email.email' => 'Formato incorrecto',
            'password.required' => 'Requerido',
            'password.min' => 'Debe contener minimo 1 caracteres',
            'password.max' => 'Debe contener máximo 15 caracteres',
            'role_id.required' => 'Requerido'
        ];
    }
}