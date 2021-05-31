<?php

namespace App\Models\Model;
use App\Models\Model\Restaurant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    public function restaurants()
    {
        return $this->hasMany(Restaurant::class);
    }
}




