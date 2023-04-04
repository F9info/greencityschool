<?php

namespace App\Repositories;

use App\Models\PhotoGallery;
use App\Repositories\BaseRepository;

class PhotoGalleryRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'photo_gallery_category_id',
        'title',
        'image',
        'image_url',
        'status'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return PhotoGallery::class;
    }
}
