<?php

namespace App\Repositories;

use App\Models\Enquiry;
use App\Repositories\BaseRepository;

class EnquiryRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name',
        'email',
        'phone',
        'subject',
        'message'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Enquiry::class;
    }
}
