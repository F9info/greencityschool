<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDonationCategoryAPIRequest;
use App\Http\Requests\API\UpdateDonationCategoryAPIRequest;
use App\Models\DonationCategory;
use App\Repositories\DonationCategoryRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class DonationCategoryAPIController
 */
class DonationCategoryAPIController extends AppBaseController
{
    private DonationCategoryRepository $donationCategoryRepository;

    public function __construct(DonationCategoryRepository $donationCategoryRepo)
    {
        $this->donationCategoryRepository = $donationCategoryRepo;
    }

    /**
     * Display a listing of the DonationCategories.
     * GET|HEAD /donation-categories
     */
    public function index(Request $request): JsonResponse
    {
        $donationCategories = $this->donationCategoryRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($donationCategories->toArray(), 'Donation Categories retrieved successfully');
    }

    /**
     * Store a newly created DonationCategory in storage.
     * POST /donation-categories
     */
    public function store(CreateDonationCategoryAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $donationCategory = $this->donationCategoryRepository->create($input);

        return $this->sendResponse($donationCategory->toArray(), 'Donation Category added successfully');
    }

    /**
     * Display the specified DonationCategory.
     * GET|HEAD /donation-categories/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var DonationCategory $donationCategory */
        $donationCategory = $this->donationCategoryRepository->find($id);

        if (empty($donationCategory)) {
            return $this->sendError('Donation Category not found');
        }

        return $this->sendResponse($donationCategory->toArray(), 'Donation Category retrieved successfully');
    }

    /**
     * Update the specified DonationCategory in storage.
     * PUT/PATCH /donation-categories/{id}
     */
    public function update($id, UpdateDonationCategoryAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var DonationCategory $donationCategory */
        $donationCategory = $this->donationCategoryRepository->find($id);

        if (empty($donationCategory)) {
            return $this->sendError('Donation Category not found');
        }

        $donationCategory = $this->donationCategoryRepository->update($input, $id);

        return $this->sendResponse($donationCategory->toArray(), 'DonationCategory updated successfully');
    }

    /**
     * Remove the specified DonationCategory from storage.
     * DELETE /donation-categories/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var DonationCategory $donationCategory */
        $donationCategory = $this->donationCategoryRepository->find($id);

        if (empty($donationCategory)) {
            return $this->sendError('Donation Category not found');
        }

        $donationCategory->delete();

        return $this->sendSuccess('Donation Category deleted successfully');
    }
}
