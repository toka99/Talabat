<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RatingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'order_packaging_score' => $this->order_packaging_score,
            'delivery_time_score' => $this->delivery_time_score,
            'value_for_money_score' => $this->value_for_money_score,
            'quality_of_food_score' => $this->quality_of_food_score,
            'driver_performance_score' => $this->driver_performance_score,
            'overall_score' => $this->overall_score,
            'review' => $this->review,

        ];
    }
}

