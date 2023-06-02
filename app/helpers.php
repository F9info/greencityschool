<?php
use App\Models\ApplicationSetting;
use App\Models\Category;
use App\Models\Admin;
use App\Models\ChildDetail;
use App\Models\Cms;
use App\Models\CommitteeMemberActiveList;
use App\Models\Event;
use App\Models\EventRegistration;
use App\Models\MemberInterest;
use App\Models\MembershipType;
use App\Models\PaymentMethod;
use App\Models\SponsorCategory;
use App\Models\Sponsor;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Transaction;
use Carbon\Carbon;
function unique_code($limit)
{
    return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
}
if (!function_exists("uploadImage")) {
    function uploadImage($image, $path, $width, $height)
    {
        if ($image != '') {
            $name = unique_code(9) . '.' . $image->extension();
            $img = Image::make($image);
            if ($width != null || $height != null) {
                $img->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }
            $img->save(public_path($path . $name));
            return $name;
        }
    }
}
if (!function_exists("removeImage")) {
    function removeImage($image, $path)
    {
        if (!empty($image) && file_exists(public_path($path . $image))) {
            unlink(public_path($path . $image));
        }
    }
}
if (!function_exists("applicationSettings")) {
    function applicationSettings($slug)
    {
        $applicationSettings = ApplicationSetting::where('slug', $slug)->first();
        return $applicationSettings != NULL ? $applicationSettings->value : '';
    }
}
if (!function_exists("applicationCategorySettings")) {
    function applicationCategorySettings($categoryName)
    {
        $category = Category::where('name', $categoryName)->first();
        if ($category != NULL) {
            $applicationSettings = ApplicationSetting::where('category_id', $category->id)->get();
            return $applicationSettings;
        } else {
            return NULL;
        }
    }
}
if (!function_exists("mainMenu")) {
    function mainMenu()
    {
        $menu = Cms::where('parent', 'root')->where('main_menu', 1)->where('publish', 1)->orderBy('position', 'asc')->get();
        return $menu;
    }
}
if (!function_exists("getSubMenu")) {
    function getSubMenu($id)
    {
        $menu = Cms::where('parent', $id)->where('publish', 1)->orderBy('position', 'asc')->get();
        return $menu;
    }
}
if (!function_exists("footerMenu")) {
    function footerMenu()
    {
        $menu = Cms::where('parent', 'root')->where('footer_menu', 1)->where('publish', 1)->get();
        return $menu;
    }
}
if (!function_exists("topMenu")) {
    function topMenu()
    {
        $menu = Cms::where('parent', 'root')->where('top_menu', 1)->where('publish', 1)->get();
        return $menu;
    }
}
if (!function_exists("getUserRole")) {
    function getUserRole($id)
    {
        $user = Admin::find($id);
        return $user->roles->first() != '' ? $user->roles->first()->name : '';
    }
}
if (!function_exists("formatDate")) {
    function formatDate($date)
    {
        return $date != '' ? date('m-d-Y', strtotime($date)) : '';
    }
}
if (!function_exists("getYearFromDate")) {
    function getYearFromDate($date)
    {
        return $date != '' ? date('Y', strtotime($date)) : '';
    }
}
if (!function_exists("formatSpecialDate")) {
    function formatSpecialDate($date)
    {
        return $date != '' ? date('M-d', strtotime($date)) : '';
    }
}
if (!function_exists("formatDateTime")) {
    function formatDateTime($date)
    {
        return $date != '' ? date('m-d-Y h:i A', strtotime($date)) : '';
    }
}
if (!function_exists("formatAmount")) {
    function formatAmount($amount)
    {
        return '$' . number_format($amount, 2);
    }
}
if (!function_exists("pageLink")) {
    function pageLink($type, $slug, $custom_url)
    {
        $link = $type == 'nopage' ? '#' : ($custom_url != '' ? $custom_url : url('/pages/' . $slug));
        return $link;
    }
}
if (!function_exists("committeeMemberActiveList")) {
    function committeeMemberActiveList($id)
    {
        return CommitteeMemberActiveList::where('committee_member_id', $id)->get();
    }
}
if (!function_exists("getCommitteeMembers")) {
    function getCommitteeMembers($categoryId)
    {
        return DB::table('committee_members')
            ->select('committee_members.name', 'committee_members.member_photo', 'committee_members.designation', 'committee_members.caf_designation')
            ->join('committee_member_active_lists', 'committee_member_active_lists.committee_member_id', '=', 'committee_members.id')
            ->where('committee_member_active_lists.committee_category_id', $categoryId)->where('committee_member_active_lists.active', 1)
            ->orderBy('committee_members.position', 'asc')->get();
    }
}
if (!function_exists("getSponsors")) {
    function getSponsors()
    {
        $category = SponsorCategory::where('category_name', 'Sponsors')->first();
        $sponsors = $category != null ? Sponsor::where('sponsor_category_id', $category->id)->where('publish', 1)->orderBy('position', 'asc')->get() : null;
        return $sponsors;
    }
}
if (!function_exists("getMediaPartners")) {
    function getMediaPartners()
    {
        $category = SponsorCategory::where('category_name', 'Media Partners')->first();
        $mediaPartners = $category != null ? Sponsor::where('sponsor_category_id', $category->id)->where('publish', 1)->orderBy('position', 'asc')->get() : null;
        return $mediaPartners;
    }
}
// if (!function_exists("getServices")) {
//     function getServices()
//     {
//         $category = ServiceCategory::where('name', 'Amenities')->first();
//         $services = $category != null ? Service::where('service_category_id', $category->id)->get() : null;
//         return $services;
//     }
// }
// if (!function_exists("getServiceCategory")) {
//     function getServiceCategory($categoryName)
//     {
//         $servicesCategory = ServiceCategory::where('name', $categoryName)->first();
//         return $servicesCategory;
//     }
// }
if (!function_exists("getStripeKey")) {
    function getStripeKey()
    {
        $paymentMethod = PaymentMethod::where('slug', 'stripe')->first();
        if (applicationSettings('payment-mode') == 'Sandbox') {
            return $paymentMethod->sandbox_key;
        } else {
            return $paymentMethod->live_key;
        }
    }
}
if (!function_exists("getStripeSecret")) {
    function getStripeSecret()
    {
        $paymentMethod = PaymentMethod::where('slug', 'stripe')->first();
        if (applicationSettings('payment-mode') == 'Sandbox') {
            return $paymentMethod->sandbox_secret;
        } else {
            return $paymentMethod->live_secret;
        }
    }
}
if (!function_exists("getPaypalSandboxKey")) {
    function getPaypalSandboxKey()
    {
        $paymentMethod = PaymentMethod::where('slug', 'paypal')->first();
        return $paymentMethod->sandbox_key;
    }
}
if (!function_exists("getPaypalSandboxSecret")) {
    function getPaypalSandboxSecret()
    {
        $paymentMethod = PaymentMethod::where('slug', 'paypal')->first();
        return $paymentMethod->sandbox_secret;
    }
}
if (!function_exists("getPaypalLiveKey")) {
    function getPaypalLiveKey()
    {
        $paymentMethod = PaymentMethod::where('slug', 'paypal')->first();
        return $paymentMethod->live_key;
    }
}
if (!function_exists("getPaypalLiveSecret")) {
    function getPaypalLiveSecret()
    {
        $paymentMethod = PaymentMethod::where('slug', 'paypal')->first();
        return $paymentMethod->live_secret;
    }
}
if (!function_exists("getMembershipPrice")) {
    function getMembershipPrice($id)
    {
        $membershipType =  MembershipType::find($id);
        // return $membershipType != '' ? $membershipType->price : '';
        return $id;
    }
}
if (!function_exists("displayContent")) {
    function displayContent($content)
    {
        $variable = "[IMAGEURL]";
        $replace   = url('') . "/images/media";
        $newContent = str_replace($variable, $replace, $content);
        return $newContent;
    }
}
if (!function_exists("userExpiryStatus")) {
    function userExpiryStatus($expiry_date)
    {
        if ($expiry_date == null || Carbon::parse($expiry_date) > Carbon::now()) {
            return 1;
        } else {
            return 0;
        }
    }
}
if (!function_exists("getLatestTransaction")) {
    function getLatestTransaction($user_id)
    {
        return Transaction::where('user_id', $user_id)
            ->where(function ($q) {
                $q->where('transactions.reference', '=', 'membership')
                    ->orwhere('transactions.reference', '=', 'renewal');
            })
            ->latest()->first();
    }
}
if (!function_exists("getMemberDetails")) {
    function getMemberDetails($request)
    {
        $query = DB::table('personal_details')
            ->join('users', 'users.id', '=', 'personal_details.user_id')
            ->join('membership_types', 'membership_types.id', '=', 'personal_details.membership_type_id')
            ->leftJoin('transactions', function ($query) {
                $query->on('users.id', '=', 'transactions.user_id')
                    ->whereRaw('transactions.id IN (select MAX(a2.id) from transactions as a2 join users as u2 on u2.id = a2.user_id where a2.reference IN ("membership", "renewal") group by u2.id)');
            })
            ->join('payment_methods', 'payment_methods.id', '=', 'transactions.payment_method_id')
            ->select('personal_details.user_id', 'personal_details.id', 'personal_details.address', 'personal_details.state', 'personal_details.city', 'personal_details.zipcode', 'personal_details.native_state', 'personal_details.native_district', 'personal_details.native_city', 'personal_details.spouse_first_name', 'personal_details.spouse_last_name', 'personal_details.spouse_native_state', 'personal_details.spouse_native_district', 'personal_details.spouse_native_city', 'personal_details.member_interests', 'personal_details.spouse_interests', 'personal_details.child_interests', 'users.first_name', 'users.last_name', 'users.email', 'users.phone_no', 'users.expiry_date', 'users.publish', 'users.created_at', 'membership_types.membership_name', 'payment_methods.payment_method_name', 'transactions.payment_status', 'transactions.transaction_id', 'transactions.amount', 'transactions.admin_comment', 'transactions.user_comment', 'transactions.bank_name', 'transactions.cheque_no', 'transactions.cheque_date', 'transactions.reference', 'transactions.transaction_date');
        if (!empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('personal_details.user_id', 'LIKE', '%' . $search . "%")
                    ->orwhere('users.first_name', 'LIKE', '%' . $search . "%")
                    ->orwhere('users.last_name', 'LIKE', '%' . $search . "%")
                    ->orwhere('users.email', 'LIKE', '%' . $search . "%")
                    ->orwhere('users.phone_no', 'LIKE', '%' . $search . "%")
                    ->orwhere('personal_details.spouse_first_name', 'LIKE', '%' . $search . "%")
                    ->orwhere('personal_details.spouse_last_name', 'LIKE', '%' . $search . "%")
                    ->orwhere('personal_details.city', 'LIKE', '%' . $search . "%");
            });
        }
        if (!empty($request->membership_type)) {
            $query->where('personal_details.membership_type_id', $request->membership_type);
        }
        if (!empty($request->reg_from_date != '')) {
            $query->whereDate('users.created_at', '>=', date("Y-m-d", strtotime($request->reg_from_date)));
        }
        if (!empty($request->reg_to_date != '')) {
            $query->whereDate('users.created_at', '<=', date("Y-m-d", strtotime($request->reg_to_date)));
        }
        if (!empty($request->payment_status)) {
            $query->where('transactions.payment_status', $request->payment_status);
        }
        if (!empty($request->membership_status != '')) {
            if ($request->membership_status == 1) {
                $query->where(function ($q) {
                    $q->where('users.expiry_date', null)
                        ->orwhere('users.expiry_date', '>', date("Y-m-d"));
                });
            } else {
                $query->where('users.expiry_date', '<', date("Y-m-d"));
            }
        }
        if (!empty($request->expire_from_date != '')) {
            $query->whereDate('users.expiry_date', '>=', date("Y-m-d", strtotime($request->expire_from_date)));
        }
        if (!empty($request->expire_to_date != '')) {
            $query->whereDate('users.expiry_date', '<=', date("Y-m-d", strtotime($request->expire_to_date)));
        }
        if ($request->member_status != '') {
            $query->where('users.publish', $request->member_status);
        }
        $membership_interests = $request->membership_interests;
        if (!empty($request->membership_interests) && $request->membership_interests != 'null') {
            $query->where(function ($q) use ($membership_interests) {
                foreach (is_array($membership_interests) ? $membership_interests : json_decode($membership_interests) as $word) {
                    $q->orWhere('member_interests', 'LIKE', '%"' . $word . '"%')
                        ->orWhere('spouse_interests', 'LIKE', '%' . $word . '%')
                        ->orWhere('child_interests', 'LIKE', '%' . $word . '%');
                }
            });
        }
        $sort = $request->sort ?? 'personal_details.created_at';
        $direction = $request->direction ?? 'desc';
        $personalDetails = $query->orderBy($sort, $direction);
        return $personalDetails;
    }
}
if (!function_exists("getUserChildrenDetails")) {
    function getUserChildrenDetails($user_id)
    {
        $details = '';
        $childDetails = ChildDetail::where('user_id', $user_id)->get();
        if (count($childDetails) > 0) {
            foreach ($childDetails as $child) {
                $details .= "Child Name - " . $child->child_name . " / Age - " . $child->age . " / Gender - " . $child->gender . " / DOB - " . $child->date_of_birth . "\n";
            }
        }
        return $details;
    }
}
if (!function_exists("memberInterestNames")) {
    function memberInterestNames($data)
    {
        $details = '';
        if ($data != '' && $data != 'null') {
            foreach (json_decode($data) as $dat) {
                $details .= MemberInterest::find($dat)->interests . ", ";
            }
        }
        return $details;
    }
}
if (!function_exists("getEventRegistrationDetails")) {
    function getEventRegistrationDetails($request)
    {
        $query = EventRegistration::query();
        $query->join('transactions', 'transactions.event_registration_id', '=', 'event_registrations.id');
        $query->select('event_registrations.*');
        if (!empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('event_registrations.first_name', 'LIKE', '%' . $search . "%")
                    ->orwhere('event_registrations.last_name', 'LIKE', '%' . $search . "%")
                    ->orwhere('event_registrations.email', 'LIKE', '%' . $search . "%")
                    ->orwhere('event_registrations.phone', 'LIKE', '%' . $search . "%");
            });
        }
        if (!empty($request->event)) {
            $query->where('event_registrations.event_id', $request->event);
        }
        if (!empty($request->payment_method)) {
            $query->where('transactions.payment_method_id', $request->payment_method);
        }
        if (!empty($request->payment_status)) {
            $query->where('transactions.payment_status', $request->payment_status);
        }
        if ($request->from_date != '') {
            $query->whereDate('event_registrations.created_at', '>=', date("Y-m-d", strtotime($request->from_date)));
        }
        if ($request->to_date != '') {
            $query->whereDate('event_registrations.created_at', '<=', date("Y-m-d", strtotime($request->to_date)));
        }
        $eventRegistrations = $query->sortable(['created_at' => 'desc']);
        return $eventRegistrations;
    }
}
if (!function_exists("checkUserEventRegistration")) {
    function checkUserEventRegistration($event_id)
    {
        if (Auth::check()) {
            $register = EventRegistration::where('event_id', $event_id)->where('user_id', Auth::user()->id)->first();
            return $register != null ? false : true;
        } else {
            return true;
        }
    }
}
if (!function_exists("checkUserEventRegistrationConditions")) {
    function checkUserEventRegistrationConditions($event_id)
    {
        $event = Event::find($event_id);
        if ($event->registration_enabled) {
            if ($event->members_only && Auth::guest()) {
                return "Registrations Not allowed for Non Members";
            } else {
                if ($event->reg_start_date <= date('Y-m-d h:i:s') && $event->reg_end_date >= date('Y-m-d h:i:s')) {
                    if (checkUserEventRegistration($event->id)) {
                        return "success";
                    } else {
                        return "You already registered this event";
                    }
                } elseif ($event->reg_end_date < date('Y-m-d h:i:s')) {
                    return "Registration Closed";
                } elseif ($event->reg_start_date > date('Y-m-d h:i:s')) {
                    return "Registration will start in" . Carbon::parse($event->reg_start_date)->diffForHumans();
                }
            }
        } else {
            return "Registration not Enabled";
        }
    }
}
if (!function_exists("getDonations")) {
    function getDonations($request)
    {
        $query = DB::table('donations')
            ->join('donation_categories', 'donation_categories.id', '=', 'donations.donation_category_id')
            ->join('transactions', 'transactions.donation_id', '=', 'donations.id')
            ->join('payment_methods', 'payment_methods.id', '=', 'transactions.payment_method_id')
            ->select('donations.id', 'donations.first_name', 'donations.last_name', 'donations.email', 'donations.phone_no', 'donations.address', 'donations.created_at', 'donations.donation_cause_other', 'donation_categories.donation_cause', 'transactions.transaction_id', 'transactions.bank_name', 'transactions.cheque_no', 'transactions.cheque_date', 'transactions.amount', 'payment_methods.payment_method_name', 'transactions.payment_status');
        if (!empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('donations.first_name', 'LIKE', '%' . $search . "%")
                    ->orwhere('donations.last_name', 'LIKE', '%' . $search . "%")
                    ->orwhere('donations.email', 'LIKE', '%' . $search . "%")
                    ->orwhere('donations.phone_no', 'LIKE', '%' . $search . "%")
                    ->orwhere('transactions.transaction_id', 'LIKE', '%' . $search . "%");
            });
        }
        if (!empty($request->donation_cause)) {
            $query->where('donation_categories.id', $request->donation_cause);
        }
        if ($request->donation_from_date != '') {
            $query->whereDate('donations.created_at', '>=', date("Y-m-d", strtotime($request->donation_from_date)));
        }
        if ($request->donation_to_date != '') {
            $query->whereDate('donations.created_at', '<=', date("Y-m-d", strtotime($request->donation_to_date)));
        }
        if (!empty($request->payment_status)) {
            $query->where('transactions.payment_status', $request->payment_status);
        }
        $sort = $request->sort ?? 'donations.position';
        $direction = $request->direction ?? 'asc';
        $donations = $query->orderBy($sort, $direction);
        return $donations;
    }
}
