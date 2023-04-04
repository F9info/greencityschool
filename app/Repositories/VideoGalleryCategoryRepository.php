<?php

namespace App\Repositories;

use App\Models\VideoGalleryCategory;
use App\Repositories\BaseRepository;

class VideoGalleryCategoryRepository extends BaseRepository
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
        return VideoGalleryCategory::class;
    }
}
