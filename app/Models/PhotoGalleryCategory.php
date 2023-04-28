<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class PhotoGalleryCategory extends Model
{
    use Sortable;

    public $sortable = [
        'name',
        'year',
        'created_at',
    ];

    public $table = 'photo_gallery_categories';

    public $fillable = [
        'name',
        'year'
    ];

    protected $casts = [
        'name' => 'string',
        'year' => 'integer'
    ];

    public static $rules = [
        'name' => 'required|unique:photo_gallery_categories',
     
    ];

    public static $update_rules = [
        'name' => 'required',
   
    ];

    public function photoGalleries()
    {
        return $this->hasMany('App\Models\PhotoGallery');
    }

    public function activePhotoGalleries()
    {
        return $this->photoGalleries()->where('publish', 1)->orderBy('position', 'asc');
    }
}
