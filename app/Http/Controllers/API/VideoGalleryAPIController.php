<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateVideoGalleryAPIRequest;
use App\Http\Requests\API\UpdateVideoGalleryAPIRequest;
use App\Models\VideoGallery;
use App\Repositories\VideoGalleryRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class VideoGalleryAPIController
 */
class VideoGalleryAPIController extends AppBaseController
{
    private VideoGalleryRepository $videoGalleryRepository;

    public function __construct(VideoGalleryRepository $videoGalleryRepo)
    {
        $this->videoGalleryRepository = $videoGalleryRepo;
    }

    /**
     * Display a listing of the VideoGalleries.
     * GET|HEAD /video-galleries
     */
    public function index(Request $request): JsonResponse
    {
        $videoGalleries = $this->videoGalleryRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($videoGalleries->toArray(), 'Video Galleries retrieved successfully');
    }

    /**
     * Store a newly created VideoGallery in storage.
     * POST /video-galleries
     */
    public function store(CreateVideoGalleryAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $videoGallery = $this->videoGalleryRepository->create($input);

        return $this->sendResponse($videoGallery->toArray(), 'Video Gallery added successfully');
    }

    /**
     * Display the specified VideoGallery.
     * GET|HEAD /video-galleries/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var VideoGallery $videoGallery */
        $videoGallery = $this->videoGalleryRepository->find($id);

        if (empty($videoGallery)) {
            return $this->sendError('Video Gallery not found');
        }

        return $this->sendResponse($videoGallery->toArray(), 'Video Gallery retrieved successfully');
    }

    /**
     * Update the specified VideoGallery in storage.
     * PUT/PATCH /video-galleries/{id}
     */
    public function update($id, UpdateVideoGalleryAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var VideoGallery $videoGallery */
        $videoGallery = $this->videoGalleryRepository->find($id);

        if (empty($videoGallery)) {
            return $this->sendError('Video Gallery not found');
        }

        $videoGallery = $this->videoGalleryRepository->update($input, $id);

        return $this->sendResponse($videoGallery->toArray(), 'VideoGallery updated successfully');
    }

    /**
     * Remove the specified VideoGallery from storage.
     * DELETE /video-galleries/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var VideoGallery $videoGallery */
        $videoGallery = $this->videoGalleryRepository->find($id);

        if (empty($videoGallery)) {
            return $this->sendError('Video Gallery not found');
        }

        $videoGallery->delete();

        return $this->sendSuccess('Video Gallery deleted successfully');
    }
}
