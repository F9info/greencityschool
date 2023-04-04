<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateVideoGalleryCategoryAPIRequest;
use App\Http\Requests\API\UpdateVideoGalleryCategoryAPIRequest;
use App\Models\VideoGalleryCategory;
use App\Repositories\VideoGalleryCategoryRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class VideoGalleryCategoryAPIController
 */
class VideoGalleryCategoryAPIController extends AppBaseController
{
    private VideoGalleryCategoryRepository $videoGalleryCategoryRepository;

    public function __construct(VideoGalleryCategoryRepository $videoGalleryCategoryRepo)
    {
        $this->videoGalleryCategoryRepository = $videoGalleryCategoryRepo;
    }

    /**
     * Display a listing of the VideoGalleryCategories.
     * GET|HEAD /video-gallery-categories
     */
    public function index(Request $request): JsonResponse
    {
        $videoGalleryCategories = $this->videoGalleryCategoryRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($videoGalleryCategories->toArray(), 'Video Gallery Categories retrieved successfully');
    }

    /**
     * Store a newly created VideoGalleryCategory in storage.
     * POST /video-gallery-categories
     */
    public function store(CreateVideoGalleryCategoryAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $videoGalleryCategory = $this->videoGalleryCategoryRepository->create($input);

        return $this->sendResponse($videoGalleryCategory->toArray(), 'Video Gallery Category added successfully');
    }

    /**
     * Display the specified VideoGalleryCategory.
     * GET|HEAD /video-gallery-categories/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var VideoGalleryCategory $videoGalleryCategory */
        $videoGalleryCategory = $this->videoGalleryCategoryRepository->find($id);

        if (empty($videoGalleryCategory)) {
            return $this->sendError('Video Gallery Category not found');
        }

        return $this->sendResponse($videoGalleryCategory->toArray(), 'Video Gallery Category retrieved successfully');
    }

    /**
     * Update the specified VideoGalleryCategory in storage.
     * PUT/PATCH /video-gallery-categories/{id}
     */
    public function update($id, UpdateVideoGalleryCategoryAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var VideoGalleryCategory $videoGalleryCategory */
        $videoGalleryCategory = $this->videoGalleryCategoryRepository->find($id);

        if (empty($videoGalleryCategory)) {
            return $this->sendError('Video Gallery Category not found');
        }

        $videoGalleryCategory = $this->videoGalleryCategoryRepository->update($input, $id);

        return $this->sendResponse($videoGalleryCategory->toArray(), 'VideoGalleryCategory updated successfully');
    }

    /**
     * Remove the specified VideoGalleryCategory from storage.
     * DELETE /video-gallery-categories/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var VideoGalleryCategory $videoGalleryCategory */
        $videoGalleryCategory = $this->videoGalleryCategoryRepository->find($id);

        if (empty($videoGalleryCategory)) {
            return $this->sendError('Video Gallery Category not found');
        }

        $videoGalleryCategory->delete();

        return $this->sendSuccess('Video Gallery Category deleted successfully');
    }
}
