<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePhotoGalleryAPIRequest;
use App\Http\Requests\API\UpdatePhotoGalleryAPIRequest;
use App\Models\PhotoGallery;
use App\Repositories\PhotoGalleryRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class PhotoGalleryAPIController
 */
class PhotoGalleryAPIController extends AppBaseController
{
    private PhotoGalleryRepository $photoGalleryRepository;

    public function __construct(PhotoGalleryRepository $photoGalleryRepo)
    {
        $this->photoGalleryRepository = $photoGalleryRepo;
    }

    /**
     * Display a listing of the PhotoGalleries.
     * GET|HEAD /photo-galleries
     */
    public function index(Request $request): JsonResponse
    {
        $photoGalleries = $this->photoGalleryRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($photoGalleries->toArray(), 'Photo Galleries retrieved successfully');
    }

    /**
     * Store a newly created PhotoGallery in storage.
     * POST /photo-galleries
     */
    public function store(CreatePhotoGalleryAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $photoGallery = $this->photoGalleryRepository->create($input);

        return $this->sendResponse($photoGallery->toArray(), 'Photo Gallery added successfully');
    }

    /**
     * Display the specified PhotoGallery.
     * GET|HEAD /photo-galleries/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var PhotoGallery $photoGallery */
        $photoGallery = $this->photoGalleryRepository->find($id);

        if (empty($photoGallery)) {
            return $this->sendError('Photo Gallery not found');
        }

        return $this->sendResponse($photoGallery->toArray(), 'Photo Gallery retrieved successfully');
    }

    /**
     * Update the specified PhotoGallery in storage.
     * PUT/PATCH /photo-galleries/{id}
     */
    public function update($id, UpdatePhotoGalleryAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var PhotoGallery $photoGallery */
        $photoGallery = $this->photoGalleryRepository->find($id);

        if (empty($photoGallery)) {
            return $this->sendError('Photo Gallery not found');
        }

        $photoGallery = $this->photoGalleryRepository->update($input, $id);

        return $this->sendResponse($photoGallery->toArray(), 'PhotoGallery updated successfully');
    }

    /**
     * Remove the specified PhotoGallery from storage.
     * DELETE /photo-galleries/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var PhotoGallery $photoGallery */
        $photoGallery = $this->photoGalleryRepository->find($id);

        if (empty($photoGallery)) {
            return $this->sendError('Photo Gallery not found');
        }

        $photoGallery->delete();

        return $this->sendSuccess('Photo Gallery deleted successfully');
    }
}
