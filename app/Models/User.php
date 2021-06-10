<?php

namespace App\Models;

use App\Models\Model\Rating;
use App\Models\Model\MenuCategory;
use App\Models\Model\MenuItem;
use App\Models\Model\Restaurant;
use App\Models\Model\Cart;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable 

{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function restaurants()
    {
        return $this->hasMany(Restaurant::class);
    }

    public function menucategories()
    {
        return $this->hasMany(MenuCategory::class);
    }

    public function menuitems()
    {
        return $this->hasMany(MenuItem::class);
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }



    protected $fillable = [
        'first_name',
        'last_name',
        'password',
        'email',
        'gender',
        'date_of_birth',
        'mobile_number',
        'account_status',
        'created_at',
    
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];




     
    
}
