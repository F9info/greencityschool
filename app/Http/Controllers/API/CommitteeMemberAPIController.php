<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCommitteeMemberAPIRequest;
use App\Http\Requests\API\UpdateCommitteeMemberAPIRequest;
use App\Models\CommitteeMember;
use App\Repositories\CommitteeMemberRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class CommitteeMemberAPIController
 */
class CommitteeMemberAPIController extends AppBaseController
{
    private CommitteeMemberRepository $committeeMemberRepository;

    public function __construct(CommitteeMemberRepository $committeeMemberRepo)
    {
        $this->committeeMemberRepository = $committeeMemberRepo;
    }

    /**
     * Display a listing of the CommitteeMembers.
     * GET|HEAD /committee-members
     */
    public function index(Request $request): JsonResponse
    {
        $committeeMembers = $this->committeeMemberRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($committeeMembers->toArray(), 'Committee Members retrieved successfully');
    }

    /**
     * Store a newly created CommitteeMember in storage.
     * POST /committee-members
     */
    public function store(CreateCommitteeMemberAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $committeeMember = $this->committeeMemberRepository->create($input);

        return $this->sendResponse($committeeMember->toArray(), 'Committee Member added successfully');
    }

    /**
     * Display the specified CommitteeMember.
     * GET|HEAD /committee-members/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var CommitteeMember $committeeMember */
        $committeeMember = $this->committeeMemberRepository->find($id);

        if (empty($committeeMember)) {
            return $this->sendError('Committee Member not found');
        }

        return $this->sendResponse($committeeMember->toArray(), 'Committee Member retrieved successfully');
    }

    /**
     * Update the specified CommitteeMember in storage.
     * PUT/PATCH /committee-members/{id}
     */
    public function update($id, UpdateCommitteeMemberAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var CommitteeMember $committeeMember */
        $committeeMember = $this->committeeMemberRepository->find($id);

        if (empty($committeeMember)) {
            return $this->sendError('Committee Member not found');
        }

        $committeeMember = $this->committeeMemberRepository->update($input, $id);

        return $this->sendResponse($committeeMember->toArray(), 'CommitteeMember updated successfully');
    }

    /**
     * Remove the specified CommitteeMember from storage.
     * DELETE /committee-members/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var CommitteeMember $committeeMember */
        $committeeMember = $this->committeeMemberRepository->find($id);

        if (empty($committeeMember)) {
            return $this->sendError('Committee Member not found');
        }

        $committeeMember->delete();

        return $this->sendSuccess('Committee Member deleted successfully');
    }
}
