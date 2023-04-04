<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMemberInterestAPIRequest;
use App\Http\Requests\API\UpdateMemberInterestAPIRequest;
use App\Models\MemberInterest;
use App\Repositories\MemberInterestRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class MemberInterestAPIController
 */
class MemberInterestAPIController extends AppBaseController
{
    private MemberInterestRepository $memberInterestRepository;

    public function __construct(MemberInterestRepository $memberInterestRepo)
    {
        $this->memberInterestRepository = $memberInterestRepo;
    }

    /**
     * Display a listing of the MemberInterests.
     * GET|HEAD /member-interests
     */
    public function index(Request $request): JsonResponse
    {
        $memberInterests = $this->memberInterestRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($memberInterests->toArray(), 'Member Interests retrieved successfully');
    }

    /**
     * Store a newly created MemberInterest in storage.
     * POST /member-interests
     */
    public function store(CreateMemberInterestAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $memberInterest = $this->memberInterestRepository->create($input);

        return $this->sendResponse($memberInterest->toArray(), 'Member Interest added successfully');
    }

    /**
     * Display the specified MemberInterest.
     * GET|HEAD /member-interests/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var MemberInterest $memberInterest */
        $memberInterest = $this->memberInterestRepository->find($id);

        if (empty($memberInterest)) {
            return $this->sendError('Member Interest not found');
        }

        return $this->sendResponse($memberInterest->toArray(), 'Member Interest retrieved successfully');
    }

    /**
     * Update the specified MemberInterest in storage.
     * PUT/PATCH /member-interests/{id}
     */
    public function update($id, UpdateMemberInterestAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var MemberInterest $memberInterest */
        $memberInterest = $this->memberInterestRepository->find($id);

        if (empty($memberInterest)) {
            return $this->sendError('Member Interest not found');
        }

        $memberInterest = $this->memberInterestRepository->update($input, $id);

        return $this->sendResponse($memberInterest->toArray(), 'MemberInterest updated successfully');
    }

    /**
     * Remove the specified MemberInterest from storage.
     * DELETE /member-interests/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var MemberInterest $memberInterest */
        $memberInterest = $this->memberInterestRepository->find($id);

        if (empty($memberInterest)) {
            return $this->sendError('Member Interest not found');
        }

        $memberInterest->delete();

        return $this->sendSuccess('Member Interest deleted successfully');
    }
}
