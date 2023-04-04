<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Sponsor extends Model
{
    use Sortable;

    public $sortable = [
        'title',
    ];

    public $table = 'sponsors';

    public $fillable = [
        'sponsor_category_id',
        'title',
        'image',
        'url'
    ];

    protected $casts = [
        'sponsor_category_id' => 'integer',
        'title' => 'string',
        'image' => 'string',
        'url' => 'string'
    ];

    public static $rules = [
        'sponsor_category_id' => 'required',
        'title' => 'required|unique:sponsors',
        'image' => 'required',
        'url' => 'required'
    ];

    public static $update_rules = [
        'sponsor_category_id' => 'required',
        'title' => 'required',
        'url' => 'required'
    ];

    public function sponsorCategory(){
        return $this->belongsTo('App\Models\SponsorCategory', 'sponsor_category_id');
    }

    
}
