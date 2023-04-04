<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMembershipTypeAPIRequest;
use App\Http\Requests\API\UpdateMembershipTypeAPIRequest;
use App\Models\MembershipType;
use App\Repositories\MembershipTypeRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class MembershipTypeAPIController
 */
class MembershipTypeAPIController extends AppBaseController
{
    private MembershipTypeRepository $membershipTypeRepository;

    public function __construct(MembershipTypeRepository $membershipTypeRepo)
    {
        $this->membershipTypeRepository = $membershipTypeRepo;
    }

    /**
     * Display a listing of the MembershipTypes.
     * GET|HEAD /membership-types
     */
    public function index(Request $request): JsonResponse
    {
        $membershipTypes = $this->membershipTypeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($membershipTypes->toArray(), 'Membership Types retrieved successfully');
    }

    /**
     * Store a newly created MembershipType in storage.
     * POST /membership-types
     */
    public function store(CreateMembershipTypeAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $membershipType = $this->membershipTypeRepository->create($input);

        return $this->sendResponse($membershipType->toArray(), 'Membership Type added successfully');
    }

    /**
     * Display the specified MembershipType.
     * GET|HEAD /membership-types/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var MembershipType $membershipType */
        $membershipType = $this->membershipTypeRepository->find($id);

        if (empty($membershipType)) {
            return $this->sendError('Membership Type not found');
        }

        return $this->sendResponse($membershipType->toArray(), 'Membership Type retrieved successfully');
    }

    /**
     * Update the specified MembershipType in storage.
     * PUT/PATCH /membership-types/{id}
     */
    public function update($id, UpdateMembershipTypeAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var MembershipType $membershipType */
        $membershipType = $this->membershipTypeRepository->find($id);

        if (empty($membershipType)) {
            return $this->sendError('Membership Type not found');
        }

        $membershipType = $this->membershipTypeRepository->update($input, $id);

        return $this->sendResponse($membershipType->toArray(), 'MembershipType updated successfully');
    }

    /**
     * Remove the specified MembershipType from storage.
     * DELETE /membership-types/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var MembershipType $membershipType */
        $membershipType = $this->membershipTypeRepository->find($id);

        if (empty($membershipType)) {
            return $this->sendError('Membership Type not found');
        }

        $membershipType->delete();

        return $this->sendSuccess('Membership Type deleted successfully');
    }
}
