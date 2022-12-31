<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Game
 * @package App\Models
 * @version December 31, 2022, 7:18 pm UTC
 *
 * @property string $name
 * @property string $company
 * @property string $story
 * @property number $price
 * @property integer $year
 */
class Game extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'games';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'company',
        'story',
        'price',
        'year'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'company' => 'string',
        'story' => 'string',
        'price' => 'double',
        'year' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'price' => 'min:1.0'
    ];

    
}
