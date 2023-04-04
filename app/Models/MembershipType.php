<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class MembershipType extends Model
{

    use Sortable;

    public $sortable = [
        'membership_name',
        'price',
    ];

    public $table = 'membership_types';

    public $fillable = [
        'membership_name',
        'price',
        'months',
        'expiry_date',
        'validity_type'
    ];

    protected $casts = [
        'membership_name' => 'string',
        'price' => 'double',
        'months' => 'integer',
        'expiry_date' => 'date',
        'validity_type' => 'string'
    ];

    public static $rules = [
        'membership_name' => 'required',
        'price' => 'required',
        'validity_type' => 'required'
    ];

    public function personalDetails()
    {
        return $this->hasMany('App\Models\PersonalDetails');
    }

    public function currentYearMembers()
    {
        return $this->personalDetails()->whereYear('created_at', '=', now()->year);
    }

    public function monthYearWiseMembers($month, $year)
    {
        return $this->personalDetails()->whereMonth('created_at', $month)->whereYear('created_at', '=', $year);
    }
}
