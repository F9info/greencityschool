<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class NewsCoverage extends Model
{

    use Sortable;

    public $sortable = [
        'title',
    ];

    public $table = 'news_coverages';

    public $fillable = [
        'news_coverage_category_id',
        'title',
        'news_url'
    ];

    protected $casts = [
        'news_coverage_category_id' => 'integer',
        'title' => 'string',
        'news_url' => 'string'
    ];

    public static $rules = [
        'news_coverage_category_id' => 'required',
        'title' => 'required|unique:news_coverages',
        'news_url' => 'required'
    ];

    public static $update_rules = [
        'news_coverage_category_id' => 'required',
        'title' => 'required',
        'news_url' => 'required'
    ];


    public function newsCoverageCategory()
    {
        return $this->belongsTo('App\Models\NewsCoverageCategory', 'news_coverage_category_id');
    }
}
