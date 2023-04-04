<?php

namespace App\Repositories;

use App\Models\MailTemplates;
use App\Repositories\BaseRepository;

class MailTemplatesRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'heading',
        'subject',
        'mail_type',
        'description'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return MailTemplates::class;
    }
}
