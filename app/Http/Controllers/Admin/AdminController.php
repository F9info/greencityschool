<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\PagesController;
use App\Models\Cms;
use App\Models\Admin;
use App\Models\Slider;
use App\Models\CommitteeCategory;
use App\Models\Donation;
use App\Models\DonationCategory;
use App\Models\Event;
use App\Models\EventCategory;
use App\Models\MemberInterest;
use App\Models\MembershipType;
use App\Models\News;
use App\Models\NewsCoverage;
use App\Models\NewsCoverageCategory;
use App\Models\PaymentMethod;
use App\Models\PhotoGalleryCategory;
use App\Models\PhotoGallery;
use App\Models\Sponsor;
use App\Models\SponsorCategory;
use App\Models\User;
use App\Models\VideoGallery;
use App\Models\VideoGalleryCategory;
use Flash;
use Mail;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function dashboard(Request $request)
    {
        if (!auth()->guard('admin')->user()->hasPermissionTo('view-dashboard')) {
            abort(403);
        }
        $pages = new PagesController;
        $membershipTypes = MembershipType::where('publish', 1)->get();
        $eventCategories = EventCategory::all();
        $upcomingEvents = $pages->getEvents('upcoming')->get();
        $donationCategories = DonationCategory::all();
        if(empty($request->month) && empty($request->year)){
            $sponsors = SponsorCategory::where('category_name', 'Sponsors')->count();
        }else{
            $sponsors = SponsorCategory::where('category_name', 'Sponsors')->whereMonth('created_at', $request->month)->whereYear('created_at', '=', $request->year)->count();
        }
        $activeUsers = User::where('expiry_date', null)->orWhere('expiry_date', '>', date('Y-m-d'))->count();
        $expireUsers = User::where('expiry_date', '<', date('Y-m-d'))->count();
        if(empty($request->month) && empty($request->year)){
            $donations = Donation::count();
        }else{
            $donations = Donation::whereMonth('created_at', $request->month)->whereYear('created_at', '=', $request->year)->count();
        }
        return view('admin.dashboard', compact('membershipTypes', 'eventCategories', 'upcomingEvents', 'donationCategories', 'sponsors', 'activeUsers', 'expireUsers', 'donations'));
    }

    public function publish($type, $id, $val)
    {
        switch ($type) {
            case 'admin':
                $model = Admin::find($id);
                break;
            case 'user':
                $model = User::find($id);
                break;
            case 'cm':
                $model = Cms::find($id);
                break;
            case 'slider':
                $model = Slider::find($id);
                break;
            case 'committeeCategory':
                $model = CommitteeCategory::find($id);
                break;
            case 'photoGalleryCategory':
                $model = PhotoGalleryCategory::find($id);
                break;
            case 'photoGallery':
                $model = PhotoGallery::find($id);
                break;
            case 'videoGalleryCategory':
                $model = VideoGalleryCategory::find($id);
                break;
            case 'videoGallery':
                $model = VideoGallery::find($id);
                break;
            case 'sponsorCategory':
                $model = SponsorCategory::find($id);
                break;
            case 'sponsor':
                $model = Sponsor::find($id);
                break;
            case 'new':
                $model = News::find($id);
                break;
            case 'newsCoverageCategory':
                $model = NewsCoverageCategory::find($id);
                break;
            case 'newsCoverage':
                $model = NewsCoverage::find($id);
                break;
            case 'donationCategory':
                $model = DonationCategory::find($id);
                break;
            case 'eventCategory':
                $model = EventCategory::find($id);
                break;
            case 'event':
                $model = Event::find($id);
                break;
            case 'membershipType':
                $model = MembershipType::find($id);
                break;
            case 'memberInterest':
                $model = MemberInterest::find($id);
                break;
            case 'paymentMethod':
                $model = PaymentMethod::find($id);
                break;
            case '':
                $model = PaymentMethod::find($id);
                break;
            default:
                $model = null;
                break;
        }
        if ($model != null) {
            $model->publish = $val;
            $model->save();
        }

        return redirect()->back();
    }

    public function sendEmailUser(Request $request)
    {
        $mail = str_replace(" ", ",", $request->to_email);
        $to = explode(',', $mail);
        Mail::send(
            'emails.send-email',
            array(
                'email_body' => $request->email_body,
            ),
            function ($message) use ($request, $to) {
                $message->to($to)->subject($request->email_subject);
            }
        );

        Flash::success('Mail Sent Successfully.');

        return redirect()->back();
    }
}
