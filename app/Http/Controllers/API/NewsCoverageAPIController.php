<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateNewsCoverageAPIRequest;
use App\Http\Requests\API\UpdateNewsCoverageAPIRequest;
use App\Models\NewsCoverage;
use App\Repositories\NewsCoverageRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class NewsCoverageAPIController
 */
class NewsCoverageAPIController extends AppBaseController
{
    private NewsCoverageRepository $newsCoverageRepository;

    public function __construct(NewsCoverageRepository $newsCoverageRepo)
    {
        $this->newsCoverageRepository = $newsCoverageRepo;
    }

    /**
     * Display a listing of the NewsCoverages.
     * GET|HEAD /news-coverages
     */
    public function index(Request $request): JsonResponse
    {
        $newsCoverages = $this->newsCoverageRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($newsCoverages->toArray(), 'News Coverages retrieved successfully');
    }

    /**
     * Store a newly created NewsCoverage in storage.
     * POST /news-coverages
     */
    public function store(CreateNewsCoverageAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $newsCoverage = $this->newsCoverageRepository->create($input);

        return $this->sendResponse($newsCoverage->toArray(), 'News Coverage added successfully');
    }

    /**
     * Display the specified NewsCoverage.
     * GET|HEAD /news-coverages/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var NewsCoverage $newsCoverage */
        $newsCoverage = $this->newsCoverageRepository->find($id);

        if (empty($newsCoverage)) {
            return $this->sendError('News Coverage not found');
        }

        return $this->sendResponse($newsCoverage->toArray(), 'News Coverage retrieved successfully');
    }

    /**
     * Update the specified NewsCoverage in storage.
     * PUT/PATCH /news-coverages/{id}
     */
    public function update($id, UpdateNewsCoverageAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var NewsCoverage $newsCoverage */
        $newsCoverage = $this->newsCoverageRepository->find($id);

        if (empty($newsCoverage)) {
            return $this->sendError('News Coverage not found');
        }

        $newsCoverage = $this->newsCoverageRepository->update($input, $id);

        return $this->sendResponse($newsCoverage->toArray(), 'NewsCoverage updated successfully');
    }

    /**
     * Remove the specified NewsCoverage from storage.
     * DELETE /news-coverages/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var NewsCoverage $newsCoverage */
        $newsCoverage = $this->newsCoverageRepository->find($id);

        if (empty($newsCoverage)) {
            return $this->sendError('News Coverage not found');
        }

        $newsCoverage->delete();

        return $this->sendSuccess('News Coverage deleted successfully');
    }
}
