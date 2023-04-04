<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class CommitteeMember extends Model
{
    use Sortable;

    public $sortable = [
        'name',
        'created_at',
        'position',
    ];

    public $table = 'committee_members';

    public $fillable = [
        'name',
        'email',
        'phone',
        'gender',
        'member_type',
        'member_photo',
        'city',
        'state',
        'address',
        'description',
        'designation',
        'caf_designation'
    ];

    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'gender' => 'string',
        'member_type' => 'string',
        'member_photo' => 'string',
        'city' => 'string',
        'state' => 'string',
        'address' => 'string',
        'description' => 'string',
        'designation' => 'string',
        'caf_designation' => 'string',
    ];

    public static $rules = [
        'name' => 'required|unique:committee_members',
        'email' => 'required',
        'phone' => 'required',
        'member_photo' => 'required'
    ];

    public static $update_rules = [
        'name' => 'required',
        'email' => 'required',
        'phone' => 'required'
    ];

    public function activeList()
    {
        return $this->hasMany('App\Models\CommitteeMemberActiveList', 'committee_member_id');
    }
}