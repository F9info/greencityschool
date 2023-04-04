<?php

namespace App\Repositories;

use App\Models\Donation;
use App\Repositories\BaseRepository;

class DonationRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'donation_amount',
        'first_name',
        'last_name',
        'email',
        'address',
        'user_id',
        'donation_category_id'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Donation::class;
    }
}
