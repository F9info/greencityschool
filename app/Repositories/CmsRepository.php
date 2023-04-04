<?php

namespace App\Repositories;

use App\Models\Cms;
use App\Repositories\BaseRepository;

class CmsRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'title',
        'slug',
        'parent',
        'custom_url',
        'banner_image',
        'banner_title',
        'banner_tagline',
        'short_description',
        'content',
        'gallery',
        'seo_title',
        'seo_keywords',
        'seo_description'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Cms::class;
    }
}
