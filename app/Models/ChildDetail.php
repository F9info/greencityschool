<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildDetail extends Model
{
    use HasFactory;
    public $table = 'child_details';

    public $fillable = [
        'user_id',
        'child_name',
        'age',
        'gender',
        'date_of_birth'
    ];
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
