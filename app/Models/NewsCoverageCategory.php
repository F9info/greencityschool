<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class NewsCoverageCategory extends Model
{

    use Sortable;

    public $sortable = [
        'name',
        'year',
    ];

    public $table = 'news_coverage_categories';

    public $fillable = [
        'name',
        'year'
    ];

    protected $casts = [
        'name' => 'string',
        'year' => 'integer'
    ];

    public static $rules = [
        'name' => 'required|unique:news_coverage_categories',
        'year' => 'required|unique:news_coverage_categories'
    ];

    public static $update_rules = [
        'name' => 'required',
        'year' => 'required'
    ];

    public function newsCoverages()
    {
        return $this->hasMany('App\Models\NewsCoverage');
    }

    public function activeNewsCoverages()
    {
        return $this->newsCoverages()->where('publish', 1)->orderBy('position', 'asc');
    }
}
