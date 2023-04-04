<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Slider extends Model
{
    use Sortable;

    public $sortable = [
        'title',
        'tagline',
    ];

    public $table = 'sliders';

    public $fillable = [
        'image',
        'title',
        'tagline',
        'button_name',
        'button_url'
    ];

    protected $casts = [
        'image' => 'string',
        'title' => 'string',
        'tagline' => 'string',
        'button_name' => 'string',
        'button_url' => 'string'
    ];

    public static $rules = [
        'image' => 'required'
    ];

    
}
