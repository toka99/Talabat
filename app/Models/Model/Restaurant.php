<?php

namespace App\Models\Model;

use App\Models\Model\Rating;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
