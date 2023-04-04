<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class MemberInterest extends Model
{
    use Sortable;

    public $sortable = [
        'interests',
    ];

    public $table = 'member_interests';

    public $fillable = [
        'interests'
    ];

    protected $casts = [
        'interests' => 'string'
    ];

    public static $rules = [
        'interests' => 'required'
    ];

    
}
