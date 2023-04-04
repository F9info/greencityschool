<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCommitteeCategoryAPIRequest;
use App\Http\Requests\API\UpdateCommitteeCategoryAPIRequest;
use App\Models\CommitteeCategory;
use App\Repositories\CommitteeCategoryRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class CommitteeCategoryAPIController
 */
class CommitteeCategoryAPIController extends AppBaseController
{
    private CommitteeCategoryRepository $committeeCategoryRepository;

    public function __construct(CommitteeCategoryRepository $committeeCategoryRepo)
    {
        $this->committeeCategoryRepository = $committeeCategoryRepo;
    }

    /**
     * Display a listing of the CommitteeCategories.
     * GET|HEAD /committee-categories
     */
    public function index(Request $request): JsonResponse
    {
        $committeeCategories = $this->committeeCategoryRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($committeeCategories->toArray(), 'Committee Categories retrieved successfully');
    }

    /**
     * Store a newly created CommitteeCategory in storage.
     * POST /committee-categories
     */
    public function store(CreateCommitteeCategoryAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $committeeCategory = $this->committeeCategoryRepository->create($input);

        return $this->sendResponse($committeeCategory->toArray(), 'Committee Category added successfully');
    }

    /**
     * Display the specified CommitteeCategory.
     * GET|HEAD /committee-categories/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var CommitteeCategory $committeeCategory */
        $committeeCategory = $this->committeeCategoryRepository->find($id);

        if (empty($committeeCategory)) {
            return $this->sendError('Committee Category not found');
        }

        return $this->sendResponse($committeeCategory->toArray(), 'Committee Category retrieved successfully');
    }

    /**
     * Update the specified CommitteeCategory in storage.
     * PUT/PATCH /committee-categories/{id}
     */
    public function update($id, UpdateCommitteeCategoryAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var CommitteeCategory $committeeCategory */
        $committeeCategory = $this->committeeCategoryRepository->find($id);

        if (empty($committeeCategory)) {
            return $this->sendError('Committee Category not found');
        }

        $committeeCategory = $this->committeeCategoryRepository->update($input, $id);

        return $this->sendResponse($committeeCategory->toArray(), 'CommitteeCategory updated successfully');
    }

    /**
     * Remove the specified CommitteeCategory from storage.
     * DELETE /committee-categories/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var CommitteeCategory $committeeCategory */
        $committeeCategory = $this->committeeCategoryRepository->find($id);

        if (empty($committeeCategory)) {
            return $this->sendError('Committee Category not found');
        }

        $committeeCategory->delete();

        return $this->sendSuccess('Committee Category deleted successfully');
    }
}
