<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSponsorAPIRequest;
use App\Http\Requests\API\UpdateSponsorAPIRequest;
use App\Models\Sponsor;
use App\Repositories\SponsorRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class SponsorAPIController
 */
class SponsorAPIController extends AppBaseController
{
    private SponsorRepository $sponsorRepository;

    public function __construct(SponsorRepository $sponsorRepo)
    {
        $this->sponsorRepository = $sponsorRepo;
    }

    /**
     * Display a listing of the Sponsors.
     * GET|HEAD /sponsors
     */
    public function index(Request $request): JsonResponse
    {
        $sponsors = $this->sponsorRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($sponsors->toArray(), 'Sponsors retrieved successfully');
    }

    /**
     * Store a newly created Sponsor in storage.
     * POST /sponsors
     */
    public function store(CreateSponsorAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $sponsor = $this->sponsorRepository->create($input);

        return $this->sendResponse($sponsor->toArray(), 'Sponsor added successfully');
    }

    /**
     * Display the specified Sponsor.
     * GET|HEAD /sponsors/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var Sponsor $sponsor */
        $sponsor = $this->sponsorRepository->find($id);

        if (empty($sponsor)) {
            return $this->sendError('Sponsor not found');
        }

        return $this->sendResponse($sponsor->toArray(), 'Sponsor retrieved successfully');
    }

    /**
     * Update the specified Sponsor in storage.
     * PUT/PATCH /sponsors/{id}
     */
    public function update($id, UpdateSponsorAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Sponsor $sponsor */
        $sponsor = $this->sponsorRepository->find($id);

        if (empty($sponsor)) {
            return $this->sendError('Sponsor not found');
        }

        $sponsor = $this->sponsorRepository->update($input, $id);

        return $this->sendResponse($sponsor->toArray(), 'Sponsor updated successfully');
    }

    /**
     * Remove the specified Sponsor from storage.
     * DELETE /sponsors/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var Sponsor $sponsor */
        $sponsor = $this->sponsorRepository->find($id);

        if (empty($sponsor)) {
            return $this->sendError('Sponsor not found');
        }

        $sponsor->delete();

        return $this->sendSuccess('Sponsor deleted successfully');
    }
}
