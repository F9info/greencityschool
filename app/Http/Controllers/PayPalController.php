<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PagesController;
use App\Models\Donation;
use App\Models\Event;
use App\Models\EventRegistration;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Flash;

class PayPalController extends Controller
{
    /**
     * process transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public $config;

    public function __construct()
    {
        $this->config = [
            'mode'    => strtolower(applicationSettings('payment-mode')), // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
            'sandbox' => [
                'client_id'         => getPaypalSandboxKey(),
                'client_secret'     => getPaypalSandboxSecret(),
                'app_id'            => 'APP-80W284485P519543T',
            ],
            'live' => [
                'client_id'         => getPaypalLiveKey(),
                'client_secret'     => getPaypalLiveSecret(),
                'app_id'            => '',
            ],

            'payment_action' => env('PAYPAL_PAYMENT_ACTION', 'Sale'), // Can only be 'Sale', 'Authorization' or 'Order'
            'currency'       => env('PAYPAL_CURRENCY', 'USD'),
            'notify_url'     => env('PAYPAL_NOTIFY_URL', ''), // Change this accordingly for your application.
            'locale'         => env('PAYPAL_LOCALE', 'en_US'), // force gateway language  i.e. it_IT, es_ES, en_US ... (for express checkout only)
            'validate_ssl'   => env('PAYPAL_VALIDATE_SSL', true), // Validate SSL when creating api client.
        ];
    }

    public function processTransaction(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials($this->config);
        $paypalToken = $provider->getAccessToken();
        $register = new RegisterController;
        $pages = new PagesController;
        if ($request->type == 'membership') {
            $expiry_date = $register->getExpiryDate($request->membership_type_id);
            $user = $register->create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => $request->password,
                'phone_no' => $request->phone_no,
                'expiry_date' => $expiry_date
            ]);
            $userPersonalDetail = $register->createOrUpdateUserPersonalDetails($user->id, $request, null);
            $communicationDetail = $register->userCommunicationDetails($user->id, $request, null);
            $description = "CAA - New Member Registration";
            $userTransactionDetail = $register->userTransactionDetails($user->id, $request, 'token', 'Pending', null);
            $successParameters = ['transaction_id' => $userTransactionDetail, 'type' => $request->type];
            $cancleParameters = ['user_id' => $user->id, 'type' => $request->type];
        }
        if ($request->type == 'renewal') {
            $description = "CAA - Member Renewal";
            $userTransactionDetail = $register->userTransactionDetails($request->user_id, $request, 'token', 'Pending', null);
            $successParameters = ['transaction_id' => $userTransactionDetail, 'type' => $request->type, 'membership_type_id' => $request->membership_type_id];
            $cancleParameters = ['transaction_id' => $userTransactionDetail, 'type' => $request->type];
        }
        if ($request->type == 'eventregistration') {
            $description = "CAA - Event Registration";
            $eventRegistration = $pages->createEventRegistration($request);
            $userTransactionDetail = $register->userTransactionDetails($request->user_id != null ? $request->user_id : null, $request, 'token', 'Pending', null);
            $successParameters = ['transaction_id' => $userTransactionDetail, 'type' => $request->type, 'eventRegistration' => $eventRegistration];
            $cancleParameters = ['transaction_id' => $userTransactionDetail, 'type' => $request->type, 'eventRegistration' => $eventRegistration, 'event_id' => $request->event_id];
        }
        if ($request->type == 'donation') {
            $description = "CAA - Donation";
            $donation = $pages->createDonation($request);
            $userTransactionDetail = $register->userTransactionDetails($request->user_id != null ? $request->user_id : null, $request, 'token', 'Pending', null);
            $successParameters = ['transaction_id' => $userTransactionDetail, 'type' => $request->type, 'donation' => $donation];
            $cancleParameters = ['transaction_id' => $userTransactionDetail, 'type' => $request->type, 'donation' => $donation];
        }
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('successTransaction', $successParameters),
                "cancel_url" => route('cancelTransaction', $cancleParameters),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $request->amount
                    ],
                    "description" => $description
                ]
            ]
        ]);
        if (isset($response['id']) && $response['id'] != null) {
            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }
            Flash::error('Something went wrong.');
            if ($request->type == 'membership') {
                $register->deleteRegisterDataDetails($user->id);
                return redirect()
                    ->route('register')
                    ->with('error', 'Something went wrong.');
            }
            if ($request->type == 'renewal') {
                Transaction::find($userTransactionDetail)->delete();
                return redirect(url('/home?tab=renew'))->with('error', 'Something went wrong.');
            }
            if ($request->type == 'eventregistration') {
                $event = Event::find($request->event_id);
                Transaction::find($userTransactionDetail)->delete();
                EventRegistration::find($eventRegistration)->delete();
                return redirect(url('/event-registration/' . $event->slug))->with('error', 'Something went wrong.');
            }
            if ($request->type == 'donation') {
                Donation::find($donation)->delete();
                return redirect(url('/donate'))->with('error', 'Something went wrong.');
            }
        } else {
            Flash::error('Something went wrong.');
            if ($request->type == 'membership') {
                $register->deleteRegisterDataDetails($user->id);
                return redirect()
                    ->route('register')
                    ->with('error', $response['message'] ?? 'Something went wrong.');
            }
            if ($request->type == 'renewal') {
                Transaction::find($userTransactionDetail)->delete();
                return redirect(url('/home?tab=renew'))->with('error', 'Something went wrong.');
            }
            if ($request->type == 'eventregistration') {
                $event = Event::find($request->event_id);
                Transaction::find($userTransactionDetail)->delete();
                EventRegistration::find($eventRegistration)->delete();
                return redirect(url('/event-registration/' . $event->slug))->with('error', 'Something went wrong.');
            }
            if ($request->type == 'donation') {
                Donation::find($donation)->delete();
                return redirect(url('/donate'))->with('error', 'Something went wrong.');
            }
        }
    }
    /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function successTransaction(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials($this->config);
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $transaction = Transaction::find($request->transaction_id);
            $transaction->transaction_id = $request['token'];
            $transaction->payment_status = 'Success';
            $transaction->save();

            $register = new RegisterController;
            $pages = new PagesController;
            if ($request->type == 'membership') {
                $register->sendUserWelcomeMail($transaction->user_id);
                $register->sendNewUserAdminMail($transaction->user_id);
                $register->sendUserPaymentSuccessMail($transaction->user_id);
                return redirect(url('/'))->with('memberId', $transaction->user_id);
            }
            if ($request->type == 'renewal') {
                $register->updateRenewalDetails($transaction->user_id, $request->membership_type_id, 'Success');
                $register->sendRenewalUserMail($transaction->user_id);
                $register->sendRenewalAdminMail($transaction->user_id);
                return redirect(url('/home'))->with('renewal', 'success');
            }
            if ($request->type == 'eventregistration') {
                $event_reg_detail = EventRegistration::find($request->eventRegistration);
                $transaction = Transaction::find($request->transaction_id);
                $transaction->event_id = $event_reg_detail->event_id;
                $transaction->event_registration_id = $event_reg_detail->id;
                $transaction->user_id = $event_reg_detail->user_id;
                $pages->eventPaidUserSendMail($event_reg_detail->id, $transaction->id, $event_reg_detail->email);
                $pages->eventPaidAdminSendMail($event_reg_detail->id, $transaction->id);
                $event_reg_detail->mailsent = 1;

                $transaction->save();
                $event_reg_detail->save();
                return redirect(url('/'))->with('eventregistration', 'success');
            }
            if ($request->type == 'donation') {
                $donation = Donation::find($request->donation);
                $transaction = Transaction::find($request->transaction_id);
                $transaction->donation_id = $donation->id;
                $transaction->save();
                $pages->donationAdminSendMail($donation->id, $transaction->id);
                $pages->donationUserSendMail($donation->id, $transaction->id, $donation->email);
                $donation->mailsent = 1;
                $donation->save();
                return redirect(url('success'))->with('donation_id', $request->donation);
            }
        } else {
            return redirect()
                ->back()
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }
    /**
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransaction(Request $request)
    {
        $register = new RegisterController;
        Flash::error('You have canceled the transaction.');
        if ($request->type == 'membership') {
            $register->deleteRegisterDataDetails($request->user_id);
            return redirect(url('/register'));
        }
        if ($request->type == 'renewal') {
            $register->deleteTransactionDetails($request->transaction_id);
            return redirect(url('/home?tab=renew'));
        }
        if ($request->type == 'eventregistration') {
            $event = Event::find($request->event_id);
            Transaction::find($request->transaction_id)->delete();
            EventRegistration::find($request->eventRegistration)->delete();
            return redirect(url('/event-registration/' . $event->slug))->with('error', 'Something went wrong.');
        }
        if ($request->type == 'donation') {
            Donation::find($request->donation)->delete();
            return redirect(url('/donate'))->with('error', 'Something went wrong.');
        }
    }
}
