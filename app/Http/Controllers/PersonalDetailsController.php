<?php

namespace App\Http\Controllers;

use App\Exports\MembersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\CreatePersonalDetailsRequest;
use App\Http\Requests\UpdatePersonalDetailsRequest;
use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\ChildDetail;
use App\Models\CommunicationDetail;
use App\Models\MemberInterest;
use App\Models\MembershipType;
use App\Models\PaymentMethod;
use App\Repositories\PersonalDetailsRepository;
use Illuminate\Http\Request;
use App\Models\User;
use Flash;

class PersonalDetailsController extends AppBaseController
{
    /** @var PersonalDetailsRepository $personalDetailsRepository*/
    private $personalDetailsRepository;

    public function __construct(PersonalDetailsRepository $personalDetailsRepo)
    {
        $this->personalDetailsRepository = $personalDetailsRepo;
        
        $this->middleware(['admin_permissions:add-members'])->only(['create', 'store']);
        $this->middleware(['admin_permissions:edit-members'])->only(['edit', 'update']);
        $this->middleware(['admin_permissions:delete-members'])->only(['destroy']);
        $this->middleware(['admin_permissions:view-members'])->only(['index', 'show']);
        $this->middleware('admin');
    }

    /**
     * Display a listing of the PersonalDetails.
     */
    public function index(Request $request)
    {
        $membershiptypes = MembershipType::all()->pluck('membership_name', 'id');
        $memberinterests = MemberInterest::all()->pluck('interests', 'id');
        $personalDetails = getMemberDetails($request)->paginate(10);
        return view('personal_details.index', compact('membershiptypes', 'personalDetails', 'memberinterests'));
    }


    /**
     * Show the form for creating a new PersonalDetails.
     */
    public function create()
    {
        $membershiptypes = MembershipType::all()->pluck('membership_name', 'id');
        $memberInterests = MemberInterest::where('publish', 1)->orderBy('position', 'asc')->get();
        $paymentMethods = PaymentMethod::where('publish', 1)->orderBy('position', 'asc')->get()->pluck('display_name', 'slug');
        return view('personal_details.create', compact('membershiptypes', 'memberInterests', 'paymentMethods'));
    }

    /**
     * Store a newly created PersonalDetails in storage.
     */
    public function store(CreatePersonalDetailsRequest $request)
    {
        $register = new RegisterController;
        $user = $register->create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $request->password,
            'phone_no' => $request->phone_no,
            'expiry_date' => $request->expiry_date
        ]);
        $register->createOrUpdateUserPersonalDetails($user->id, $request, null);
        $register->userCommunicationDetails($user->id, $request, null);
        $register->userTransactionDetails($user->id, $request, $request->transaction_id, $request->payment_status, null);

        $register->sendUserWelcomeMail($user->id);
        $register->sendNewUserAdminMail($user->id);
        if ($request->payment_status == 'Success') {
            $register->sendUserPaymentSuccessMail($user->id);
        }

        Flash::success('Personal Details added successfully.');

        return redirect(route('personalDetails.index'));
    }

    /**
     * Display the specified PersonalDetails.
     */
    public function show($id)
    {
        $personalDetails = $this->personalDetailsRepository->find($id);

        if (empty($personalDetails)) {
            Flash::error('Personal Details not found');

            return redirect(route('personalDetails.index'));
        }

        return view('personal_details.show')->with('personalDetails', $personalDetails);
    }

    /**
     * Show the form for editing the specified PersonalDetails.
     */
    public function edit($id)
    {
        $membershiptypes = MembershipType::all()->pluck('membership_name', 'id');
        $memberInterests = MemberInterest::where('publish', 1)->orderBy('position', 'asc')->get();
        $paymentMethods = PaymentMethod::where('publish', 1)->orderBy('position', 'asc')->get()->pluck('display_name', 'slug');
        $personalDetails = $this->personalDetailsRepository->find($id);
        if (empty($personalDetails)) {
            Flash::error('Personal Details not found');

            return redirect(route('personalDetails.index'));
        }
        $user = User::find($personalDetails->user_id);
        $child_details = ChildDetail::where('user_id', $personalDetails->user_id)->get();
        $communicationDetail = CommunicationDetail::where('user_id', $personalDetails->user_id)->first();
        $transaction = getLatestTransaction($personalDetails->user_id);

        return view('personal_details.edit', compact('personalDetails', 'membershiptypes', 'memberInterests', 'paymentMethods', 'user', 'child_details', 'communicationDetail', 'transaction'));
    }

    /**
     * Update the specified PersonalDetails in storage.
     */
    public function update($id, UpdatePersonalDetailsRequest $request)
    {
        $personalDetails = $this->personalDetailsRepository->find($id);

        if (empty($personalDetails)) {
            Flash::error('Personal Details not found');

            return redirect(route('personalDetails.index'));
        }

        $register = new RegisterController;
        $register->updateUser($personalDetails->user_id, $request->first_name, $request->last_name, $request->email, $request->phone_no);
        $user = User::find($personalDetails->user_id);
        $user->expiry_date = $request->expiry_date;
        $user->save();
        $register->createOrUpdateUserPersonalDetails($personalDetails->user_id, $request, $request->personalDetailsId);
        $register->userCommunicationDetails($personalDetails->user_id, $request, $request->communicationDetailId);
        $register->userTransactionDetails($personalDetails->user_id, $request, $request->transaction_id, $request->payment_status, $request->transactionId);

        if ($request->payment_status == 'Success' && $personalDetails->user->mailsent == 0) {
            $register->sendUserPaymentSuccessMail($personalDetails->user_id);
        }
        if ($request->payment_status == 'Success' && $personalDetails->user->mailsent == 1 && $personalDetails->user->renewal_success_mail_sent == 0) {
            $register->sendRenewalUserMail($personalDetails->user_id);
            $user = User::find($personalDetails->user_id);
            $user->renewal_success_mail_sent = 1;
            $user->save();
        }

        Flash::success('Personal Details updated successfully.');

        return redirect(route('personalDetails.index'));
    }

    /**
     * Remove the specified PersonalDetails from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $personalDetails = $this->personalDetailsRepository->find($id);

        if (empty($personalDetails)) {
            Flash::error('Personal Details not found');

            return redirect(route('personalDetails.index'));
        }

        // $register = new RegisterController;
        // $register->deleteRegisterDataDetails($personalDetails->user_id);
        $personalDetails->user->childDetails()->delete();
        $personalDetails->user->personalDetails()->delete();
        $personalDetails->user->communicationDetail()->delete();
        $personalDetails->user->transactions()->delete();
        $personalDetails->user->eventRegistrations()->delete();
        $personalDetails->user->donations()->delete();
        $personalDetails->user->delete();

        Flash::success('Personal Details deleted successfully.');

        return redirect(route('personalDetails.index'));
    }

    public function getMembershipTypeDetails(Request $request)
    {
        $membershipType = MembershipType::find($request->membership_type_id);
        $register = new RegisterController;
        $expiry = $register->getExpiryDate($request->membership_type_id);
        $expiry_date = $expiry != null ? date('Y-m-d', strtotime($expiry)) : null;
        $details = [$membershipType->price, $expiry_date];
        return $details;
    }

    public function export(Request $request)
    {
        return Excel::download(new MembersExport($request), 'members.xlsx');
    }
}
