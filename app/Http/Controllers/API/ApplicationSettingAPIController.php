<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateApplicationSettingAPIRequest;
use App\Http\Requests\API\UpdateApplicationSettingAPIRequest;
use App\Models\ApplicationSetting;
use App\Repositories\ApplicationSettingRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class ApplicationSettingAPIController
 */
class ApplicationSettingAPIController extends AppBaseController
{
    private ApplicationSettingRepository $applicationSettingRepository;

    public function __construct(ApplicationSettingRepository $applicationSettingRepo)
    {
        $this->applicationSettingRepository = $applicationSettingRepo;
    }

    /**
     * Display a listing of the ApplicationSettings.
     * GET|HEAD /application-settings
     */
    public function index(Request $request): JsonResponse
    {
        $applicationSettings = $this->applicationSettingRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($applicationSettings->toArray(), 'Application Settings retrieved successfully');
    }

    /**
     * Store a newly created ApplicationSetting in storage.
     * POST /application-settings
     */
    public function store(CreateApplicationSettingAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $applicationSetting = $this->applicationSettingRepository->create($input);

        return $this->sendResponse($applicationSetting->toArray(), 'Application Setting saved successfully');
    }

    /**
     * Display the specified ApplicationSetting.
     * GET|HEAD /application-settings/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var ApplicationSetting $applicationSetting */
        $applicationSetting = $this->applicationSettingRepository->find($id);

        if (empty($applicationSetting)) {
            return $this->sendError('Application Setting not found');
        }

        return $this->sendResponse($applicationSetting->toArray(), 'Application Setting retrieved successfully');
    }

    /**
     * Update the specified ApplicationSetting in storage.
     * PUT/PATCH /application-settings/{id}
     */
    public function update($id, UpdateApplicationSettingAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var ApplicationSetting $applicationSetting */
        $applicationSetting = $this->applicationSettingRepository->find($id);

        if (empty($applicationSetting)) {
            return $this->sendError('Application Setting not found');
        }

        $applicationSetting = $this->applicationSettingRepository->update($input, $id);

        return $this->sendResponse($applicationSetting->toArray(), 'ApplicationSetting updated successfully');
    }

    /**
     * Remove the specified ApplicationSetting from storage.
     * DELETE /application-settings/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var ApplicationSetting $applicationSetting */
        $applicationSetting = $this->applicationSettingRepository->find($id);

        if (empty($applicationSetting)) {
            return $this->sendError('Application Setting not found');
        }

        $applicationSetting->delete();

        return $this->sendSuccess('Application Setting deleted successfully');
    }
}
