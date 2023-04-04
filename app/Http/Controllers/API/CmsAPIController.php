<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCmsAPIRequest;
use App\Http\Requests\API\UpdateCmsAPIRequest;
use App\Models\Cms;
use App\Repositories\CmsRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class CmsAPIController
 */
class CmsAPIController extends AppBaseController
{
    private CmsRepository $cmsRepository;

    public function __construct(CmsRepository $cmsRepo)
    {
        $this->cmsRepository = $cmsRepo;
    }

    /**
     * Display a listing of the Cms.
     * GET|HEAD /cms
     */
    public function index(Request $request): JsonResponse
    {
        $cms = $this->cmsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($cms->toArray(), 'Cms retrieved successfully');
    }

    /**
     * Store a newly created Cms in storage.
     * POST /cms
     */
    public function store(CreateCmsAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $cms = $this->cmsRepository->create($input);

        return $this->sendResponse($cms->toArray(), 'Cms added successfully');
    }

    /**
     * Display the specified Cms.
     * GET|HEAD /cms/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var Cms $cms */
        $cms = $this->cmsRepository->find($id);

        if (empty($cms)) {
            return $this->sendError('Cms not found');
        }

        return $this->sendResponse($cms->toArray(), 'Cms retrieved successfully');
    }

    /**
     * Update the specified Cms in storage.
     * PUT/PATCH /cms/{id}
     */
    public function update($id, UpdateCmsAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Cms $cms */
        $cms = $this->cmsRepository->find($id);

        if (empty($cms)) {
            return $this->sendError('Cms not found');
        }

        $cms = $this->cmsRepository->update($input, $id);

        return $this->sendResponse($cms->toArray(), 'Cms updated successfully');
    }

    /**
     * Remove the specified Cms from storage.
     * DELETE /cms/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var Cms $cms */
        $cms = $this->cmsRepository->find($id);

        if (empty($cms)) {
            return $this->sendError('Cms not found');
        }

        $cms->delete();

        return $this->sendSuccess('Cms deleted successfully');
    }
}
