<?php

namespace App\Repositories;

use App\Models\SponsorCategory;
use App\Repositories\BaseRepository;

class SponsorCategoryRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'category_name'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return SponsorCategory::class;
    }
}
