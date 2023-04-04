<?php

namespace App\Repositories;

use App\Models\CommitteeCategoryType;
use App\Repositories\BaseRepository;

class CommitteeCategoryTypeRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'type'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return CommitteeCategoryType::class;
    }
}
