<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequestEvent extends FormRequest
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
            'event_name' => 'required',
            'event_from' => 'required',
            'event_to' => 'required',
            'monday' => 'nullable',
            'tuesday' => 'nullable',
            'wednesday' => 'nullable',
            'thursday' => 'nullable',
            'friday' => 'nullable',
            'saturday' => 'nullable',
            'sunday' => 'nullable',
        ];
    }
}
