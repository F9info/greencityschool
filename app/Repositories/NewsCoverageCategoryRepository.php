<?php

namespace App\Repositories;

use App\Models\NewsCoverageCategory;
use App\Repositories\BaseRepository;

class NewsCoverageCategoryRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name',
        'year'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return NewsCoverageCategory::class;
    }
}
