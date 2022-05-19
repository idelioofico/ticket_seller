<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'image'=>'required|file',
            'event_type_id'=>'required',
            'topic_id'=>'required',

            'start_date'=>'required|date',
            'end_date'=>'required|date',

            'province_id'=>'required',
            'city'=>'required',
            'address'=>'required',

            'producer'=>'nullable',

        ];
    }
}
