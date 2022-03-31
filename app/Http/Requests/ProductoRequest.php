<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
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
            'nombre' => 'min:3|max:255|required',
            'precio' => 'min:1|required|numeric',
            'impuesto' => 'min:1|required|numeric',
            'stock_actual' => 'min:1|required|numeric',
            'stock_minimo' => 'min:1|required|numeric',
            'categoria_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'Requerido',
            'nombre.min' => 'Debe contener minimo 1 caracter',
            'nombre.max' => 'Debe contener máximo 255 caracteres',
            'precio.required' => 'Requerido',
            'precio.min' => 'Debe contener minimo 1 caracter',
            'precio.numeric' => 'Solo números',
            'impuesto.required' => 'Requerido',
            'impuesto.min' => 'Debe contener minimo 1 caracter',
            'impuesto.numeric' => 'Solo números',
            'stock_actual.required' => 'Requerido',
            'stock_actual.min' => 'Debe contener minimo 1 caracter',
            'stock_actual.numeric' => 'Solo números',
            'stock_minimo.required' => 'Requerido',
            'stock_minimo.min' => 'Debe contener minimo 1 caracter',
            'stock_minimo.numeric' => 'Solo números',
            'categoria_id.required' => 'Requerido'
        ];
    }
}