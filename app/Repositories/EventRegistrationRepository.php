<?php

namespace App\Repositories;

use App\Models\EventRegistration;
use App\Repositories\BaseRepository;

class EventRegistrationRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'event_id',
        'user_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'state',
        'city',
        'zipcode',
        'adult_count',
        'child_count',
        'guest_adult_count',
        'guest_child_count',
        'total_amount',
        'additional_fields'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return EventRegistration::class;
    }
}
