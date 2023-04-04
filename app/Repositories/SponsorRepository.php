<?php

namespace App\Repositories;

use App\Models\Sponsor;
use App\Repositories\BaseRepository;

class SponsorRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'sponsor_category_id',
        'title',
        'image',
        'url'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Sponsor::class;
    }
}
