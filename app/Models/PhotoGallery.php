<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class PhotoGallery extends Model
{
    use Sortable;

    public $sortable = [
        'title',
    ];
    
    public $table = 'photo_galleries';

    public $fillable = [
        'photo_gallery_category_id',
        'title',
        'image',
        'image_url'
    ];

    protected $casts = [
        'photo_gallery_category_id' => 'integer',
        'title' => 'string',
        'image' => 'string',
        'image_url' => 'string'
    ];

    public static $rules = [
        'photo_gallery_category_id' => 'required',
        'title' => 'required',
        'image' => 'required',
        'image_url' => 'required'
    ];

    public static $update_rules = [
        'photo_gallery_category_id' => 'required',
        'title' => 'required'
    ];

    public function photoGalleryCategory(){
        return $this->belongsTo('App\Models\photoGalleryCategory', 'photo_gallery_category_id');
    }

    
}