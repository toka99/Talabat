<?php

namespace App\Http\Resources\Restaurant;


use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'logo' => $this->logo,
            'location' => $this->location,
            'location_latitude' => $this->location_latitude,
            'location_longitude' => $this->location_longitude,
            'working_hours' => $this->working_hours,
            'minimum_order' => $this->minimum_order,
            'vendor_id' => $this->vendor_id,
            'delivery_fees' => $this->delivery_fees,
            'cusine_id' => $this->cusine_id,
            'ratings' => $this->ratings->count() > 0 ? round($this->ratings->sum('overall_score')/
               $this->ratings->count(),0) : 'There are currently no reviews available for this restaurant',

            'href' => [
            //     'ratings' => route('ratings.index',$this->id)
                   'ratings' => url("api/restaurants/{$this->id}/ratings")

            ]
                   
            
        ];
    }
}
