<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApiDeliveryAddressRequest extends FormRequest
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
            'delivery_area' => 'required|string',
            'complete_address' => 'required|string',
            'contact_no' => 'required|numeric|digits:10',
            'delivery_instructions' => 'string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'nickname' => 'required|string'
        ];
    }
}
