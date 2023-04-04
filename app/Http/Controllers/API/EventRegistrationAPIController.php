<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEventRegistrationAPIRequest;
use App\Http\Requests\API\UpdateEventRegistrationAPIRequest;
use App\Models\EventRegistration;
use App\Repositories\EventRegistrationRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class EventRegistrationAPIController
 */
class EventRegistrationAPIController extends AppBaseController
{
    private EventRegistrationRepository $eventRegistrationRepository;

    public function __construct(EventRegistrationRepository $eventRegistrationRepo)
    {
        $this->eventRegistrationRepository = $eventRegistrationRepo;
    }

    /**
     * Display a listing of the EventRegistrations.
     * GET|HEAD /event-registrations
     */
    public function index(Request $request): JsonResponse
    {
        $eventRegistrations = $this->eventRegistrationRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($eventRegistrations->toArray(), 'Event Registrations retrieved successfully');
    }

    /**
     * Store a newly created EventRegistration in storage.
     * POST /event-registrations
     */
    public function store(CreateEventRegistrationAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $eventRegistration = $this->eventRegistrationRepository->create($input);

        return $this->sendResponse($eventRegistration->toArray(), 'Event Registration saved successfully');
    }

    /**
     * Display the specified EventRegistration.
     * GET|HEAD /event-registrations/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var EventRegistration $eventRegistration */
        $eventRegistration = $this->eventRegistrationRepository->find($id);

        if (empty($eventRegistration)) {
            return $this->sendError('Event Registration not found');
        }

        return $this->sendResponse($eventRegistration->toArray(), 'Event Registration retrieved successfully');
    }

    /**
     * Update the specified EventRegistration in storage.
     * PUT/PATCH /event-registrations/{id}
     */
    public function update($id, UpdateEventRegistrationAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var EventRegistration $eventRegistration */
        $eventRegistration = $this->eventRegistrationRepository->find($id);

        if (empty($eventRegistration)) {
            return $this->sendError('Event Registration not found');
        }

        $eventRegistration = $this->eventRegistrationRepository->update($input, $id);

        return $this->sendResponse($eventRegistration->toArray(), 'EventRegistration updated successfully');
    }

    /**
     * Remove the specified EventRegistration from storage.
     * DELETE /event-registrations/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var EventRegistration $eventRegistration */
        $eventRegistration = $this->eventRegistrationRepository->find($id);

        if (empty($eventRegistration)) {
            return $this->sendError('Event Registration not found');
        }

        $eventRegistration->delete();

        return $this->sendSuccess('Event Registration deleted successfully');
    }
}
