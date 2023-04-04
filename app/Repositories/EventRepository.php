<?php

namespace App\Repositories;

use App\Models\Event;
use App\Repositories\BaseRepository;

class EventRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'event_name',
        'event_category_id',
        'start_date',
        'end_date',
        'location',
        'city',
        'state',
        'zipcode',
        'contact_email',
        'image',
        'additional_fields',
        'reg_start_date',
        'reg_end_date',
        'guest_adult_amount',
        'guest_child_amount',
        'adult_amount',
        'child_amount',
        'event_description',
        'registration_note',
        'page_title',
        'meta_description',
        'meta_keywords',
        'top_line'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Event::class;
    }
}
