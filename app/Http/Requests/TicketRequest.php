<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
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
            'title'=>'required',
            'description'=>'nullable',
            'price'=>'required|numeric',
            'qnt_by_person'=>'required|numeric',
            'qnt'=>'required|numeric',
            'start_date'=>'required|date',
            'end_date'=>'required|date|after_or_equal:start_date',
            'start_time'=>'required',
            'end_time'=>'required'
        ];
    }
}
