<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantUpadateRequest extends FormRequest
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
            'name' => 'required|max:255',
            'description' => 'required|max:1000',
            'logo' => 'required',
            'location' => 'required',
            'working_hours' => 'required|numeric|min:5|max:24',
            'minimum_order' => 'required|numeric|min:0',
            'delivery_fees' => 'required|numeric|min:0',
           
        ];
    }
}
