<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeliveryAddressRequest extends FormRequest
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
          
            'mobile_number' => 'required|digits:12|numeric|regex:/(201)[0-9]{9}/',
            'land_line' => 'required|digits:9|numeric|regex:/(0)[0-9]{8}/',
            'city' => 'required',
            'area' => 'required',
            'street_name' => 'required|max:1000',
            'address_title' => 'required|max:1000',
            'building_type' => 'required',
            // 'floor' => 'required',
            'building_number' => 'required',
            // 'appartment_office_number' => 'required',
            'additional_directions' => 'required|max:1000',
           
        ];
    }
}
