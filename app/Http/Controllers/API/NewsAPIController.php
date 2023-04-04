<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateNewsAPIRequest;
use App\Http\Requests\API\UpdateNewsAPIRequest;
use App\Models\News;
use App\Repositories\NewsRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class NewsAPIController
 */
class NewsAPIController extends AppBaseController
{
    private NewsRepository $newsRepository;

    public function __construct(NewsRepository $newsRepo)
    {
        $this->newsRepository = $newsRepo;
    }

    /**
     * Display a listing of the News.
     * GET|HEAD /news
     */
    public function index(Request $request): JsonResponse
    {
        $news = $this->newsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($news->toArray(), 'News retrieved successfully');
    }

    /**
     * Store a newly created News in storage.
     * POST /news
     */
    public function store(CreateNewsAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $news = $this->newsRepository->create($input);

        return $this->sendResponse($news->toArray(), 'News added successfully');
    }

    /**
     * Display the specified News.
     * GET|HEAD /news/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var News $news */
        $news = $this->newsRepository->find($id);

        if (empty($news)) {
            return $this->sendError('News not found');
        }

        return $this->sendResponse($news->toArray(), 'News retrieved successfully');
    }

    /**
     * Update the specified News in storage.
     * PUT/PATCH /news/{id}
     */
    public function update($id, UpdateNewsAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var News $news */
        $news = $this->newsRepository->find($id);

        if (empty($news)) {
            return $this->sendError('News not found');
        }

        $news = $this->newsRepository->update($input, $id);

        return $this->sendResponse($news->toArray(), 'News updated successfully');
    }

    /**
     * Remove the specified News from storage.
     * DELETE /news/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var News $news */
        $news = $this->newsRepository->find($id);

        if (empty($news)) {
            return $this->sendError('News not found');
        }

        $news->delete();

        return $this->sendSuccess('News deleted successfully');
    }
}
