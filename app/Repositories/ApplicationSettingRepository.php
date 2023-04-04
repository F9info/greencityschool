<?php

namespace App\Repositories;

use App\Models\ApplicationSetting;
use App\Repositories\BaseRepository;

class ApplicationSettingRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'field_name',
        'slug',
        'input_type',
        'value'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return ApplicationSetting::class;
    }
}
