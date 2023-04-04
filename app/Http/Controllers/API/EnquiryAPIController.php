<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEnquiryAPIRequest;
use App\Http\Requests\API\UpdateEnquiryAPIRequest;
use App\Models\Enquiry;
use App\Repositories\EnquiryRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class EnquiryAPIController
 */
class EnquiryAPIController extends AppBaseController
{
    private EnquiryRepository $enquiryRepository;

    public function __construct(EnquiryRepository $enquiryRepo)
    {
        $this->enquiryRepository = $enquiryRepo;
    }

    /**
     * Display a listing of the Enquiries.
     * GET|HEAD /enquiries
     */
    public function index(Request $request): JsonResponse
    {
        $enquiries = $this->enquiryRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($enquiries->toArray(), 'Enquiries retrieved successfully');
    }

    /**
     * Store a newly created Enquiry in storage.
     * POST /enquiries
     */
    public function store(CreateEnquiryAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $enquiry = $this->enquiryRepository->create($input);

        return $this->sendResponse($enquiry->toArray(), 'Enquiry added successfully');
    }

    /**
     * Display the specified Enquiry.
     * GET|HEAD /enquiries/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var Enquiry $enquiry */
        $enquiry = $this->enquiryRepository->find($id);

        if (empty($enquiry)) {
            return $this->sendError('Enquiry not found');
        }

        return $this->sendResponse($enquiry->toArray(), 'Enquiry retrieved successfully');
    }

    /**
     * Update the specified Enquiry in storage.
     * PUT/PATCH /enquiries/{id}
     */
    public function update($id, UpdateEnquiryAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Enquiry $enquiry */
        $enquiry = $this->enquiryRepository->find($id);

        if (empty($enquiry)) {
            return $this->sendError('Enquiry not found');
        }

        $enquiry = $this->enquiryRepository->update($input, $id);

        return $this->sendResponse($enquiry->toArray(), 'Enquiry updated successfully');
    }

    /**
     * Remove the specified Enquiry from storage.
     * DELETE /enquiries/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var Enquiry $enquiry */
        $enquiry = $this->enquiryRepository->find($id);

        if (empty($enquiry)) {
            return $this->sendError('Enquiry not found');
        }

        $enquiry->delete();

        return $this->sendSuccess('Enquiry deleted successfully');
    }
}
