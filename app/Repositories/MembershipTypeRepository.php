<?php

namespace App\Repositories;

use App\Models\MembershipType;
use App\Repositories\BaseRepository;

class MembershipTypeRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'membership_name',
        'price',
        'months',
        'expiry_date'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return MembershipType::class;
    }
}
