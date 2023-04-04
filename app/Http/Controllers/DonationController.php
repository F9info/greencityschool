<?php

namespace App\Http\Controllers;

use App\Exports\DonationsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\CreateDonationRequest;
use App\Http\Requests\UpdateDonationRequest;
use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\Auth\RegisterController;
use App\Repositories\DonationRepository;
use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\DonationCategory;
use App\Models\PaymentMethod;
use App\Models\Transaction;
use Flash;

class DonationController extends AppBaseController
{
    /** @var DonationRepository $donationRepository*/
    private $donationRepository;

    public function __construct(DonationRepository $donationRepo)
    {
        $this->donationRepository = $donationRepo;
        $this->middleware('admin_permissions:add-donations', ['only' => ['create', 'store']]);
        $this->middleware('admin_permissions:edit-donations', ['only' => ['edit', 'update']]);
        $this->middleware('admin_permissions:delete-donations', ['only' => ['destroy']]);
        $this->middleware('admin_permissions:view-donations', ['only' => ['index', 'show']]);
    }

    /**
     * Display a listing of the Donation.
     */
    public function index(Request $request)
    {
        $categories = DonationCategory::all()->pluck('donation_cause', 'id');

        $donations = getDonations($request)->paginate(10);

        return view('donations.index', compact('categories', 'donations'));
    }

    /**
     * Show the form for creating a new Donation.
     */
    public function create()
    {
        $categories = DonationCategory::all()->pluck('donation_cause', 'id');
        $paymentMethods = PaymentMethod::where('publish', 1)->orderBy('position', 'asc')->get()->pluck('display_name', 'slug');
        return view('donations.create', compact('categories', 'paymentMethods'));
    }

    /**
     * Store a newly created Donation in storage.
     */
    public function store(CreateDonationRequest $request)
    {
        $input = $request->all();

        $register = new RegisterController;
        $pages = new PagesController;

        $donation = $this->donationRepository->create($input);
        $transactionId = $register->userTransactionDetails($request->user_id, $request, $request->transaction_id, $request->payment_status, null);
        $transaction = Transaction::find($transactionId);
        $transaction->donation_id = $donation->id;
        $pages->donationAdminSendMail($donation->id, $transaction->id);
        if ($request->payment_status == 'Success') {
            $pages->donationUserSendMail($donation->id, $transaction->id, $donation->email);
            $donation->mailsent = 1;
        } else {
            $donation->mailsent = 0;
        }
        $donation->save();
        $transaction->save();

        Flash::success('Donation added successfully.');

        return redirect(route('donations.index'));
    }

    /**
     * Display the specified Donation.
     */
    public function show($id)
    {
        $donation = $this->donationRepository->find($id);

        if (empty($donation)) {
            Flash::error('Donation not found');

            return redirect(route('donations.index'));
        }

        return view('donations.show')->with('donation', $donation);
    }

    /**
     * Show the form for editing the specified Donation.
     */
    public function edit($id)
    {
        $categories = DonationCategory::all()->pluck('donation_cause', 'id');
        $donation = $this->donationRepository->find($id);
        $paymentMethods = PaymentMethod::where('publish', 1)->orderBy('position', 'asc')->get()->pluck('display_name', 'slug');
        $transaction = Transaction::where('donation_id', $donation->id)->first();

        if (empty($donation)) {
            Flash::error('Donation not found');

            return redirect(route('donations.index'));
        }

        return view('donations.edit',  compact('categories', 'donation', 'paymentMethods', 'transaction'));
    }

    /**
     * Update the specified Donation in storage.
     */
    public function update($id, UpdateDonationRequest $request)
    {
        $donation = $this->donationRepository->find($id);

        $register = new RegisterController;
        $pages = new PagesController;

        if (empty($donation)) {
            Flash::error('Donation not found');

            return redirect(route('donations.index'));
        }

        $donation = $this->donationRepository->update($request->all(), $id);
        $transaction = $register->userTransactionDetails($request->user_id, $request, $request->transaction_id, $request->payment_status, $request->transactionId);
        if ($request->payment_status == 'Success' && $donation->mailsent == 0) {
            $pages->donationUserSendMail($donation->id, $transaction, $donation->email);
            $donation->mailsent = 1;
        }
        $donation->save();

        Flash::success('Donation updated successfully.');

        return redirect(route('donations.index'));
    }

    /**
     * Remove the specified Donation from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {

        $donation = $this->donationRepository->find($id);

        if (empty($donation)) {
            Flash::error('Donation not found');

            return redirect(route('donations.index'));
        }

        $donation->transaction->delete();
        $this->donationRepository->delete($id);

        Flash::success('Donation deleted successfully.');

        return redirect(route('donations.index'));
    }

    public function export(Request $request)
    {
        return Excel::download(new DonationsExport($request), 'donations.xlsx');
    }
}
