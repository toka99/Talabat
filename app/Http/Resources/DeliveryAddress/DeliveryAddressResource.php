<?php

namespace App\Http\Resources\DeliveryAddress;

use Illuminate\Http\Resources\Json\JsonResource;

class DeliveryAddressResource extends JsonResource
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
            'user_id' => $this->user_id,
            'mobile_number' => $this->mobile_number,
            'land_line' => $this->land_line,
            'city' => $this->city,
            'area' => $this->area,
            'street_name' => $this->street_name,
            'address_title' => $this->address_title,
            'building_type' => $this->building_type,
            'floor' => $this->floor,
            'building_number' => $this->building_number,
            'appartment_office_number' => $this->appartment_office_number,
            'additional_directions' => $this->additional_directions,
        ];
    }
}
