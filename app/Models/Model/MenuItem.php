<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Model\MenuCategory;
use App\Models\User;



class MenuItem extends Model
{
    use HasFactory;

    public function menucategory()
    {
        return $this->belongsTo(MenuCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }



    protected $fillable = [
        
        'vendor_id',
        'menucategory_id',
        'name',
        'description',
        'logo',
        'price',
        'created_at',
    ];
}
