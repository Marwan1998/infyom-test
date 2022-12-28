<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Secret
 * @package App\Models
 * @version December 28, 2022, 12:31 pm UTC
 *
 * @property string $title
 * @property string $content
 * @property integer $user_id
 */
class Secret extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'secrets';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'content',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'content' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required'
    ];

    
}
