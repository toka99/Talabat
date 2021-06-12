<?php

namespace App\Http\Resources\Cart;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Model\MenuItem; 

class CartItemResource extends JsonResource
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
            
            'menu_item_name' => MenuItem::find($this->menu_item_id)->name,
            'restaurant_id' => $this->restaurant_id,
            'cart_id' => $this->cart_id, 
            'price' => $this->price, 
            'quantity' => $this->quantity,
        ];
    }
}
