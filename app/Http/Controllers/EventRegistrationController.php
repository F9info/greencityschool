<?php

namespace App\Http\Controllers;

use App\Exports\EventRegistrationMultiSheet;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\CreateEventRegistrationRequest;
use App\Http\Requests\UpdateEventRegistrationRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Event;
use App\Repositories\EventRegistrationRepository;
use Illuminate\Http\Request;
use App\Models\EventRegistration;
use App\Models\PaymentMethod;
use App\Models\Transaction;
use Flash;

class EventRegistrationController extends AppBaseController
{
    /** @var EventRegistrationRepository $eventRegistrationRepository*/
    private $eventRegistrationRepository;

    public function __construct(EventRegistrationRepository $eventRegistrationRepo)
    {
        $this->eventRegistrationRepository = $eventRegistrationRepo;

        $this->middleware(['admin_permissions:add-event-registrations'])->only(['create', 'store']);
        $this->middleware(['admin_permissions:edit-event-registrations'])->only(['edit', 'update']);
        $this->middleware(['admin_permissions:delete-event-registrations'])->only(['destroy']);
        $this->middleware(['admin_permissions:view-event-registrations'])->only(['index', 'show']);
        $this->middleware('admin');
    }

    /**
     * Display a listing of the EventRegistration.
     */
    public function index(Request $request)
    {
        $paymentMethods = PaymentMethod::all()->pluck('payment_method_name', 'id');
        $events = Event::all();
        $eventRegistrations = getEventRegistrationDetails($request)->paginate(10);

        return view('event_registrations.index', compact('events', 'eventRegistrations', 'paymentMethods'));
    }

    /**
     * Show the form for creating a new EventRegistration.
     */
    public function create()
    {
        $eventnames = eventRegistration::all()->pluck('event_name', 'id');
        return view('event_registrations.create', compact('eventnames'));
    }

    /**
     * Store a newly created EventRegistration in storage.
     */
    public function store(CreateEventRegistrationRequest $request)
    {
        $input = $request->all();

        $eventRegistration = $this->eventRegistrationRepository->create($input);

        Flash::success('Event Registration saved successfully.');

        return redirect(route('eventRegistrations.index'));
    }

    /**
     * Display the specified EventRegistration.
     */
    public function show($id)
    {
        $eventRegistration = $this->eventRegistrationRepository->find($id);

        if (empty($eventRegistration)) {
            Flash::error('Event Registration not found');

            return redirect(route('eventRegistrations.index'));
        }

        return view('event_registrations.show')->with('eventRegistration', $eventRegistration);
    }

    /**
     * Show the form for editing the specified EventRegistration.
     */
    public function edit($id)
    {
        $eventRegistration = $this->eventRegistrationRepository->find($id);
        $event = Event::find($eventRegistration->event_id);
        $paymentMethods = PaymentMethod::where('publish', 1)->orderBy('position', 'asc')->get()->pluck('display_name', 'slug');
        $transaction = Transaction::where('event_registration_id', $eventRegistration->id)->first();

        if (empty($eventRegistration)) {
            Flash::error('Event Registration not found');

            return redirect(route('eventRegistrations.index'));
        }

        return view('event_registrations.edit', compact('eventRegistration', 'event', 'paymentMethods', 'transaction'));
    }

    /**
     * Update the specified EventRegistration in storage.
     */
    public function update($id, UpdateEventRegistrationRequest $request)
    {
        $eventRegistration = $this->eventRegistrationRepository->find($id);

        if (empty($eventRegistration)) {
            Flash::error('Event Registration not found');

            return redirect(route('eventRegistrations.index'));
        }

        // $eventRegistration = $this->eventRegistrationRepository->update($request->all(), $id);
        $eventRegistration->first_name = $request->first_name;
        $eventRegistration->last_name = $request->last_name;
        $eventRegistration->email = $request->email;
        $eventRegistration->phone = $request->phone;
        $eventRegistration->address = $request->address;
        $eventRegistration->state = $request->state;
        $eventRegistration->city = $request->city;
        $eventRegistration->zipcode = $request->zipcode;
        $eventRegistration->adult_count = $request->adult_count;
        $eventRegistration->child_count = $request->child_count;
        $eventRegistration->guest_adult_count = $request->guest_adult_count;
        $eventRegistration->guest_child_count = $request->guest_child_count;

        $transaction = Transaction::find($request->tid);
        $paymentMethod = PaymentMethod::where('payment_method_name', $request->payment_method)->first();
        $transaction->payment_method_id = $paymentMethod != '' ? $paymentMethod->id : null;
        $transaction->transaction_date = $request->transaction_date;
        $transaction->payment_status = $request->payment_status;
        $transaction->transaction_id = $request->transaction_id;
        $transaction->bank_name = $request->bank_name;
        $transaction->cheque_no = $request->cheque_no;
        $transaction->cheque_date = $request->cheque_date;
        $transaction->cheque_amount = $request->cheque_amount;
        if ($request->payment_status == 'Success' && $eventRegistration->mailsent == 0) {
            $pages = new PagesController;
            $pages->eventPaidUserSendMail($eventRegistration->id, $transaction->id, $eventRegistration->email);
            $eventRegistration->mailsent = 1;
        }

        $eventRegistration->save();
        $transaction->save();

        Flash::success('Event Registration updated successfully.');

        return redirect(route('eventRegistrations.index'));
    }

    /**
     * Remove the specified EventRegistration from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $eventRegistration = $this->eventRegistrationRepository->find($id);

        if (empty($eventRegistration)) {
            Flash::error('Event Registration not found');

            return redirect(route('eventRegistrations.index'));
        }

        $eventRegistration->transaction->delete();
        $this->eventRegistrationRepository->delete($id);

        Flash::success('Event Registration deleted successfully.');

        return redirect(route('eventRegistrations.index'));
    }

    public function export(Request $request)
    {
        return Excel::download(new EventRegistrationMultiSheet($request), 'event-registrations.xlsx');
    }
}
