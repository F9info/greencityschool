<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePersonalDetailsAPIRequest;
use App\Http\Requests\API\UpdatePersonalDetailsAPIRequest;
use App\Models\PersonalDetails;
use App\Repositories\PersonalDetailsRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class PersonalDetailsAPIController
 */
class PersonalDetailsAPIController extends AppBaseController
{
    private PersonalDetailsRepository $personalDetailsRepository;

    public function __construct(PersonalDetailsRepository $personalDetailsRepo)
    {
        $this->personalDetailsRepository = $personalDetailsRepo;
    }

    /**
     * Display a listing of the PersonalDetails.
     * GET|HEAD /personal-details
     */
    public function index(Request $request): JsonResponse
    {
        $personalDetails = $this->personalDetailsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($personalDetails->toArray(), 'Personal Details retrieved successfully');
    }

    /**
     * Store a newly created PersonalDetails in storage.
     * POST /personal-details
     */
    public function store(CreatePersonalDetailsAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $personalDetails = $this->personalDetailsRepository->create($input);

        return $this->sendResponse($personalDetails->toArray(), 'Personal Details added successfully');
    }

    /**
     * Display the specified PersonalDetails.
     * GET|HEAD /personal-details/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var PersonalDetails $personalDetails */
        $personalDetails = $this->personalDetailsRepository->find($id);

        if (empty($personalDetails)) {
            return $this->sendError('Personal Details not found');
        }

        return $this->sendResponse($personalDetails->toArray(), 'Personal Details retrieved successfully');
    }

    /**
     * Update the specified PersonalDetails in storage.
     * PUT/PATCH /personal-details/{id}
     */
    public function update($id, UpdatePersonalDetailsAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var PersonalDetails $personalDetails */
        $personalDetails = $this->personalDetailsRepository->find($id);

        if (empty($personalDetails)) {
            return $this->sendError('Personal Details not found');
        }

        $personalDetails = $this->personalDetailsRepository->update($input, $id);

        return $this->sendResponse($personalDetails->toArray(), 'PersonalDetails updated successfully');
    }

    /**
     * Remove the specified PersonalDetails from storage.
     * DELETE /personal-details/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var PersonalDetails $personalDetails */
        $personalDetails = $this->personalDetailsRepository->find($id);

        if (empty($personalDetails)) {
            return $this->sendError('Personal Details not found');
        }

        $personalDetails->delete();

        return $this->sendSuccess('Personal Details deleted successfully');
    }
}
