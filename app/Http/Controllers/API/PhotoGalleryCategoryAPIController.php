<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePhotoGalleryCategoryAPIRequest;
use App\Http\Requests\API\UpdatePhotoGalleryCategoryAPIRequest;
use App\Models\PhotoGalleryCategory;
use App\Repositories\PhotoGalleryCategoryRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class PhotoGalleryCategoryAPIController
 */
class PhotoGalleryCategoryAPIController extends AppBaseController
{
    private PhotoGalleryCategoryRepository $photoGalleryCategoryRepository;

    public function __construct(PhotoGalleryCategoryRepository $photoGalleryCategoryRepo)
    {
        $this->photoGalleryCategoryRepository = $photoGalleryCategoryRepo;
    }

    /**
     * Display a listing of the PhotoGalleryCategories.
     * GET|HEAD /photo-gallery-categories
     */
    public function index(Request $request): JsonResponse
    {
        $photoGalleryCategories = $this->photoGalleryCategoryRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($photoGalleryCategories->toArray(), 'Photo Gallery Categories retrieved successfully');
    }

    /**
     * Store a newly created PhotoGalleryCategory in storage.
     * POST /photo-gallery-categories
     */
    public function store(CreatePhotoGalleryCategoryAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $photoGalleryCategory = $this->photoGalleryCategoryRepository->create($input);

        return $this->sendResponse($photoGalleryCategory->toArray(), 'Photo Gallery Category added successfully');
    }

    /**
     * Display the specified PhotoGalleryCategory.
     * GET|HEAD /photo-gallery-categories/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var PhotoGalleryCategory $photoGalleryCategory */
        $photoGalleryCategory = $this->photoGalleryCategoryRepository->find($id);

        if (empty($photoGalleryCategory)) {
            return $this->sendError('Photo Gallery Category not found');
        }

        return $this->sendResponse($photoGalleryCategory->toArray(), 'Photo Gallery Category retrieved successfully');
    }

    /**
     * Update the specified PhotoGalleryCategory in storage.
     * PUT/PATCH /photo-gallery-categories/{id}
     */
    public function update($id, UpdatePhotoGalleryCategoryAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var PhotoGalleryCategory $photoGalleryCategory */
        $photoGalleryCategory = $this->photoGalleryCategoryRepository->find($id);

        if (empty($photoGalleryCategory)) {
            return $this->sendError('Photo Gallery Category not found');
        }

        $photoGalleryCategory = $this->photoGalleryCategoryRepository->update($input, $id);

        return $this->sendResponse($photoGalleryCategory->toArray(), 'PhotoGalleryCategory updated successfully');
    }

    /**
     * Remove the specified PhotoGalleryCategory from storage.
     * DELETE /photo-gallery-categories/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var PhotoGalleryCategory $photoGalleryCategory */
        $photoGalleryCategory = $this->photoGalleryCategoryRepository->find($id);

        if (empty($photoGalleryCategory)) {
            return $this->sendError('Photo Gallery Category not found');
        }

        $photoGalleryCategory->delete();

        return $this->sendSuccess('Photo Gallery Category deleted successfully');
    }
}
