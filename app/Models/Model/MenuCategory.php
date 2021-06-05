<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Model\Restaurant;
use App\Models\Model\MenuItem;
use App\Models\User;


class MenuCategory extends Model
{
    use HasFactory;

    public function menuitems()
    {
        return $this->hasMany(MenuItem::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }



    protected $fillable = [
        
        'vendor_id' ,
        'restaurant_id',
        'name',
        'created_at',
    ];


}
