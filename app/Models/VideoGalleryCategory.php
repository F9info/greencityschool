<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class VideoGalleryCategory extends Model
{
    use Sortable;

    public $sortable = [
        'name',
        'year',
        'created_at',
    ];
    public $table = 'video_gallery_categories';

    public $fillable = [
        'name',
        'year'
    ];

    protected $casts = [
        'name' => 'string',
        'year' => 'integer'
    ];

    public static $rules = [
        'name' => 'required|unique:video_gallery_categories',
      
    ];

    public static $update_rules = [
        'name' => 'required',
     
    ];

    public function videoGalleries(){
        return $this->hasMany('App\Models\VideoGallery');
    }

    public function activeVideoGalleries() {
        return $this->videoGalleries()->where('publish', 1)->orderBy('position', 'asc');
    }

    
}
