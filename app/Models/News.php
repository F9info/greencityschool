<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class News extends Model
{
    use Sortable;

    public $sortable = [
        'title',
        'created_at',
        'description',
    ];

    public $table = 'news';

    public $fillable = [
        'title',
        'description',
        'image'
    ];

    protected $casts = [
        'title' => 'string',
        'description' => 'string',
        'image' => 'string'
    ];

    public static $rules = [
        'title' => 'required|unique:news',
        'description' => 'required',
        'image' => 'required'
    ];

    public static $update_rules = [
        'title' => 'required',
        'description' => 'required'
    ];
}
