<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Model\Restaurant;
use App\Models\Model\Cart;
use App\Models\Model\MenuItem;

class CartItem extends Model
{
    use HasFactory;

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function menuitem()
    {
        return $this->belongsTo(MenuItem::class);
    }

    protected $fillable = [
        
        'menu_item_id',
        'restaurant_id',
        'cart_id',
        'quantity',
        'logo',
        'price',
        'created_at',
    ];
}
