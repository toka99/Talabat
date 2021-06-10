<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Model\Restaurant;
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
    }

    protected $fillable = [
        
        'total_price' ,
        'customer_id'
        'restaurant_id',
        'created_at',
    ];
}
