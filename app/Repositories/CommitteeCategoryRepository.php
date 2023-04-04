<?php

namespace App\Repositories;

use App\Models\CommitteeCategory;
use App\Repositories\BaseRepository;

class CommitteeCategoryRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name',
        'committee_category_type_id'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return CommitteeCategory::class;
    }
}
