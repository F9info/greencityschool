<?php

namespace App\Repositories;

use App\Models\PersonalDetails;
use App\Repositories\BaseRepository;

class PersonalDetailsRepository extends BaseRepository
{
    protected $fieldSearchable = [
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

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return PersonalDetails::class;
    }
}
