<?php

namespace App\Http\Resources\Cart;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Model\Restaurant; 

class CartResource extends JsonResource
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
            'sub_total' => $this->sub_total,
            'delivery_fees' => Restaurant::find($this->restaurant_id)->delivery_fees ,
            'total_price' => $this->total_price,
            'href' => [
                       'cartitems' => url("api/restaurants/{$this->restaurant_id}/carts/{$this->id}/cartitems")
    
                ]
        ];
    }
}
