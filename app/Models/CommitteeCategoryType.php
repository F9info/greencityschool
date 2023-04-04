<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class CommitteeCategoryType extends Model
{
    use Sortable;

    public $sortable = [
        'type',
    ];
    public $table = 'committee_category_types';

    public $fillable = [
        'type'
    ];

    protected $casts = [
        'type' => 'string'
    ];

    public static $rules = [
        'type' => 'required|unique:committee_category_types'
    ];

    public static $update_rules = [
        'type' => 'required'
    ];

    public function committeeCategories()
    {
        return $this->hasMany('App\Models\CommitteeCategory');
    }
}
