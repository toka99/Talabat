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
            'working_hours' => $this->working_hours,
            'minimum_order' => $this->minimum_order,
            'delivery_fees' => $this->delivery_fees,
            'first_name_vendor' => $this->first_name_vendor,
            'last_name_vendor' => $this->last_name_vendor,
            
        ];
    }
}
