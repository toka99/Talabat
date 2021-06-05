<?php

namespace App\Http\Resources\Menu;

use Illuminate\Http\Resources\Json\JsonResource;

class MenuCategoryResource extends JsonResource
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
            'vendor_id' => $this->vendor_id,
            'restaurant_id' => $this->restaurant_id,
            'name' => $this->name,
            'href' => [
                'menuitems' => route('menuitems.index',[$this->restaurant_id,$this->id])
            ]
            
        ];
    }
}
