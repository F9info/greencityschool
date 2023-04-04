<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class VideoGallery extends Model
{
    use Sortable;

    public $sortable = [
        'title',
        'position',
    ];

    public $table = 'video_galleries';

    public $fillable = [
        'video_gallery_category_id',
        'title',
        'video_url',
        'description'
    ];

    protected $casts = [
        'video_gallery_category_id' => 'integer',
        'title' => 'string',
        'video_url' => 'string',
        'description' => 'string'
    ];

    public static $rules = [
        'video_gallery_category_id' => 'required',
        'title' => 'required',
        'video_url' => 'required'
    ];

    public static $update_rules = [
        'video_gallery_category_id' => 'required',
        'title' => 'required',
        'video_url' => 'required'
    ];

    public function videoGalleryCategory(){
        return $this->belongsTo('App\Models\videoGalleryCategory', 'video_gallery_category_id');
    }

    
}
