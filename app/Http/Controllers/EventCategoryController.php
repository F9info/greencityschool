<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEventCategoryRequest;
use App\Http\Requests\UpdateEventCategoryRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\EventCategoryRepository;
use Illuminate\Http\Request;
use App\Models\EventCategory;
use Flash;

class EventCategoryController extends AppBaseController
{
    /** @var EventCategoryRepository $eventCategoryRepository*/
    private $eventCategoryRepository;

    public function __construct(EventCategoryRepository $eventCategoryRepo)
    {
        $this->eventCategoryRepository = $eventCategoryRepo;
        
        $this->middleware(['admin_permissions:add-event-categories'])->only(['create', 'store']);
        $this->middleware(['admin_permissions:edit-event-categories'])->only(['edit', 'update']);
        $this->middleware(['admin_permissions:delete-event-categories'])->only(['destroy']);
        $this->middleware(['admin_permissions:view-event-categories'])->only(['index', 'show']);
        $this->middleware('admin');
    }

    /**
     * Display a listing of the EventCategory.
     */
    public function index(Request $request)
    {
        $query = EventCategory::query();
        if (!empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', '%' . $search . "%");
            });
        }
        $eventCategories = $query->sortable(['position', 'asc'])->paginate(10);

        return view('event_categories.index')
            ->with('eventCategories', $eventCategories);
    }

    /**
     * Show the form for creating a new EventCategory.
     */
    public function create()
    {
        return view('event_categories.create');
    }

    /**
     * Store a newly created EventCategory in storage.
     */
    public function store(CreateEventCategoryRequest $request)
    {
        $input = $request->all();

        $eventCategory = $this->eventCategoryRepository->create($input);

        Flash::success('Event Category added successfully.');

        return redirect(route('eventCategories.index'));
    }

    /**
     * Display the specified EventCategory.
     */
    public function show($id)
    {
        $eventCategory = $this->eventCategoryRepository->find($id);

        if (empty($eventCategory)) {
            Flash::error('Event Category not found');

            return redirect(route('eventCategories.index'));
        }

        return view('event_categories.show')->with('eventCategory', $eventCategory);
    }

    /**
     * Show the form for editing the specified EventCategory.
     */
    public function edit($id)
    {
        $eventCategory = $this->eventCategoryRepository->find($id);

        if (empty($eventCategory)) {
            Flash::error('Event Category not found');

            return redirect(route('eventCategories.index'));
        }

        return view('event_categories.edit')->with('eventCategory', $eventCategory);
    }

    /**
     * Update the specified EventCategory in storage.
     */
    public function update($id, UpdateEventCategoryRequest $request)
    {
        $eventCategory = $this->eventCategoryRepository->find($id);

        if (empty($eventCategory)) {
            Flash::error('Event Category not found');

            return redirect(route('eventCategories.index'));
        }

        $eventCategory = $this->eventCategoryRepository->update($request->all(), $id);

        Flash::success('Event Category updated successfully.');

        return redirect(route('eventCategories.index'));
    }

    /**
     * Remove the specified EventCategory from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $eventCategory = $this->eventCategoryRepository->find($id);

        if (empty($eventCategory)) {
            Flash::error('Event Category not found');

            return redirect(route('eventCategories.index'));
        }
        if($eventCategory->events->count() > 0) {
            Flash::error('Unable to delete Event Category. Please delete assigned events first.');
        }else{
            $this->eventCategoryRepository->delete($id);
            Flash::success('Event Category deleted successfully.');
        }

        return redirect(route('eventCategories.index'));
    }

    public function sort(Request $request)
    {
        $eventCategories = $this->eventCategoryRepository->all();

        foreach ($eventCategories as $eventCategory) {
            foreach ($request->order as $order) {
                if ($order['id'] == $eventCategory->id) {
                    $eventCategory->position = $order['position'];
                    $eventCategory->save();
                }
            }
        }

        return response('Update Successfully.', 200);
    }
}
