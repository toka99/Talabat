<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RatingRequest extends FormRequest
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
            'order_packaging_score' => 'required|integer|min:0|max:5',
            'delivery_time_score' => 'required|integer|min:0|max:5',
            'value_for_money_score' => 'required|integer|min:0|max:5',
            'quality_of_food_score' => 'required|integer|min:0|max:5',
            'driver_performance_score' => 'required|integer|min:0|max:5',
            'overall_score' => 'required|integer|min:0|max:5',
            'review' => 'required|max:1000',
           
        ];
    }
}

