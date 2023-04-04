<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateNewsCoverageCategoryAPIRequest;
use App\Http\Requests\API\UpdateNewsCoverageCategoryAPIRequest;
use App\Models\NewsCoverageCategory;
use App\Repositories\NewsCoverageCategoryRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class NewsCoverageCategoryAPIController
 */
class NewsCoverageCategoryAPIController extends AppBaseController
{
    private NewsCoverageCategoryRepository $newsCoverageCategoryRepository;

    public function __construct(NewsCoverageCategoryRepository $newsCoverageCategoryRepo)
    {
        $this->newsCoverageCategoryRepository = $newsCoverageCategoryRepo;
    }

    /**
     * Display a listing of the NewsCoverageCategories.
     * GET|HEAD /news-coverage-categories
     */
    public function index(Request $request): JsonResponse
    {
        $newsCoverageCategories = $this->newsCoverageCategoryRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($newsCoverageCategories->toArray(), 'News Coverage Categories retrieved successfully');
    }

    /**
     * Store a newly created NewsCoverageCategory in storage.
     * POST /news-coverage-categories
     */
    public function store(CreateNewsCoverageCategoryAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $newsCoverageCategory = $this->newsCoverageCategoryRepository->create($input);

        return $this->sendResponse($newsCoverageCategory->toArray(), 'News Coverage Category added successfully');
    }

    /**
     * Display the specified NewsCoverageCategory.
     * GET|HEAD /news-coverage-categories/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var NewsCoverageCategory $newsCoverageCategory */
        $newsCoverageCategory = $this->newsCoverageCategoryRepository->find($id);

        if (empty($newsCoverageCategory)) {
            return $this->sendError('News Coverage Category not found');
        }

        return $this->sendResponse($newsCoverageCategory->toArray(), 'News Coverage Category retrieved successfully');
    }

    /**
     * Update the specified NewsCoverageCategory in storage.
     * PUT/PATCH /news-coverage-categories/{id}
     */
    public function update($id, UpdateNewsCoverageCategoryAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var NewsCoverageCategory $newsCoverageCategory */
        $newsCoverageCategory = $this->newsCoverageCategoryRepository->find($id);

        if (empty($newsCoverageCategory)) {
            return $this->sendError('News Coverage Category not found');
        }

        $newsCoverageCategory = $this->newsCoverageCategoryRepository->update($input, $id);

        return $this->sendResponse($newsCoverageCategory->toArray(), 'NewsCoverageCategory updated successfully');
    }

    /**
     * Remove the specified NewsCoverageCategory from storage.
     * DELETE /news-coverage-categories/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var NewsCoverageCategory $newsCoverageCategory */
        $newsCoverageCategory = $this->newsCoverageCategoryRepository->find($id);

        if (empty($newsCoverageCategory)) {
            return $this->sendError('News Coverage Category not found');
        }

        $newsCoverageCategory->delete();

        return $this->sendSuccess('News Coverage Category deleted successfully');
    }
}
