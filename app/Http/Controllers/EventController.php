<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\EventRepository;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventCategory;
use Flash;

class EventController extends AppBaseController
{
    /** @var EventRepository $eventRepository*/
    private $eventRepository;

    public function __construct(EventRepository $eventRepo)
    {
        $this->eventRepository = $eventRepo;
        
        $this->middleware(['admin_permissions:add-events'])->only(['create', 'store']);
        $this->middleware(['admin_permissions:edit-events'])->only(['edit', 'update']);
        $this->middleware(['admin_permissions:delete-events'])->only(['destroy']);
        $this->middleware(['admin_permissions:view-events'])->only(['index', 'show']);
        $this->middleware('admin');
    }

    /**
     * Display a listing of the Event.
     */
    public function index(Request $request)
    {
        $eventCategories = EventCategory::where('publish', 1)->orderBy('position', 'asc')->get()->pluck('name', 'id');
        $query = Event::query();
        if (!empty($request->search)) {
            $search = $request->search;
            $query->where('event_name', 'LIKE', '%' . $search . "%");
        }
        if (!empty($request->event_category_id)) {
            $query->where('event_category_id', $request->event_category_id);
        }
        if ($request->type == 'upcoming') {
            $query->where('start_date', '>=', date('Y-m-d'));
        }
        if ($request->type == 'current') {
            $query->where('start_date', '<=', date('Y-m-d'))->where('end_date', '>=', date('Y-m-d'));
        }
        if ($request->type == 'past') {
            $query->where('start_date', '<', date('Y-m-d'))->where('end_date', '<', date('Y-m-d'));
        }
        $events = $query->with(['eventCategory'])->sortable(['created_at' => 'desc'])->paginate(10);

        return view('events.index', compact('eventCategories', 'events'));
    }

    public function getEventType($start_date, $end_date)
    {
        if ($start_date >= date('Y-m-d')) {
            $type = 'upcoming';
        }
        if ($start_date <= date('Y-m-d') && $end_date >= date('Y-m-d')) {
            $type = 'current';
        }
        if ($start_date < date('Y-m-d') && $end_date < date('Y-m-d')) {
            $type = 'past';
        }
        return $type;
    }

    /**
     * Show the form for creating a new Event.
     */
    public function create()
    {
        $eventCategories = EventCategory::where('publish', 1)->orderBy('position', 'asc')->get()->pluck('name', 'id');
        return view('events.create', compact('eventCategories'));
    }

    /**
     * Store a newly created Event in storage.
     */
    public function store(CreateEventRequest $request)
    {
        $input = $request->all();

        $event = $this->eventRepository->create($input);
        if ($request->hasfile('image')) {
            $event->image = uploadImage($request->file('image'), 'images/events/', null, null);
        }
        $event->members_only = $request->has('members_only') ? 1 : 0;
        $event->registration_enabled = $request->has('registration_enabled') ? 1 : 0;
        $event->is_guest_adult = $request->has('is_guest_adult') ? 1 : 0;
        $event->is_guest_child = $request->has('is_guest_child') ? 1 : 0;
        $event->is_adult = $request->has('is_adult') ? 1 : 0;
        $event->is_child = $request->has('is_child') ? 1 : 0;

        $additional_fields = array();
        if ($request->has('additional_field1_name')) {
            $additional_fields['field_1']['field_name'] = $request->additional_field1_name;
            $additional_fields['field_1']['field_type'] = $request->additional_field1_type;

            $additional_fields['field_1']['field_options'] = $request->additional_field1_options;
        }
        if ($request->has('additional_field2_name')) {
            $additional_fields['field_2']['field_name'] = $request->additional_field2_name;
            $additional_fields['field_2']['field_type'] = $request->additional_field2_type;

            $additional_fields['field_2']['field_options'] = $request->additional_field2_options;
        }
        $event->additional_fields = $additional_fields;
        $event->save();

        Flash::success('Event added successfully.');

        return redirect(route('events.index', ['type' => $this->getEventType($request->start_date, $request->end_date)]));
    }

    /**
     * Display the specified Event.
     */
    public function show($id)
    {
        $event = $this->eventRepository->find($id);

        if (empty($event)) {
            Flash::error('Event not found');

            return redirect(route('events.index'));
        }

        return view('events.show')->with('event', $event);
    }

    /**
     * Show the form for editing the specified Event.
     */
    public function edit($id)
    {
        $eventCategories = EventCategory::where('publish', 1)->orderBy('position', 'asc')->get()->pluck('name', 'id');
        $event = $this->eventRepository->find($id);

        if (empty($event)) {
            Flash::error('Event not found');

            return redirect(route('events.index'));
        }

        return view('events.edit', compact('eventCategories', 'event'));
    }

    /**
     * Update the specified Event in storage.
     */
    public function update($id, UpdateEventRequest $request)
    {
        $event = $this->eventRepository->find($id);

        if (empty($event)) {
            Flash::error('Event not found');

            return redirect(route('events.index'));
        }

        if ($request->hasfile('image')) {
            removeImage($event->image, 'images/events/');
        }

        $event = $this->eventRepository->update($request->all(), $id);
        if ($request->hasfile('image')) {
            $event->image = uploadImage($request->file('image'), 'images/events/', null, null);
        }
        $event->members_only = $request->has('members_only') ? 1 : 0;
        $event->registration_enabled = $request->has('registration_enabled') ? 1 : 0;
        $event->is_guest_adult = $request->has('is_guest_adult') ? 1 : 0;
        $event->is_guest_child = $request->has('is_guest_child') ? 1 : 0;
        $event->is_adult = $request->has('is_adult') ? 1 : 0;
        $event->is_child = $request->has('is_child') ? 1 : 0;
        
        $additional_fields = array();
        if ($request->has('additional_field1_name')) {
            $additional_fields['field_1']['field_name'] = $request->additional_field1_name;
            $additional_fields['field_1']['field_type'] = $request->additional_field1_type;

            $additional_fields['field_1']['field_options'] = $request->additional_field1_options;
        }
        if ($request->has('additional_field2_name')) {
            $additional_fields['field_2']['field_name'] = $request->additional_field2_name;
            $additional_fields['field_2']['field_type'] = $request->additional_field2_type;

            $additional_fields['field_2']['field_options'] = $request->additional_field2_options;
        }
        $event->additional_fields = $additional_fields;
        $event->save();

        Flash::success('Event updated successfully.');

        return redirect(route('events.index', ['type' => $this->getEventType($request->start_date, $request->end_date)]));
    }

    /**
     * Remove the specified Event from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $event = $this->eventRepository->find($id);

        if (empty($event)) {
            Flash::error('Event not found');

            return redirect(route('events.index'));
        }

        if($event->eventRegistrations->count() > 0) {
            Flash::error('Unable to delete Event. Please delete assigned Event Registrations first.');
        }else{
            if ($event->image != '') {
                removeImage($event->image, 'images/events/');
            }
            $this->eventRepository->delete($id);
            Flash::success('Event deleted successfully.');
        }

        return redirect()->back();
    }
}
