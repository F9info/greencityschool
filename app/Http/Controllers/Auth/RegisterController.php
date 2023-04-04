<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\DynamicEmail;
use App\Models\ChildDetail;
use App\Models\CommunicationDetail;
use App\Models\MailTemplates;
use App\Models\MemberInterest;
use App\Models\MembershipType;
use App\Models\PaymentMethod;
use App\Models\PersonalDetails;
use App\Models\Transaction;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */

    public function getExpiryDate($membership_type_id)
    {
        $membershipType = MembershipType::find($membership_type_id);
        $expiry_date = null;
        if ($membershipType->lifetime == 1) {
            $expiry_date = null;
        } elseif ($membershipType->months != '') {
            $expiry_date = date('Y-m-d', strtotime(Carbon::now() . ' + ' . $membershipType->months . ' months'));
        } elseif ($membershipType->expiry_date != '') {
            $expiry_date = $membershipType->expiry_date;
        }
        return $expiry_date;
    }
    public function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone_no' => $data['phone_no'],
            'password' => Hash::make($data['password']),
            'expiry_date' => $data['expiry_date'],
        ]);
    }
    public function updateUser($user_id, $first_name, $last_name, $email, $phone_no)
    {
        $user = User::find($user_id);
        $user->first_name = $first_name;
        $user->last_name = $last_name;
        $user->email = $email;
        $user->phone_no = $phone_no;
        $user->save();
    }

    public function createOrUpdateUserPersonalDetails($userId, $request, $pid)
    {
        if ($pid != NULL) {
            $personal_details = PersonalDetails::find($pid);
        } else {
            $personal_details = new PersonalDetails();
        }
        $personal_details->user_id = $userId;
        $personal_details->gender = $request->gender;
        $personal_details->date_of_birth = $request->date_of_birth;
        $personal_details->wedding_anniversary = $request->wedding_anniversary;
        $personal_details->address = $request->address;
        $personal_details->state = $request->state;
        $personal_details->city = $request->city;
        $personal_details->zipcode = $request->zipcode;
        $personal_details->native_state = $request->native_state;
        $personal_details->native_district = $request->native_state != "Other" ? $request->native_district : $request->native_district_other;
        $personal_details->native_city = $request->native_city;
        $personal_details->spouse_first_name = $request->spouse_first_name;
        $personal_details->spouse_last_name = $request->spouse_last_name;
        $personal_details->spouse_gender = $request->spouse_gender;
        $personal_details->spouse_date_of_birth = $request->spouse_date_of_birth;
        $personal_details->spouse_native_state = $request->spouse_native_state;
        $personal_details->spouse_native_district = $request->spouse_native_state != "Other" ? $request->spouse_native_district : $request->spouse_native_district_other;
        $personal_details->spouse_native_city = $request->spouse_native_city;
        $personal_details->member_interests = json_encode($request->member_interests);
        $personal_details->spouse_interests = json_encode($request->spouse_interests);
        $personal_details->child_interests = json_encode($request->child_interests);
        $personal_details->membership_type_id = $request->membership_type_id;
        $personal_details->save();
        if ($pid != NULL) {
            ChildDetail::where('user_id', $userId)->delete();
        }
        if ($request->child_name != '') {
            for ($i = 0; $i < count($request->child_name); $i++) {
                if ($request->child_name[$i] != '' && $request->child_age[$i] != '') {
                    $child_detail = new ChildDetail();
                    $child_detail->user_id = $userId;
                    $child_detail->child_name = $request->child_name[$i];
                    $child_detail->age = $request->child_age[$i];
                    $child_detail->gender = $request->child_gender[$i];
                    $child_detail->date_of_birth = $request->child_birth[$i];
                    $child_detail->save();
                }
            }
        }
    }

    public function userTransactionDetails($userId, $request, $transaction_id, $status, $tid)
    {
        $payment_method = PaymentMethod::where('slug', $request->payment_method)->first();
        if ($tid != null) {
            $transaction = Transaction::find($tid);
        } else {
            $transaction = new Transaction();
        }
        $transaction->reference = $request->type;
        $transaction->amount = $request->amount;
        $transaction->transaction_date = Carbon::now();
        $transaction->payment_method_id = $payment_method != null ? $payment_method->id : null;
        $transaction->user_id = $userId;
        if ($request->payment_method == 'cheque') {
            $transaction->bank_name = $request->bank_name;
            $transaction->cheque_no = $request->cheque_no;
            $transaction->cheque_date = $request->cheque_date;
            $transaction->cheque_amount = $request->cheque_amount;
        }
        $transaction->transaction_id = $transaction_id;
        $transaction->payment_status = $status;
        $transaction->admin_comment = $request->admin_comment;
        $transaction->user_comment = $request->user_comment;
        $transaction->save();
        return $transaction->id;
    }

    public function userCommunicationDetails($userId, $request, $cid)
    {
        if ($cid != null) {
            $communicationDetails = CommunicationDetail::find($cid);
        } else {
            $communicationDetails = new CommunicationDetail();
        }
        $communicationDetails->user_id = $userId;
        $communicationDetails->facebook = $request->has('communication_facebook') ? 1 : 0;
        $communicationDetails->twitter = $request->has('communication_twitter') ? 1 : 0;
        $communicationDetails->instagram = $request->has('communication_instagram') ? 1 : 0;
        $communicationDetails->whatsapp = $request->has('communication_whatsapp') ? 1 : 0;
        $communicationDetails->email = $request->has('communication_email') ? 1 : 0;
        $communicationDetails->terms_and_conditions = 1;
        $communicationDetails->save();
    }

    public function deleteRegisterDataDetails($userId)
    {
        Transaction::where('user_id', $userId)->delete();
        CommunicationDetail::where('user_id', $userId)->delete();
        ChildDetail::where('user_id', $userId)->delete();
        PersonalDetails::where('user_id', $userId)->delete();
        User::find($userId)->delete();
    }
    public function deleteTransactionDetails($id)
    {
        Transaction::find($id)->delete();
    }

    public function showRegistrationForm()
    {
        $membershipTypes = MembershipType::where('publish', 1)->orderBy('position', 'asc')->get();
        $memberInterests = MemberInterest::where('publish', 1)->orderBy('position', 'asc')->get();
        $paymentMethods = PaymentMethod::select('display_name', 'slug')->where('publish', 1)->orderBy('position', 'asc')->get();
        return view('auth.register', compact('paymentMethods', 'membershipTypes', 'memberInterests'));
    }

    public function register(Request $request)
    {
        $expiry_date = $this->getExpiryDate($request->membership_type_id);
        $user = $this->create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $request->password,
            'phone_no' => $request->phone_no,
            'expiry_date' => $expiry_date
        ]);
        $userPersonalDetail = $this->createOrUpdateUserPersonalDetails($user->id, $request, null);

        if ($request->payment_method == 'quickpay') {
            $transaction_id = $request->quick_pay_ref_id;
        } elseif ($request->payment_method == 'cheque') {
            $transaction_id = $request->cheque_pay_ref_id;
        }
        $transaction = $this->userTransactionDetails($user->id, $request, $transaction_id, 'Pending', null);
        $communicationDetails = $this->userCommunicationDetails($user->id, $request, null);
        $this->sendUserWelcomeMail($user->id);
        $this->sendNewUserAdminMail($user->id);
        return redirect(url('/'))->with('memberId', $user->id);
    }

    public function updateRenewalDetails($user_id, $membership_type_id, $payment_success)
    {
        $expiry_date = $this->getExpiryDate($membership_type_id);
        $user = User::find($user_id);
        $user->expiry_date = $expiry_date;
        if ($payment_success == 'Success') {
            $user->renewal_success_mail_sent = 1;
        }
        if ($payment_success == 'Pending') {
            $user->renewal_success_mail_sent = 0;
        }
        $user->renewal_reminder_mail_sent = null;
        $user->renewal_reminder_mail_sent_date = null;
        $user->save();

        $userPersonalDetail = PersonalDetails::where('user_id', $user->id)->first();
        $userPersonalDetail->membership_type_id = $membership_type_id;
        $userPersonalDetail->save();
    }

    public function sendUserWelcomeMail($user_id)
    {
        $user = User::find($user_id);
        $mailTemplate = MailTemplates::where('heading', 'Thank You For Becoming A Member')->first();

        $variable = ["[Full Name]", "[MEMBER ID]"];
        $replace   = [$user->first_name . " " . $user->last_name, $user_id];
        $finalTemplate = str_replace($variable, $replace, $mailTemplate->description);
        Mail::to($user->email)->send(new DynamicEmail($mailTemplate->subject, $finalTemplate));
    }

    public function sendNewUserAdminMail($user_id)
    {
        $user = User::find($user_id);
        $personal_details = PersonalDetails::select('membership_type_id')->where('user_id', $user_id)->first();

        $mailTemplate = MailTemplates::where('heading', 'Member Registration for admin')->first();
        $variable = ["[MemberID]", "[Membership Type]", "[First Name]", "[Last Name]", "[Email]", "[Mobile]"];
        $replace   = [$user_id, $personal_details->membershipType->membership_name, $user->first_name, $user->last_name, $user->email, $user->phone_no];
        $finalTemplate = str_replace($variable, $replace, $mailTemplate->description);
        Mail::to(applicationSettings('admin-mail'))->send(new DynamicEmail($mailTemplate->subject, $finalTemplate));
    }

    public function replaceMailTransactionDetails($user_id, $template)
    {
        $user = User::find($user_id);
        $personal_details = PersonalDetails::select('membership_type_id')->where('user_id', $user_id)->first();
        $transaction = getLatestTransaction($user_id);
        $variable = ["[Full Name]", "[First Name]", "[LastName]", "[MemberID]", "[Member Type]", "[Payment Date]", "[Transaction ID]", "[Amount]", "[Payment Status]", "[Payment Method]"];
        $replace   = [$user->first_name . " " . $user->last_name, $user->first_name, $user->last_name, $user_id, $personal_details->membershipType->membership_name, formatDate($transaction->transaction_date), $transaction->transaction_id, formatAmount($transaction->amount), $transaction->payment_status, $transaction->paymentMethod->payment_method_name];
        $finalTemplate = str_replace($variable, $replace, $template);
        return $finalTemplate;
    }

    public function sendUserPaymentSuccessMail($user_id)
    {
        $user = User::find($user_id);
        $mailTemplate = MailTemplates::where('heading', 'Member Registration')->first();
        $finalTemplate = $this->replaceMailTransactionDetails($user_id, $mailTemplate->description);
        Mail::to($user->email)->send(new DynamicEmail($mailTemplate->subject, $finalTemplate));
        $user->mailsent = 1;
        $user->save();
    }

    public function sendRenewalUserMail($user_id)
    {
        $user = User::find($user_id);
        $mailTemplate = MailTemplates::where('heading', 'Invitation To Renewal Member')->first();
        $finalTemplate = $this->replaceMailTransactionDetails($user_id, $mailTemplate->description);
        Mail::to($user->email)->send(new DynamicEmail(str_replace("[MEMBERID]", " - " . $user_id, $mailTemplate->subject), $finalTemplate));
    }

    public function sendRenewalAdminMail($user_id)
    {
        $mailTemplate = MailTemplates::where('heading', 'Renewal Membership Admin')->first();
        $finalTemplate = $this->replaceMailTransactionDetails($user_id, $mailTemplate->description);
        Mail::to(applicationSettings('admin-mail'))->send(new DynamicEmail($mailTemplate->subject, $finalTemplate));
    }
}
