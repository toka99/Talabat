<?php

namespace App\Http\Resources\Menu;

use Illuminate\Http\Resources\Json\JsonResource;

class MenuItemResource extends JsonResource
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
            'menu_category_id' => $this->menu_category_id,
            'restaurant_id' => $this->restaurant_id,
            'name' => $this->name,
            'description' => $this->description,
            'logo' => $this->logo,
            'price' => $this->price,
        ];
    }
}
