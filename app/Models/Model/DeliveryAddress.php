<?php

namespace App\Models\Model;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryAddress extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }



    protected $fillable = [
        'mobile_number',
        'land_line',
        'city',
        'area',
        'street_name',
        'address_title',
        'building_type',
        'floor',
        'building_number',
        'appartment_office_number',
        'additional_directions',
        'created_at',
    ];

}
