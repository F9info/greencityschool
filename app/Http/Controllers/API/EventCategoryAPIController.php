<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEventCategoryAPIRequest;
use App\Http\Requests\API\UpdateEventCategoryAPIRequest;
use App\Models\EventCategory;
use App\Repositories\EventCategoryRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class EventCategoryAPIController
 */
class EventCategoryAPIController extends AppBaseController
{
    private EventCategoryRepository $eventCategoryRepository;

    public function __construct(EventCategoryRepository $eventCategoryRepo)
    {
        $this->eventCategoryRepository = $eventCategoryRepo;
    }

    /**
     * Display a listing of the EventCategories.
     * GET|HEAD /event-categories
     */
    public function index(Request $request): JsonResponse
    {
        $eventCategories = $this->eventCategoryRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($eventCategories->toArray(), 'Event Categories retrieved successfully');
    }

    /**
     * Store a newly created EventCategory in storage.
     * POST /event-categories
     */
    public function store(CreateEventCategoryAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $eventCategory = $this->eventCategoryRepository->create($input);

        return $this->sendResponse($eventCategory->toArray(), 'Event Category added successfully');
    }

    /**
     * Display the specified EventCategory.
     * GET|HEAD /event-categories/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var EventCategory $eventCategory */
        $eventCategory = $this->eventCategoryRepository->find($id);

        if (empty($eventCategory)) {
            return $this->sendError('Event Category not found');
        }

        return $this->sendResponse($eventCategory->toArray(), 'Event Category retrieved successfully');
    }

    /**
     * Update the specified EventCategory in storage.
     * PUT/PATCH /event-categories/{id}
     */
    public function update($id, UpdateEventCategoryAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var EventCategory $eventCategory */
        $eventCategory = $this->eventCategoryRepository->find($id);

        if (empty($eventCategory)) {
            return $this->sendError('Event Category not found');
        }

        $eventCategory = $this->eventCategoryRepository->update($input, $id);

        return $this->sendResponse($eventCategory->toArray(), 'EventCategory updated successfully');
    }

    /**
     * Remove the specified EventCategory from storage.
     * DELETE /event-categories/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var EventCategory $eventCategory */
        $eventCategory = $this->eventCategoryRepository->find($id);

        if (empty($eventCategory)) {
            return $this->sendError('Event Category not found');
        }

        $eventCategory->delete();

        return $this->sendSuccess('Event Category deleted successfully');
    }
}
