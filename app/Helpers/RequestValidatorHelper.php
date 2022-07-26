<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RequestValidatorHelper
{


    public static function ValidateFields(array $rules, Request $request)
    {
        $response = [];
        $messages = [
            'required' => 'Campo de caracter obrigatorio',
            'gender.in' => 'O atributo  deve ser "m" ou "f"',
            'date_format' => "Formato de data invalido. Formato esperado d-m-Y",
            'exists' => 'Nao foi encontrada uma correspondecia do dado no sistema.',
            'date_format' => "Formato de data invalido. Formato esperado d-m-Y",
            'between'=>'O atributo deve estar no intervalo de :min a :max'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails())

            $response= $validator->errors();

        return $response;

    }
}
