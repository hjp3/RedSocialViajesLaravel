<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EtiquetaUpdateRequest extends FormRequest
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

    // el slug no se tiene que repetir, salvo que se evalúe a sí mismo
    //que es el parámetro tag que usamos 
    public function rules()
    {
        return [
            'name' = 'required',                        
            'slug' = 'required|unique:etiquetas,slug,' . $this->etiqueta, 
        ];
    }
}
