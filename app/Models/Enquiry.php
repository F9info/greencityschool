<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    public $table = 'enquiries';

    public $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message'
    ];

    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'subject' => 'string',
        'message' => 'string'
    ];

    public static $rules = [
        'name' => 'required',
        'email' => 'required',
        'phone' => 'required',
        'subject' => 'required',
        'message' => 'required'
    ];

    
}
