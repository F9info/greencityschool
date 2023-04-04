<?php

namespace App\Repositories;

use App\Models\PhotoGalleryCategory;
use App\Repositories\BaseRepository;

class PhotoGalleryCategoryRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name',
        'year'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return PhotoGalleryCategory::class;
    }
}
