<?php

namespace App\Repositories;

use App\Models\News;
use App\Repositories\BaseRepository;

class NewsRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'title',
        'description',
        'image'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return News::class;
    }
}
