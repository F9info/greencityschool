<?php

namespace App\Repositories;

use App\Models\VideoGallery;
use App\Repositories\BaseRepository;

class VideoGalleryRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'video_gallery_category_id',
        'title',
        'video_url',
        'description',
        'status'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return VideoGallery::class;
    }
}
