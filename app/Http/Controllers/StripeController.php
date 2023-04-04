<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PagesController;
use App\Models\Donation;
use App\Models\EventRegistration;
use App\Models\PersonalDetails;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Stripe;
use Flash;
use DB;

class StripeController extends Controller
{
    public function createCharge(Request $request)
    {
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
        }
        if ($request->type == 'renewal') {
            $user = User::find($request->user_id);
            $description = "CAA - Member Renewal";
        }
        if ($request->type == 'eventregistration') {
            $eventRegistration = $pages->createEventRegistration($request);
            $description = "CAA - Event Registration";
        }
        if ($request->type == 'donation') {
            $donation = $pages->createDonation($request);
            $description = "CAA - Donation";
        }
        Stripe\Stripe::setApiKey(getStripeSecret());
        try {
            $stripe = Stripe\Charge::create([
                "amount" => $request->amount * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => $description
            ]);
            $userTransactionDetail = $register->userTransactionDetails(isset($user) ? $user->id : null, $request, $stripe->id, 'Success', null);

            if ($request->type == 'membership') {
                $register->sendUserWelcomeMail($user->id);
                $register->sendNewUserAdminMail($user->id);
                $register->sendUserPaymentSuccessMail($user->id);
                return redirect(url('/'))->with('memberId', $user->id);
            }
            if ($request->type == 'renewal') {
                $register->updateRenewalDetails($user->id, $request->membership_type_id, 'Success');
                $register->sendRenewalUserMail($user->id);
                $register->sendRenewalAdminMail($user->id);
                return redirect(url('/home'))->with('renewal', 'success');
            }
            if ($request->type == 'eventregistration') {
                $event_reg_detail = EventRegistration::find($eventRegistration);
                $transaction = Transaction::find($userTransactionDetail);
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
                $donationDetails = Donation::find($donation);
                $transaction = Transaction::find($userTransactionDetail);
                $transaction->donation_id = $donationDetails->id;
                $transaction->save();
                $pages->donationAdminSendMail($donation, $transaction->id);
                $pages->donationUserSendMail($donation, $transaction->id, $donationDetails->email);
                $donationDetails->mailsent = 1;
                $donationDetails->save();
                return redirect(url('success'))->with('donation_id', $donationDetails->id);
            }
        } catch (\Stripe\Exception\CardException $e) {
            if ($request->type == 'membership') {
                $register->deleteRegisterDataDetails($user->id);
            }
            if ($request->type == 'eventregistration') {
                EventRegistration::find($eventRegistration)->delete();
            }
            if ($request->type == 'donation') {
                Donation::find($donation)->delete();
            }
            Flash::error($e->getError()->message);
            return redirect()->back();
        } catch (\Stripe\Exception\RateLimitException $e) {
            if ($request->type == 'membership') {
                $register->deleteRegisterDataDetails($user->id);
            }
            if ($request->type == 'eventregistration') {
                EventRegistration::find($eventRegistration)->delete();
            }
            if ($request->type == 'donation') {
                Donation::find($donation)->delete();
            }
            Flash::error('Too many requests made to the API too quickly');
            return redirect()->back();
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            if ($request->type == 'membership') {
                $register->deleteRegisterDataDetails($user->id);
            }
            if ($request->type == 'eventregistration') {
                EventRegistration::find($eventRegistration)->delete();
            }
            if ($request->type == 'donation') {
                Donation::find($donation)->delete();
            }
            Flash::error("Invalid parameters were supplied to Stripe's API");
            return redirect()->back();
        } catch (\Stripe\Exception\AuthenticationException $e) {
            if ($request->type == 'membership') {
                $register->deleteRegisterDataDetails($user->id);
            }
            if ($request->type == 'eventregistration') {
                EventRegistration::find($eventRegistration)->delete();
            }
            if ($request->type == 'donation') {
                Donation::find($donation)->delete();
            }
            Flash::error("Authentication with Stripe's API failed");
            return redirect()->back();
        } catch (\Stripe\Exception\ApiConnectionException $e) {
            if ($request->type == 'membership') {
                $register->deleteRegisterDataDetails($user->id);
            }
            if ($request->type == 'eventregistration') {
                EventRegistration::find($eventRegistration)->delete();
            }
            if ($request->type == 'donation') {
                Donation::find($donation)->delete();
            }
            Flash::error('Network communication with Stripe failed');
            return redirect()->back();
        } catch (\Stripe\Exception\ApiErrorException $e) {
            if ($request->type == 'membership') {
                $register->deleteRegisterDataDetails($user->id);
            }
            if ($request->type == 'eventregistration') {
                EventRegistration::find($eventRegistration)->delete();
            }
            if ($request->type == 'donation') {
                Donation::find($donation)->delete();
            }
            Flash::error('Display a very generic error to the user, and maybe send yourself an email');
            return redirect()->back();
        } catch (Exception $e) {
            if ($request->type == 'membership') {
                $register->deleteRegisterDataDetails($user->id);
            }
            if ($request->type == 'eventregistration') {
                EventRegistration::find($eventRegistration)->delete();
            }
            if ($request->type == 'donation') {
                Donation::find($donation)->delete();
            }
            Flash::error('Something else happened, completely unrelated to Stripe');
            return redirect()->back();
        }
    }
}
