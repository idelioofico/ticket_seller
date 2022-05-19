<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'name'=>'required|string',
            'nuit'=>'nullable|numeric|digits:9',
            'contact'=>'required|numeric|digits:9',
            'contact_alt'=>'nullable|numeric|digits:9',
            'address'=>'nullable|string',
            'email'=> 'nullable|email'
        ];
    }

    public function messages(){

        return [
            'required'=>'Obrigatório preencher.',
            'numeric'=>'Introduza números apenas.',
            'digits'=>'Deve intoduzir um mínimo de :digits digitos.',
            'email'=>'Introduza um email válido.'
        ];
    }
}
