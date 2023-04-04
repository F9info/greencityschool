<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisterController;
use App\Models\ChildDetail;
use App\Models\CommunicationDetail;
use App\Models\EventRegistration;
use App\Models\MemberInterest;
use App\Models\MembershipType;
use App\Models\PaymentMethod;
use App\Models\PersonalDetails;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $memberInterests = MemberInterest::where('publish', 1)->orderBy('position', 'asc')->get();
        $personalDetails = PersonalDetails::where('user_id', Auth::user()->id)->first();
        $user = User::find(Auth::user()->id);
        $child_details = ChildDetail::where('user_id', Auth::user()->id)->get();
        $communicationDetail = CommunicationDetail::where('user_id', Auth::user()->id)->first();
        $membershipTypes = MembershipType::where('publish', 1)->orderBy('position', 'asc')->get();
        $paymentMethods = PaymentMethod::select('display_name', 'slug')->where('publish', 1)->orderBy('position', 'asc')->get();
        $eventRegistrations = EventRegistration::where('user_id', Auth::user()->id)->latest()->paginate(10);

        $transaction = getLatestTransaction($user->id);
        return view('home', compact('personalDetails', 'user', 'child_details', 'memberInterests', 'communicationDetail', 'membershipTypes', 'paymentMethods', 'transaction', 'eventRegistrations'));
    }

    public function renewMembership(Request $request)
    {
        $register = new RegisterController;
        if ($request->payment_method == 'quickpay') {
            $transaction_id = $request->quick_pay_ref_id;
        } elseif ($request->payment_method == 'cheque') {
            $transaction_id = $request->cheque_pay_ref_id;
        }
        $register->userTransactionDetails($request->user_id, $request, $transaction_id, 'Pending', null);
        $register->updateRenewalDetails($request->user_id, $request->membership_type_id, 'Pending');
        $register->sendRenewalAdminMail($request->user_id);
        return redirect(url('/home'))->with('renewal', 'success');
    }
}
