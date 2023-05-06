<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateServiceCategoryAPIRequest;
use App\Http\Requests\API\UpdateServiceCategoryAPIRequest;
use App\Models\ServiceCategory;
use App\Repositories\ServiceCategoryRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class ServiceCategoryAPIController
 */
class ServiceCategoryAPIController extends AppBaseController
{
    private ServiceCategoryRepository $serviceCategoryRepository;

    public function __construct(ServiceCategoryRepository $serviceCategoryRepo)
    {
        $this->serviceCategoryRepository = $serviceCategoryRepo;
    }

    /**
     * Display a listing of the ServiceCategories.
     * GET|HEAD /service-categories
     */
    public function index(Request $request): JsonResponse
    {
        $serviceCategories = $this->serviceCategoryRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($serviceCategories->toArray(), 'Service Categories retrieved successfully');
    }

    /**
     * Store a newly created ServiceCategory in storage.
     * POST /service-categories
     */
    public function store(CreateServiceCategoryAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $serviceCategory = $this->serviceCategoryRepository->create($input);

        return $this->sendResponse($serviceCategory->toArray(), 'Service Category saved successfully');
    }

    /**
     * Display the specified ServiceCategory.
     * GET|HEAD /service-categories/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var ServiceCategory $serviceCategory */
        $serviceCategory = $this->serviceCategoryRepository->find($id);

        if (empty($serviceCategory)) {
            return $this->sendError('Service Category not found');
        }

        return $this->sendResponse($serviceCategory->toArray(), 'Service Category retrieved successfully');
    }

    /**
     * Update the specified ServiceCategory in storage.
     * PUT/PATCH /service-categories/{id}
     */
    public function update($id, UpdateServiceCategoryAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var ServiceCategory $serviceCategory */
        $serviceCategory = $this->serviceCategoryRepository->find($id);

        if (empty($serviceCategory)) {
            return $this->sendError('Service Category not found');
        }

        $serviceCategory = $this->serviceCategoryRepository->update($input, $id);

        return $this->sendResponse($serviceCategory->toArray(), 'ServiceCategory updated successfully');
    }

    /**
     * Remove the specified ServiceCategory from storage.
     * DELETE /service-categories/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var ServiceCategory $serviceCategory */
        $serviceCategory = $this->serviceCategoryRepository->find($id);

        if (empty($serviceCategory)) {
            return $this->sendError('Service Category not found');
        }

        $serviceCategory->delete();

        return $this->sendSuccess('Service Category deleted successfully');
    }
}
