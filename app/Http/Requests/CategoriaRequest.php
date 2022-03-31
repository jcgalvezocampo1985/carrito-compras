<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaRequest extends FormRequest
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
            'nombre' => 'required|min:3|max:255'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'Requerido',
            'nombre.min' => 'Debe contener minimo 1 caracteres',
            'nombre.max' => 'Debe contener máximo 255 caracteres'
        ];
    }
}