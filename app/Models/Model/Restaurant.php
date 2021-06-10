<?php

namespace App\Models\Model;

use App\Models\Model\Rating;
use App\Models\Model\MenuCategory;
use App\Models\Model\MenuItem;
use App\Models\Model\CartItem;
use App\Models\Model\Cart;
use App\Models\User;
use App\Models\Cusine;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function menucategories()
    {
        return $this->hasMany(MenuCategory::class);
    }

    public function menuitems()
    {
        return $this->hasMany(MenuItem::class);
    }

    public function cusine()
    {
        return $this->belongsTo(Cusine::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function cartitems()
    {
        return $this->hasMany(CartItem::class);
    }



    
    protected $fillable = [
        
        'vendor_id',
        'cusine_id',
        'name',
        'description',
        'logo',
        'location',
        'location_latitude',
        'location_longitude',
        'working_hours',
        'minimum_order',
        'delivery_fees',
        'created_at',
    
    ];

  
}
