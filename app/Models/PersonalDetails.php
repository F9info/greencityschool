<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class PersonalDetails extends Model
{
    use Sortable;

    public $sortable = [
        'user_id',
        'created_at',
    ];

    public $table = 'personal_details';

    public $fillable = [
        'user_id',
        'gender',
        'date_of_birth',
        'wedding_anniversary',
        'address',
        'state',
        'city',
        'zipcode',
        'native_state',
        'native_district',
        'native_city',
        'spouse_first_name',
        'spouse_last_name',
        'spouse_gender',
        'spouse_date_of_birth',
        'spouse_native_state',
        'spouse_native_district',
        'spouse_native_city',
        'member_interests',
        'spouse_interests',
        'child_interests',
        'membership_type_id'
    ];

    protected $casts = [
        'user_id' => 'integer',
        'gender' => 'string',
        'date_of_birth' => 'date',
        'wedding_anniversary' => 'date',
        'address' => 'string',
        'state' => 'string',
        'city' => 'string',
        'zipcode' => 'string',
        'native_state' => 'string',
        'native_district' => 'string',
        'native_city' => 'string',
        'spouse_first_name' => 'string',
        'spouse_last_name' => 'string',
        'spouse_gender' => 'string',
        'spouse_date_of_birth' => 'date',
        'spouse_native_state' => 'string',
        'spouse_native_district' => 'string',
        'spouse_native_city' => 'string',
        'member_interests' => 'string',
        'spouse_interests' => 'string',
        'child_interests' => 'string',
        'membership_type_id' => 'integer'
    ];

    public static $rules = [
        'address' => 'required',
        'state' => 'required',
        'city' => 'required',
        'zipcode' => 'required'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function membershipType()
    {
        return $this->belongsTo('App\Models\MembershipType');
    }
}
