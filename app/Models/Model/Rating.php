<?php

namespace App\Models\Model;
use App\Models\Model\Restaurant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


     
    protected $fillable = [
        
        'restaurant_id',
        'user_id',
        'order_packaging_score',
        'delivery_time_score',
        'value_for_money_score',
        'quality_of_food_score',
        'driver_performance_score',
        'overall_score',
        'review',
        'created_at',
    
    ];
}
