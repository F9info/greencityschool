<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApplicationSettingController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\CmsController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CommitteeCategoryController;
use App\Http\Controllers\CommitteeMemberController;
use App\Http\Controllers\PhotoGalleryCategoryController;
use App\Http\Controllers\PhotoGalleryController;
use App\Http\Controllers\VideoGalleryCategoryController;
use App\Http\Controllers\VideoGalleryController;
use App\Http\Controllers\SponsorCategoryController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NewsCoverageCategoryController;
use App\Http\Controllers\NewsCoverageController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\MembershipTypeController;
use App\Http\Controllers\MemberInterestController;
use App\Http\Controllers\PersonalDetailsController;
use App\Http\Controllers\EventCategoryController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\DonationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Default Route */

Route::controller(PagesController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/pages/{slug}', 'innerPageView');
    Route::get('/latest-news/{id}', 'NewsDetails');
    Route::get('/contact-us', 'contactUs');
    Route::get('/donate', 'donate');
    Route::post('/donation-form-submission', 'donationFormSubmission');
    Route::post('/contact-form-submission', 'contactFormSubmission');
    Route::get('/success', 'success');

    Route::post('/check-duplicate-email', 'checkDuplicateEmail');
    Route::get('/event/{slug}', 'eventDetails');
    Route::get('/event-registration/{slug}', 'eventRegistration');
    Route::post('/event-registration-submission', 'eventRegistrationSubmission');
    Route::post('/update-profile', 'updateProfile')->middleware('auth');
    Route::post('/update-password', 'updatePassword')->middleware('auth');
});

// /* Mailchimp Route */
// Route::post('/subscribe', [App\Http\Controllers\PagesController::class, 'subscribe']);

/* Dashboard Route */
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/renew-membership', [App\Http\Controllers\HomeController::class, 'renewMembership']);

/* Auth Route */
Auth::routes();

/* Stripe Payment Routes */
Route::post('stripe/create-charge', [StripeController::class, 'createCharge'])->name('stripe.create-charge');

