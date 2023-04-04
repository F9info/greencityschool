<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCommitteeCategoryTypeAPIRequest;
use App\Http\Requests\API\UpdateCommitteeCategoryTypeAPIRequest;
use App\Models\CommitteeCategoryType;
use App\Repositories\CommitteeCategoryTypeRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class CommitteeCategoryTypeAPIController
 */
class CommitteeCategoryTypeAPIController extends AppBaseController
{
    private CommitteeCategoryTypeRepository $committeeCategoryTypeRepository;

    public function __construct(CommitteeCategoryTypeRepository $committeeCategoryTypeRepo)
    {
        $this->committeeCategoryTypeRepository = $committeeCategoryTypeRepo;
    }

    /**
     * Display a listing of the CommitteeCategoryTypes.
     * GET|HEAD /committee-category-types
     */
    public function index(Request $request): JsonResponse
    {
        $committeeCategoryTypes = $this->committeeCategoryTypeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($committeeCategoryTypes->toArray(), 'Committee Category Types retrieved successfully');
    }

    /**
     * Store a newly created CommitteeCategoryType in storage.
     * POST /committee-category-types
     */
    public function store(CreateCommitteeCategoryTypeAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $committeeCategoryType = $this->committeeCategoryTypeRepository->create($input);

        return $this->sendResponse($committeeCategoryType->toArray(), 'Committee Category Type added successfully');
    }

    /**
     * Display the specified CommitteeCategoryType.
     * GET|HEAD /committee-category-types/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var CommitteeCategoryType $committeeCategoryType */
        $committeeCategoryType = $this->committeeCategoryTypeRepository->find($id);

        if (empty($committeeCategoryType)) {
            return $this->sendError('Committee Category Type not found');
        }

        return $this->sendResponse($committeeCategoryType->toArray(), 'Committee Category Type retrieved successfully');
    }

    /**
     * Update the specified CommitteeCategoryType in storage.
     * PUT/PATCH /committee-category-types/{id}
     */
    public function update($id, UpdateCommitteeCategoryTypeAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var CommitteeCategoryType $committeeCategoryType */
        $committeeCategoryType = $this->committeeCategoryTypeRepository->find($id);

        if (empty($committeeCategoryType)) {
            return $this->sendError('Committee Category Type not found');
        }

        $committeeCategoryType = $this->committeeCategoryTypeRepository->update($input, $id);

        return $this->sendResponse($committeeCategoryType->toArray(), 'CommitteeCategoryType updated successfully');
    }

    /**
     * Remove the specified CommitteeCategoryType from storage.
     * DELETE /committee-category-types/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var CommitteeCategoryType $committeeCategoryType */
        $committeeCategoryType = $this->committeeCategoryTypeRepository->find($id);

        if (empty($committeeCategoryType)) {
            return $this->sendError('Committee Category Type not found');
        }

        $committeeCategoryType->delete();

        return $this->sendSuccess('Committee Category Type deleted successfully');
    }
}
