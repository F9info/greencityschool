<?php

namespace App\Repositories;

use App\Models\EventCategory;
use App\Repositories\BaseRepository;

class EventCategoryRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return EventCategory::class;
    }
}