/* Paypal Payment Routes */
Route::post('process-transaction', [PayPalController::class, 'processTransaction'])->name('processTransaction');
Route::get('success-transaction', [PayPalController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction', [PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');

// Admin Routes
Route::controller(LoginController::class)->prefix('admin')->name('admin.')->group(function () {
    // login route
    Route::get('login', 'login')->name('login');
    Route::post('login', 'submit')->name('adminlogin');
    Route::post('logout', 'logout')->name('logout');
});

Route::middleware(['admin'])->group(function () {
    /* Dashboard Routes */
    Route::controller(AdminController::class)->prefix('admin')->name('admin.')->group(function () {
        Route::get('dashboard', 'dashboard')->name('dashboard');
    });

    /* Make Publish Routes */
    Route::get('/make-publish/{type}/{id}/{val}', [App\Http\Controllers\Admin\AdminController::class, 'publish']);

    /* User Management Routes */
    Route::controller(UserController::class)->group(function () {
        Route::resource('users', UserController::class);
        Route::get('users/reset/{id}', 'reset');
        Route::post('users/reset', 'resetPassword');
    });
    Route::resource('permissions', 'App\Http\Controllers\PermissionController');
    Route::resource('roles', 'App\Http\Controllers\RoleController');

    /* Applicatioin Settings Routes */
    Route::controller(ApplicationSettingController::class)->group(function () {
        Route::resource('applicationSettings', ApplicationSettingController::class);
        Route::get('general-settings', 'generalSettingsView');
        Route::get('application-settings', 'applicationSettingsView');
        Route::get('developer-settings', 'developerSettingsView');
        Route::get('home-page-blocks', 'homePageSettingsView');
        Route::post('update-application-settings', 'updateSettings');
        Route::post('application-settings-sortable', 'sort');
    });
    Route::resource('categories', App\Http\Controllers\CategoryController::class);

    /* Media Routes */
    Route::controller(MediaController::class)->group(function () {
        Route::get('media', 'media');
        Route::post('upload-media', 'uploadMedia');
        Route::get('remove-media/{img}', 'removeMedia');
    });

    /* CMS & Slider Routes */
    Route::controller(CmsController::class)->group(function () {
        Route::resource('cms', CmsController::class);
        Route::get('delete-cms-image/{id}/{value}', 'removeCMSImage');
        Route::post('cms-sortable', 'sort');
    });
    Route::controller(SliderController::class)->group(function () {
        Route::resource('sliders', SliderController::class);
        Route::post('slider-sortable', 'sort');
    });

    /* Committee Routes */
    Route::resource('committeeCategoryTypes', App\Http\Controllers\CommitteeCategoryTypeController::class);
    Route::controller(CommitteeCategoryController::class)->group(function () {
        Route::resource('committeeCategories', CommitteeCategoryController::class);
        Route::post('committeeCategories-sortable', 'sort');
    });
    Route::controller(CommitteeMemberController::class)->group(function () {
        Route::resource('committeeMembers', CommitteeMemberController::class);
        Route::post('committeeMembers-sortable', 'sort');
    });

    /* Photo Gallery Routes */
    Route::controller(PhotoGalleryCategoryController::class)->group(function () {
        Route::resource('photoGalleryCategories', PhotoGalleryCategoryController::class);
        Route::post('photoGalleryCategories-sortable', 'sort');
    });
    Route::controller(PhotoGalleryController::class)->group(function () {
        Route::resource('photoGalleries', PhotoGalleryController::class);
        Route::post('photoGalleries-sortable', 'sort');
    });

    /* Video Gallery Routes */
    Route::controller(VideoGalleryCategoryController::class)->group(function () {
        Route::resource('videoGalleryCategories', VideoGalleryCategoryController::class);
        Route::post('videoGalleryCategories-sortable', 'sort');
    });
    Route::controller(VideoGalleryController::class)->group(function () {
        Route::resource('videoGalleries', VideoGalleryController::class);
        Route::post('videoGalleries-sortable', 'sort');
    });

    /* Sponsor Routes */
    Route::controller(SponsorCategoryController::class)->group(function () {
        Route::resource('sponsorCategories', SponsorCategoryController::class);
        Route::post('sponsorCategories-sortable', 'sort');
    });
    Route::controller(SponsorController::class)->group(function () {
        Route::resource('sponsors', SponsorController::class);
        Route::post('sponsors-sortable', 'sort');
    });

    /* News Routes */
    Route::controller(NewsController::class)->group(function () {
        Route::resource('news', NewsController::class);
        Route::post('news-sortable', 'sort');
    });

    /* News Coverage Routes */
    Route::controller(NewsCoverageCategoryController::class)->group(function () {
        Route::resource('newsCoverageCategories', NewsCoverageCategoryController::class);
        Route::post('newsCoverageCategories-sortable', 'sort');
    });
    Route::controller(NewsCoverageController::class)->group(function () {
        Route::resource('newsCoverages', NewsCoverageController::class);
        Route::post('newsCoverages-sortable', 'sort');
    });

    /* Enquiry Routes */
    Route::resource('enquiries', App\Http\Controllers\EnquiryController::class);

    /* Send Mail Routes */
    Route::view('send-email', 'send-email');
    Route::post('send-email-users', [App\Http\Controllers\Admin\AdminController::class, 'sendEmailUser']);

    /* Payment Method Routes */
    Route::controller(PaymentMethodController::class)->group(function () {
        Route::resource('paymentMethods', PaymentMethodController::class);
        Route::post('paymentMethod-sortable', 'sort');
    });

    /* Membership Routes */
    Route::controller(MembershipTypeController::class)->group(function () {
        Route::resource('membershipTypes', MembershipTypeController::class);
        Route::post('membershipTypes-sortable', 'sort');
    });
    Route::controller(MemberInterestController::class)->group(function () {
        Route::resource('memberInterests', MemberInterestController::class);
        Route::post('memberInterests-sortable', 'sort');
    });
    Route::controller(PersonalDetailsController::class)->group(function () {
        Route::resource('personalDetails', PersonalDetailsController::class);
        Route::get('get-membership-type-details', 'getMembershipTypeDetails');
        Route::get('personalDetails1/export/', 'export');
    });

    /* Transaction Routes */
    Route::resource('transactions', App\Http\Controllers\TransactionController::class);

    /* Mail Template Routes */
    Route::resource('mailTemplates', App\Http\Controllers\MailTemplatesController::class);

    /* Event Routes */
    Route::controller(EventCategoryController::class)->group(function () {
        Route::resource('eventCategories', EventCategoryController::class);
        Route::post('eventCategories-sortable', 'sort');
    });
    Route::resource('events', App\Http\Controllers\EventController::class);
    Route::resource('eventRegistrations', App\Http\Controllers\EventRegistrationController::class);
    Route::get('eventRegistrations1/export/', [App\Http\Controllers\EventRegistrationController::class, 'export']);

    /* Donation Routes */
    Route::resource('donationCategories', App\Http\Controllers\DonationCategoryController::class);
    Route::controller(DonationController::class)->group(function () {
        Route::resource('donations', DonationController::class);
        Route::get('donations1/export/', 'export');
    });
    
    Route::get('/debug-sentry', function () {
        throw new Exception('My first Sentry error!');
    });

    /* Services */
    Route::controller(ServieController::class)->group(function () {
        Route::resource('services', App\Http\Controllers\ServiceController::class);
        Route::get('delete-services-image/{id}/{value}', 'removeServicesImage');
    });
});

Route::resource('serviceCategories', App\Http\Controllers\ServiceCategoryController::class);
