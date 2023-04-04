<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class CommitteeCategory extends Model
{
    use Sortable;

    public $sortable = [
        'name',
    ];

    protected $guard_name = 'admin';

    public $table = 'committee_categories';

    public $fillable = [
        'name',
        'committee_category_type_id'
    ];

    protected $casts = [
        'name' => 'string',
        'committee_category_type_id' => 'integer'
    ];

    public static $rules = [
        'name' => 'required|unique:committee_categories',
        'committee_category_type_id' => 'required'
    ];

    public static $update_rules = [
        'name' => 'required',
        'committee_category_type_id' => 'required'
    ];

    public function committeeCategoryType()
    {
        return $this->belongsTo('App\Models\committeeCategoryType', 'committee_category_type_id');
    }

    public function committeeMembers(){
        return $this->hasMany('App\Models\CommitteeMemberActiveList');
    }
}
