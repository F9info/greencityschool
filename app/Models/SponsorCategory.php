<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class SponsorCategory extends Model
{
    use Sortable;

    public $sortable = [
        'category_name',
    ];

    public $table = 'sponsor_categories';

    public $fillable = [
        'category_name'
    ];

    protected $casts = [
        'category_name' => 'string'
    ];

    public static $rules = [
        'category_name' => 'required|unique:sponsor_categories'
    ];

    public static $update_rules = [
        'category_name' => 'required'
    ];

    public function sponsors(){
        return $this->hasMany('App\Models\Sponsor');
    }

    
}
