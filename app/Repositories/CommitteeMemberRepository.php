<?php

namespace App\Repositories;

use App\Models\CommitteeMember;
use App\Repositories\BaseRepository;

class CommitteeMemberRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name',
        'email',
        'phone',
        'gender',
        'member_type',
        'member_photo',
        'city',
        'state',
        'address',
        'description'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return CommitteeMember::class;
    }
}
