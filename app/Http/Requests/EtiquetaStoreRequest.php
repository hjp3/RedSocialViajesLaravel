<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EtiquetaStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // autorizamos a la validación
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // le agregamos los campos a validar
        // el campo slug es requerido y obligatorios y tiene que coincidir con el campo slug
        return [
            'name' = 'required',
            'slug' = 'required|unique:etiquetas,slug',
        ];
    }
}
