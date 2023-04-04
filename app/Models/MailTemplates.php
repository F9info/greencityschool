<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MailTemplates extends Model
{
    public $table = 'mail_templates';

    public $fillable = [
        'heading',
        'subject',
        'mail_type',
        'description'
    ];

    protected $casts = [
        'heading' => 'string',
        'subject' => 'string',
        'mail_type' => 'string',
        'description' => 'string'
    ];

    public static $rules = [
        'heading' => 'required',
        'subject' => 'required',
        'mail_type' => 'required',
        'description' => 'required'
    ];

    
}
