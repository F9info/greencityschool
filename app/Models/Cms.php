<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Cms extends Model
{
    use Sortable;

    public $sortable = [
        'title',
        'parent',
    ];
    public $table = 'cms';

    public $fillable = [
        'title',
        'slug',
        'parent',
        'custom_url',
        'banner_image',
        'banner_title',
        'banner_tagline',
        'short_description',
        'content',
        'gallery',
        'main_menu',
        'top_menu',
        'side_menu',
        'footer_menu',
        'seo_title',
        'seo_keywords',
        'seo_description',
        'type'
    ];

    protected $casts = [
        'title' => 'string',
        'slug' => 'string',
        'parent' => 'string',
        'custom_url' => 'string',
        'banner_image' => 'string',
        'banner_title' => 'string',
        'banner_tagline' => 'string',
        'short_description' => 'string',
        'content' => 'string',
        'gallery' => 'array',
        'seo_title' => 'string',
        'seo_keywords' => 'string',
        'seo_description' => 'string',
        'type' => 'string',
    ];

    public static $rules = [
        'title' => 'required|unique:cms',
        'slug' => 'required|unique:cms',
        'parent' => 'required'
    ];

    public static $update_rules = [
        'title' => 'required',
        'slug' => 'required',
        'parent' => 'required'
    ];


    public function parentName()
    {
        return $this->belongsTo('App\Models\Cms', 'parent');
    }

    public function subMenu()
    {
        return $this->hasMany('App\Models\Cms', 'parent')->where('publish', 1);
    }
}
