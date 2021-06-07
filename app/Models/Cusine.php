<?php

namespace App\Models;

use Eloquent as Model;
use App\Models\Model\Restaurant;
// use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Cusine
 * @package App\Models
 * @version June 6, 2021, 6:04 pm UTC
 *
 * @property string $name
 */
class Cusine extends Model
{
    // use SoftDeletes;

    use HasFactory;

    public function restaurants()
    {
        return $this->hasMany(Restaurant::class);
    }




    public $table = 'cusines';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    
}
