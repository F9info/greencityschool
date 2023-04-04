<?php

namespace App\Repositories;

use App\Models\NewsCoverage;
use App\Repositories\BaseRepository;

class NewsCoverageRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'news_coverage_category_id',
        'title',
        'news_url'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return NewsCoverage::class;
    }
}
