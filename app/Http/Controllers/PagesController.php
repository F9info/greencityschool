<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Mail\DynamicEmail;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\ChildDetail;
use App\Models\Cms;
use App\Models\Slider;
use App\Models\CommitteeCategory;
use App\Models\Donation;
use App\Models\DonationCategory;
use App\Models\News;
use App\Models\NewsCoverageCategory;
use App\Models\PhotoGalleryCategory;
use App\Models\VideoGalleryCategory;
use App\Models\Enquiry;
use App\Models\Event;
use App\Models\EventRegistration;
use App\Models\MailTemplates;
use App\Models\PaymentMethod;
use App\Models\PersonalDetails;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Transaction;
use App\Models\User;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;
use Newsletter;
use Mail;
use PDF;
class PagesController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('publish', 1)->orderBy('position', 'asc')->get();
        $news = News::where('publish', 1)->orderBy('position', 'asc')->get();
        $events = $this->getEvents('upcoming')->get();
        $photoCategories = PhotoGalleryCategory::where('name', 'Home Page')->orderBy('position', 'asc')->get();
        $category = ServiceCategory::where('name', 'Amenities')->first();
        $services = $category != null ? Service::where('service_category_id', $category->id)->latest()->limit(4)->get() : null;
        return view('pages.index', compact('sliders', 'news', 'events', 'photoCategories','category','services'));
    }
    public function innerPageView($slug)
    {
        $page = Cms::where('slug', $slug)->FirstOrFail();
        $trusteeCategory = CommitteeCategory::where('name', 'Trustees')->first();
        $trustees = $trusteeCategory != null ? getCommitteeMembers($trusteeCategory->id) : null;
        $executiveCommittee = CommitteeCategory::where('name', 'Executive Committee')->first();
        $executiveCommittees = $executiveCommittee != null ? getCommitteeMembers($executiveCommittee->id) : null;
        $boardMember = CommitteeCategory::where('name', 'Board Members')->first();
        $boardMembers = $boardMember != null ? getCommitteeMembers($boardMember->id) : null;
        $cafogst = CommitteeCategory::where('name', 'CAF Organization Structure')->first();
        $cafogsts = $cafogst != null ? getCommitteeMembers($cafogst->id) : null;
        $photoCategories = PhotoGalleryCategory::where('name', 'Gallery')->orderBy('position', 'asc')->get();
        $videoCategories = VideoGalleryCategory::where('publish', 1)->orderBy('position', 'asc')->get();
        $newsCoverageCategories = NewsCoverageCategory::where('publish', 1)->orderBy('position', 'asc')->get();
        $upcomingEvents = $this->getEvents('upcoming')->get();
        $pastEvents = $this->getEvents('past')->get();
        $ongoingEvents = $this->getEvents('current')->get();
        $category = ServiceCategory::where('name', 'Amenities')->first();
        $services = $category != null ? Service::where('service_category_id', $category->id)->get() : null;
        return view('pages.inner-page', compact('page', 'trustees', 'category','services', 'executiveCommittees', 'boardMembers', 'cafogsts', 'photoCategories', 'videoCategories', 'newsCoverageCategories', 'upcomingEvents', 'pastEvents', 'ongoingEvents'));
    }
    public function NewsDetails($id)
    {
        $news = News::find($id);
        return view('pages.news-details', compact('news'));
    }
    public function contactUs()
    {
        return view('pages.contact-us');
    }
    public function contactFormSubmission(Request $request)
    {
        $input = $request->all();
        $enquiry = Enquiry::create($input);
        $type = 'contact';
        return redirect(url('success'))->with('type', $type);
    }
    public function success()
    {
        // $type = session('type');
        // switch ($type) {
        //     case 'contact':
        //         return view('pages.contact-success');
        //         break;
        //     case 'eventregistration':
        //         return view('pages.eventregistration-success');
        //         break;
        //     default:
        //         return redirect(url('/'));
        //         break;
        // }
        if (session('donation_id')) {
            $donation = Donation::find(session('donation_id'));
            return view('pages.donate-success', compact('donation'));
        }
        return redirect(url('/'));
    }
    public function checkDuplicateEmail(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user != null) {
            return json_encode("error");
        } else {
            return json_encode("success");
        }
    }
    public function updateProfile(Request $request)
    {
        $register = new RegisterController;
        $register->updateUser(Auth::user()->id, $request->first_name, $request->last_name, $request->email, $request->phone_no);
        $register->createOrUpdateUserPersonalDetails(Auth::user()->id, $request, $request->personalDetailsId);
        $register->userCommunicationDetails(Auth::user()->id, $request, $request->communicationDetailId);
        Flash::success('Your profile has been updated successfully.');
        return redirect()->back();
    }
    public function updatePassword(Request $request)
    {
        $user = User::find($request->user_id);
        if ($user != null) {
            $user->password = Hash::make($request->password);
            $user->save();
            Flash::success('Password has been updated successfully.');
        } else {
            Flash::error('Something went wrong. Please try again later.');
        }
        return Redirect::to(URL::previous() . "#change-password-profile-tab");
    }
    public function getEvents($type)
    {
        $query = Event::query();
        if ($type == 'upcoming') {
            $query->where('start_date', '>=', date('Y-m-d'));
        }
        if ($type == 'current') {
            $query->where('start_date', '<=', date('Y-m-d'))->where('end_date', '>=', date('Y-m-d'));
        }
        if ($type == 'past') {
            $query->where('start_date', '<', date('Y-m-d'))->where('end_date', '<', date('Y-m-d'));
        }
        $query->where('publish', 1);
        $events = $query->orderBy('start_date', 'desc');
        return $events;
    }
    public function eventDetails($slug)
    {
        $event = Event::where('slug', $slug)->where('publish', 1)->first();
        if ($event != null) {
            return view('pages.event-details', compact('event'));
        } else {
            return redirect('/');
        }
    }
    public function eventRegistration($slug)
    {
        $event = Event::where('slug', $slug)->where('publish', 1)->first();
        if ($event != null) {
            $child_details = Auth::check() ? ChildDetail::where('user_id', Auth::user()->id)->get() : null;
            $personal_details = Auth::check() ? PersonalDetails::where('user_id', Auth::user()->id)->first() : null;
            $paymentMethods = PaymentMethod::select('display_name', 'slug')->where('publish', 1)->orderBy('position', 'asc')->get();
            return view('pages.event-registration', compact('event', 'child_details', 'personal_details', 'paymentMethods'));
        } else {
            return redirect('/');
        }
    }
    public function createEventRegistration($request)
    {
        $eventRegistration = new EventRegistration();
        $eventRegistration->event_id = $request->event_id;
        $eventRegistration->user_id = $request->user_id;
        $eventRegistration->first_name = $request->first_name;
        $eventRegistration->last_name = $request->last_name;
        $eventRegistration->email = $request->email;
        $eventRegistration->phone = $request->phone;
        $eventRegistration->address = $request->address;
        $eventRegistration->state = $request->state;
        $eventRegistration->city = $request->city;
        $eventRegistration->zipcode = $request->zipcode;
        $eventRegistration->total_amount = $request->amount;
        $array = [];
        $adult_count = 0;
        $child_count = 0;
        $guest_adult_count = 0;
        $guest_child_count = 0;
        $j = 0;
        for ($i = 0; $i < count($request->attend_event_status); $i++) {
            if ($request->attend_event_status[$i] == '1') {
                if ($request->category[$i] == 'Member') {
                    $adult_count++;
                }
                if ($request->category[$i] == 'Spouse') {
                    $adult_count++;
                }
                if ($request->category[$i] == 'Child') {
                    $child_count++;
                }
                if ($request->category[$i] == 'Guest') {
                    $guest_adult_count++;
                }
                if ($request->category[$i] == 'Guest Child') {
                    $guest_child_count++;
                }
                $array[$j]['name'] = $request->attendee_name[$i];
                $array[$j]['type'] = $request->category[$i];
                $array[$j]['price'] = $request->price[$i];
                $array[$j]['field1'] = isset($request->additional_field1[$i]) ? $request->additional_field1[$i] : '';
                $array[$j]['field2'] = isset($request->additional_field2[$i]) ? $request->additional_field2[$i] : '';
                $j++;
            }
        }
        $eventRegistration->adult_count = $adult_count;
        $eventRegistration->child_count = $child_count;
        $eventRegistration->guest_adult_count = $guest_adult_count;
        $eventRegistration->guest_child_count = $guest_child_count;
        $eventRegistration->additional_fields = json_encode($array);
        $eventRegistration->save();
        return $eventRegistration->id;
    }
    public function replaceMailEventDetails($eid, $tid, $template)
    {
        $registration = EventRegistration::find($eid);
        $transaction = Transaction::find($tid);
        $variable = ["[Full Name]", "[EVENTNAME]", "[EventName]", "[Date]", "[Location]", "[Registration ID]", "[First Name]", "[Last Name]", "[Email]", "[Mobile]", "[Adults]", "[Children]", "[Guests]", "[GuestChildren]", "[Amount]", "[Paid]", "[Transaction ID]", "[Payment Method]"];
        $replace = [$registration->first_name . " " . $registration->last_name, $registration->event->event_name, $registration->event->event_name, formatDate($registration->event->start_date) . " to " . formatDate($registration->event->end_date), $registration->event->location, $eid, $registration->first_name, $registration->last_name, $registration->email, $registration->phone, $registration->adult_count, $registration->child_count, $registration->guest_adult_count, $registration->guest_child_count, formatAmount($transaction->amount), $transaction->payment_status, $transaction->transaction_id, $transaction->payment_method_id != null ? $transaction->paymentMethod->payment_method_name : null];
        $finalTemplate = str_replace($variable, $replace, $template);
        return $finalTemplate;
    }
    public function eventRegistrationSubmission(Request $request)
    {
        $register = new RegisterController;
        $eventRegistration = $this->createEventRegistration($request);
        $event_reg_detail = EventRegistration::find($eventRegistration);
        if ($request->payment_method == null) {
            $transaction_id = 'free';
            $payment_status = 'Success';
        }
        if ($request->payment_method == 'quickpay') {
            $transaction_id = $request->quick_pay_ref_id;
            $payment_status = 'Pending';
        } elseif ($request->payment_method == 'cheque') {
            $transaction_id = $request->cheque_pay_ref_id;
            $payment_status = 'Pending';
        }
        $transactionDetail = $register->userTransactionDetails($request->user_id, $request, $transaction_id, $payment_status, null);
        $transaction = Transaction::find($transactionDetail);
        $transaction->event_id = $request->event_id;
        $transaction->event_registration_id = $event_reg_detail->id;
        $transaction->user_id = $request->user_id;
        if ($request->payment_method == null) {
            $this->eventUnPaidAdminSendMail($event_reg_detail->id, $transaction->id);
            $this->eventUnPaidUserSendMail($event_reg_detail->id, $transaction->id, $event_reg_detail->email);
            $event_reg_detail->mailsent = 1;
        } else {
            $this->eventPaidAdminSendMail($event_reg_detail->id, $transaction->id);
            $event_reg_detail->mailsent = 0;
        }
        $transaction->save();
        $event_reg_detail->save();
        return redirect(url('/'))->with('eventregistration', 'success');
    }
    public function eventPaidUserSendMail($eid, $tid, $email)
    {
        $mailTemplate = MailTemplates::where('heading', 'Event registration - Paid')->first();
        $finalTemplate = $this->replaceMailEventDetails($eid, $tid, $mailTemplate->description);
        Mail::to($email)->send(new DynamicEmail($mailTemplate->subject, $finalTemplate));
    }
    public function eventPaidAdminSendMail($eid, $tid)
    {
        $mailTemplate = MailTemplates::where('heading', 'Event Registrations for Admin - Paid')->first();
        $finalTemplate = $this->replaceMailEventDetails($eid, $tid, $mailTemplate->description);
        Mail::to(applicationSettings('admin-mail'))->send(new DynamicEmail($mailTemplate->subject, $finalTemplate));
    }
    public function eventUnPaidUserSendMail($eid, $tid, $email)
    {
        $mailTemplate = MailTemplates::where('heading', 'Event registration - Unpaid')->first();
        $finalTemplate = $this->replaceMailEventDetails($eid, $tid, $mailTemplate->description);
        Mail::to($email)->send(new DynamicEmail($mailTemplate->subject, $finalTemplate));
    }
    public function eventUnPaidAdminSendMail($eid, $tid)
    {
        $mailTemplate = MailTemplates::where('heading', 'Event Registrations for Admin -Unpaid')->first();
        $finalTemplate = $this->replaceMailEventDetails($eid, $tid, $mailTemplate->description);
        Mail::to(applicationSettings('admin-mail'))->send(new DynamicEmail($mailTemplate->subject, $finalTemplate));
    }
    public function replaceMailDonationDetails($did, $tid, $template)
    {
        $donation = Donation::find($did);
        $transaction = Transaction::find($tid);
        $variable = ["[Full Name]", "[First Name]", "[Last Name]", "[Donation Program]", "[Payment Date]", "[Transaction ID]", "[Amount]", "[Payment Status]", "[Payment Method]"];
        $replace = [$donation->first_name . " " . $donation->last_name, $donation->first_name, $donation->last_name, $donation->donationCategory->donation_cause, formatDate($transaction->transaction_date), $transaction->transaction_id, formatAmount($transaction->amount), $transaction->payment_status, $transaction->paymentMethod->payment_method_name];
        $finalTemplate = str_replace($variable, $replace, $template);
        return $finalTemplate;
    }
    public function donationUserSendMail($did, $tid, $email)
    {
        $mailTemplate = MailTemplates::where('heading', 'Thank you for giving donation')->first();
        $finalTemplate = $this->replaceMailDonationDetails($did, $tid, $mailTemplate->description);
        $donation = Donation::find($did);
        $data = [
            'donation' => $donation
        ];
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('pdf.donate-invoice', $data);
        $pdf->save('images/donate-invoice/invoice_' . $donation->id . '.pdf');
        Mail::send('emails.dynamic', array('template' => $finalTemplate), function ($message) use ($donation, $mailTemplate) {
            $message->to($donation->email)
                ->subject($mailTemplate->subject)
                ->attach('images/donate-invoice/invoice_' . $donation->id . '.pdf');
        });
    }
    public function donationAdminSendMail($did, $tid)
    {
        $mailTemplate = MailTemplates::where('heading', 'New Donatioin - Admin')->first();
        $finalTemplate = $this->replaceMailDonationDetails($did, $tid, $mailTemplate->description);
        Mail::to(applicationSettings('admin-mail'))->send(new DynamicEmail($mailTemplate->subject, $finalTemplate));
    }
    public function donate()
    {
        $categories = DonationCategory::where('publish', 1)->pluck('donation_cause', 'id');
        $paymentMethods = PaymentMethod::select('display_name', 'slug')->where('publish', 1)->orderBy('position', 'asc')->get();
        return view('pages.donate', compact('categories', 'paymentMethods'));
    }
    public function createDonation($request)
    {
        $donation = new Donation();
        $donation->donation_amount = $request->amount;
        $donation->first_name = $request->first_name;
        $donation->last_name = $request->last_name;
        $donation->email = $request->email;
        $donation->phone_no = $request->phone_no;
        $donation->address = $request->address;
        $donation->user_id = $request->user_id;
        $donation->donation_category_id = $request->donation_category_id;
        $donation->donation_cause_other = $request->donation_cause_other;
        $donation->mailsent = 0;
        $donation->save();
        return $donation->id;
    }
    public function donationFormSubmission(Request $request)
    {
        $register = new RegisterController;
        $donation = $this->createDonation($request);
        if ($request->payment_method == 'quickpay') {
            $transaction_id = $request->quick_pay_ref_id;
            $payment_status = 'Pending';
        } elseif ($request->payment_method == 'cheque') {
            $transaction_id = $request->cheque_pay_ref_id;
            $payment_status = 'Pending';
        }
        $transactionDetail = $register->userTransactionDetails($request->user_id, $request, $transaction_id, $payment_status, null);
        $transaction = Transaction::find($transactionDetail);
        $transaction->donation_id = $donation;
        $transaction->save();
        $this->donationAdminSendMail($donation, $transaction->id);
        return redirect(url('success'))->with('donation_id', $donation);
    }
}
