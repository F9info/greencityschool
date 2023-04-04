<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSponsorCategoryAPIRequest;
use App\Http\Requests\API\UpdateSponsorCategoryAPIRequest;
use App\Models\SponsorCategory;
use App\Repositories\SponsorCategoryRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class SponsorCategoryAPIController
 */
class SponsorCategoryAPIController extends AppBaseController
{
    private SponsorCategoryRepository $sponsorCategoryRepository;

    public function __construct(SponsorCategoryRepository $sponsorCategoryRepo)
    {
        $this->sponsorCategoryRepository = $sponsorCategoryRepo;
    }

    /**
     * Display a listing of the SponsorCategories.
     * GET|HEAD /sponsor-categories
     */
    public function index(Request $request): JsonResponse
    {
        $sponsorCategories = $this->sponsorCategoryRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($sponsorCategories->toArray(), 'Sponsor Categories retrieved successfully');
    }

    /**
     * Store a newly created SponsorCategory in storage.
     * POST /sponsor-categories
     */
    public function store(CreateSponsorCategoryAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $sponsorCategory = $this->sponsorCategoryRepository->create($input);

        return $this->sendResponse($sponsorCategory->toArray(), 'Sponsor Category added successfully');
    }

    /**
     * Display the specified SponsorCategory.
     * GET|HEAD /sponsor-categories/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var SponsorCategory $sponsorCategory */
        $sponsorCategory = $this->sponsorCategoryRepository->find($id);

        if (empty($sponsorCategory)) {
            return $this->sendError('Sponsor Category not found');
        }

        return $this->sendResponse($sponsorCategory->toArray(), 'Sponsor Category retrieved successfully');
    }

    /**
     * Update the specified SponsorCategory in storage.
     * PUT/PATCH /sponsor-categories/{id}
     */
    public function update($id, UpdateSponsorCategoryAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var SponsorCategory $sponsorCategory */
        $sponsorCategory = $this->sponsorCategoryRepository->find($id);

        if (empty($sponsorCategory)) {
            return $this->sendError('Sponsor Category not found');
        }

        $sponsorCategory = $this->sponsorCategoryRepository->update($input, $id);

        return $this->sendResponse($sponsorCategory->toArray(), 'SponsorCategory updated successfully');
    }

    /**
     * Remove the specified SponsorCategory from storage.
     * DELETE /sponsor-categories/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var SponsorCategory $sponsorCategory */
        $sponsorCategory = $this->sponsorCategoryRepository->find($id);

        if (empty($sponsorCategory)) {
            return $this->sendError('Sponsor Category not found');
        }

        $sponsorCategory->delete();

        return $this->sendSuccess('Sponsor Category deleted successfully');
    }
}
