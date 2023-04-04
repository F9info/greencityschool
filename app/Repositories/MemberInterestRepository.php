<?php

namespace App\Repositories;

use App\Models\MemberInterest;
use App\Repositories\BaseRepository;

class MemberInterestRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'interests'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return MemberInterest::class;
    }
}
