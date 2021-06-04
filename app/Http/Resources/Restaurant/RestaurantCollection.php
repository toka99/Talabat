<?php

namespace App\Http\Resources\Restaurant;

use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'logo' => $this->logo,
            'location' => $this->location,
            'working_hours' => $this->working_hours,
            'minimum_order' => $this->minimum_order,
            'delivery_fees' => $this->delivery_fees,
            'vendor_id' => $this->vendor_id,
            'ratings' => $this->ratings->count() > 0 ? round($this->ratings->sum('overall_score')/
               $this->ratings->count(),0) : 'There are currently no reviews available for this restaurant',

            'href' => [
                'link' => route('restaurants.show',$this->id)
            ]

        ];
    }
}
