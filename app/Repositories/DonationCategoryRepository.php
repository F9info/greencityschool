<?php

namespace App\Repositories;

use App\Models\DonationCategory;
use App\Repositories\BaseRepository;

class DonationCategoryRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'donation_cause'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return DonationCategory::class;
    }
}
