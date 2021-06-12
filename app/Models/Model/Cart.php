<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Model\Restaurant;
use App\Models\Model\CartItem;
use App\Models\User;

class Cart extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function cartitems()
    {
        return $this->hasMany(CartItem::class);
        
        // return $this->hasMany(CartItem::class, 'cart_id')
        //     ->join('carts as c', 'id', '=', 'c.id')
        //     ->groupBy('id')
        //     ->selectRaw('price,IFNULL(SUM(products.price*cart_products.quantity), 0) as cart_price');
        
    }

    protected $fillable = [
        
        'total_price' ,
        'user_id',
        'restaurant_id',
        'created_at',
    ];
}
