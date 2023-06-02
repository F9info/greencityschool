<!-- ---------------------------Dashboard--------------------------- -->
@if (auth()->guard('admin')->user()->hasPermissionTo('view-dashboard'))
    <li class="nav-item">
        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::is('admin.dashboard') ? 'active' : '' }}">
            <span class="material-symbols-outlined">
                dashboard
            </span>
            <p>Dashboard</p>
        </a>
    </li>
@endif
<!-- ---------------------------Admin Management--------------------------- -->
@if (auth()->guard('admin')->user()->hasPermissionTo('view-admin-management'))
    <li class="nav-item">
        <a href="{{ route('users.index') }}" class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
            <span class="material-symbols-outlined">
                group_add
            </span>
            <p>Admin Management</p>
        </a>
    </li>
@endif
<!-- ---------------------------Events--------------------------- -->
@if (auth()->guard('admin')->user()->hasPermissionTo('view-event-categories') ||
        auth()->guard('admin')->user()->hasPermissionTo('view-events') ||
        auth()->guard('admin')->user()->hasPermissionTo('view-event-registrations'))
    <li class="nav-item">
        <a href="#" class="nav-link">
            <span class="material-symbols-outlined">
                calendar_month
            </span>
            <p>
                <span class="material-symbols-outlined arrow_right">
                    arrow_right
                </span>
                Events
            </p>
        </a>
        <ul class="nav nav-treeview">
            @if (auth()->guard('admin')->user()->hasPermissionTo('view-event-categories'))
                <li class="nav-item">
                    <a href="{{ route('eventCategories.index') }}"
                        class="nav-link {{ Request::is('eventCategories*') ? 'active' : '' }}">
                        <span class="material-symbols-outlined">
                            category
                        </span>
                        <p> Event Categories</p>
                    </a>
                </li>
            @endif
            @if (auth()->guard('admin')->user()->hasPermissionTo('view-events'))
                <li class="nav-item">
                    <a href="{{ route('events.index', ['type' => 'upcoming']) }}"
                        class="nav-link {{ Request::is('events*') ? 'active' : '' }}">
                        <span class="material-symbols-outlined">
                            list
                        </span>
                        <p>Events List</p>
                    </a>
                </li>
            @endif
            @if (auth()->guard('admin')->user()->hasPermissionTo('view-event-registrations'))
                <li class="nav-item">
                    <a href="{{ route('eventRegistrations.index') }}"
                        class="nav-link {{ Request::is('eventRegistrations*') ? 'active' : '' }}">
                        <span class="material-symbols-outlined">
                            how_to_reg
                        </span>
                        <p>Event Registrations</p>
                    </a>
                </li>
            @endif
        </ul>
    </li>
@endif
<!-- ---------------------------end--------------------------- -->
<!-- ---------------------------Membership--------------------------- -->
@if (auth()->guard('admin')->user()->hasPermissionTo('view-membership-types') ||
        auth()->guard('admin')->user()->hasPermissionTo('view-membership-interests') ||
        auth()->guard('admin')->user()->hasPermissionTo('view-members'))
    <li class="nav-item">
        <a href="#" class="nav-link">
            <span class="material-symbols-outlined">
                stars
            </span>
            <p>
                <span class="material-symbols-outlined arrow_right">
                    arrow_right
                </span>
                Membership
            </p>
        </a>
        <ul class="nav nav-treeview">
            @if (auth()->guard('admin')->user()->hasPermissionTo('view-membership-types'))
                <li class="nav-item">
                    <a href="{{ route('membershipTypes.index') }}"
                        class="nav-link {{ Request::is('membershipTypes*') ? 'active' : '' }}">
                        <span class="material-symbols-outlined">
                            category
                        </span>
                        <p>Membership Types</p>
                    </a>
                </li>
            @endif
            @if (auth()->guard('admin')->user()->hasPermissionTo('view-membership-interests'))
                <li class="nav-item">
                    <a href="{{ route('memberInterests.index') }}"
                        class="nav-link {{ Request::is('memberInterests*') ? 'active' : '' }}">
                        <span class="material-symbols-outlined">
                            interests
                        </span>
                        <p>Member Interests</p>
                    </a>
                </li>
            @endif
            @if (auth()->guard('admin')->user()->hasPermissionTo('view-members'))
                <li class="nav-item">
                    <a href="{{ route('personalDetails.index') }}"
                        class="nav-link {{ Request::is('personalDetails*') ? 'active' : '' }}">
                        <span class="material-symbols-outlined">
                            list
                        </span>
                        <p>List of Members</p>
                    </a>
                </li>
            @endif
        </ul>
    </li>
@endif
<!-- ---------------------------end--------------------------- -->
<!-- ---------------------------Committees--------------------------- -->
@if (auth()->guard('admin')->user()->hasPermissionTo('view-committee-category-types') ||
        auth()->guard('admin')->user()->hasPermissionTo('view-committee-categories') ||
        auth()->guard('admin')->user()->hasPermissionTo('view-committee-members'))
    <li class="nav-item">
        <a href="#" class="nav-link">
            <span class="material-symbols-outlined">
                diversity_3
            </span>
            <p>
                <span class="material-symbols-outlined arrow_right">
                    arrow_right
                </span>
                Committees
            </p>
        </a>
        <ul class="nav nav-treeview">
            @if (auth()->guard('admin')->user()->hasPermissionTo('view-committee-category-types'))
                <li class="nav-item">
                    <a href="{{ route('committeeCategoryTypes.index') }}"
                        class="nav-link {{ Request::is('committeeCategoryTypes*') ? 'active' : '' }}">
                        <span class="material-symbols-outlined">
                            new_label
                        </span>
                        <p>Committee Category Types</p>
                    </a>
                </li>
            @endif
            @if (auth()->guard('admin')->user()->hasPermissionTo('view-committee-categories'))
                <li class="nav-item">
                    <a href="{{ route('committeeCategories.index') }}"
                        class="nav-link {{ Request::is('committeeCategories*') ? 'active' : '' }}">
                        <span class="material-symbols-outlined">
                            category
                        </span>
                        <p>Committee Categories</p>
                    </a>
                </li>
            @endif
            @if (auth()->guard('admin')->user()->hasPermissionTo('view-committee-members'))
                <li class="nav-item">
                    <a href="{{ route('committeeMembers.index') }}"
                        class="nav-link {{ Request::is('committeeMembers*') ? 'active' : '' }}">
                        <span class="material-symbols-outlined">
                            list
                        </span>
                        <p>List of Committee members</p>
                    </a>
                </li>
            @endif
        </ul>
    </li>
@endif
<!-- ---------------------------end--------------------------- -->
<!-- --------------------------- Donations--------------------------- -->
@if (auth()->guard('admin')->user()->hasPermissionTo('view-donation-categories') ||
        auth()->guard('admin')->user()->hasPermissionTo('view-donations'))
    <li class="nav-item">
        <a href="#" class="nav-link">
            <span class="material-symbols-outlined">
                attach_money
            </span>
            <p>
                <span class="material-symbols-outlined arrow_right">
                    arrow_right
                </span>
                Donations
            </p>
        </a>
        <ul class="nav nav-treeview">
            @if (auth()->guard('admin')->user()->hasPermissionTo('view-donation-categories'))
                <li class="nav-item">
                    <a href="{{ route('donationCategories.index') }}"
                        class="nav-link {{ Request::is('donationCategories*') ? 'active' : '' }}">
                        <span class="material-symbols-outlined">
                            category
                        </span>
                        <p>Donation Categories</p>
                    </a>
                </li>
            @endif
            @if (auth()->guard('admin')->user()->hasPermissionTo('view-donations'))
                <li class="nav-item">
                    <a href="{{ route('donations.index') }}"
                        class="nav-link {{ Request::is('donations*') ? 'active' : '' }}">
                        <span class="material-symbols-outlined">
                            list
                        </span>
                        <p>Donations List</p>
                    </a>
                </li>
            @endif
        </ul>
    </li>
@endif
<!-- ---------------------------end--------------------------- -->
<!-- ---------------------------Gallery--------------------------- -->
@if (auth()->guard('admin')->user()->hasPermissionTo('view-photo-categories') ||
        auth()->guard('admin')->user()->hasPermissionTo('view-photo-gallery') ||
        auth()->guard('admin')->user()->hasPermissionTo('view-video-categories') ||
        auth()->guard('admin')->user()->hasPermissionTo('view-video-gallery'))
    <li class="nav-item">
        <a href="{{ route('photoGalleries.index') }}"
            class="nav-link {{ Request::is('photoGalleries*') ? 'active' : '' }}">
            <span class="material-symbols-outlined">
                gallery_thumbnail
            </span>
            <p>
                Gallery
            </p>
        </a>
    </li>
@endif
<!-- ---------------------------end--------------------------- -->
<!-- ---------------------------New Coverage--------------------------- -->
@if (auth()->guard('admin')->user()->hasPermissionTo('view-news-coverage-categories') ||
        auth()->guard('admin')->user()->hasPermissionTo('view-news-coverage'))
    <li class="nav-item">
        <a href="#" class="nav-link">
            <span class="material-symbols-outlined">
                auto_awesome_mosaic
            </span>
            <p>
                <span class="material-symbols-outlined arrow_right">
                    arrow_right
                </span>
                News Coverage
            </p>
        </a>
        <ul class="nav nav-treeview">
            @if (auth()->guard('admin')->user()->hasPermissionTo('view-news-coverage-categories'))
                <li class="nav-item">
                    <a href="{{ route('newsCoverageCategories.index') }}"
                        class="nav-link {{ Request::is('newsCoverageCategories*') ? 'active' : '' }}">
                        <span class="material-symbols-outlined">
                            category
                        </span>
                        <p>News Coverage Categories</p>
                    </a>
                </li>
            @endif
            @if (auth()->guard('admin')->user()->hasPermissionTo('view-news-coverage'))
                <li class="nav-item">
                    <a href="{{ route('newsCoverages.index') }}"
                        class="nav-link {{ Request::is('newsCoverages*') ? 'active' : '' }}">
                        <span class="material-symbols-outlined">
                            list
                        </span>
                        <p>News Coverage List</p>
                    </a>
                </li>
            @endif
        </ul>
    </li>
@endif
<!-- ---------------------------end--------------------------- -->
<!-- ---------------------------Home--------------------------- -->
@if (auth()->guard('admin')->user()->hasPermissionTo('view-home-page-slider') ||
        auth()->guard('admin')->user()->hasPermissionTo('view-home-page-blocks'))
    <li class="nav-item">
        <a href="#" class="nav-link">
            <span class="material-symbols-outlined">
                home
            </span>
            <p>
                <span class="material-symbols-outlined arrow_right">
                    arrow_right
                </span>
                Home Page
            </p>
        </a>
        <ul class="nav nav-treeview">
            @if (auth()->guard('admin')->user()->hasPermissionTo('view-home-page-slider'))
                <li class="nav-item">
                    <a href="{{ route('sliders.index') }}"
                        class="nav-link {{ Request::is('sliders*') ? 'active' : '' }}">
                        <span class="material-symbols-outlined">
                            slideshow
                        </span>
                        <p>Homepage Sliders</p>
                    </a>
                </li>
            @endif
            @if (auth()->guard('admin')->user()->hasPermissionTo('view-home-page-blocks'))
                <li class="nav-item">
                    <a href="{{ url('home-page-blocks') }}"
                        class="nav-link {{ Request::is('home-page-blocks*') ? 'active' : '' }}">
                        <span class="material-symbols-outlined">
                            grid_view
                        </span>
                        <p>Home Page Blocks</p>
                    </a>
                </li>
            @endif
        </ul>
    </li>
@endif
<!-- ---------------------------end--------------------------- -->
<!-- ---------------------------Pages--------------------------- -->
@if (auth()->guard('admin')->user()->hasPermissionTo('view-pages'))
    <li class="nav-item">
        <a href="{{ route('cms.index') }}" class="nav-link {{ Request::is('cms*') ? 'active' : '' }}">
            <span class="material-symbols-outlined">
                file_copy
            </span>
            <p>Pages</p>
        </a>
    </li>
@endif
<!-- ---------------------------end--------------------------- -->
<!-- ---------------------------Media--------------------------- -->
@if (auth()->guard('admin')->user()->hasPermissionTo('view-media'))
    <li class="nav-item">
        <a href="{{ url('media') }}" class="nav-link {{ request()->get('type') == 'media' ? 'active' : '' }}">
            <i class="nav-icon  fab fa-buffer"></i>
            <p>Media </p>
        </a>
    </li>
@endif
<!-- ---------------------------end--------------------------- -->
<!-- ---------------------------Sponsors--------------------------- -->
@if (auth()->guard('admin')->user()->hasPermissionTo('view-sponsors') ||
        auth()->guard('admin')->user()->hasPermissionTo('view-sponsor-categories'))
    <li class="nav-item">
        <a href="{{ route('sponsors.index') }}" class="nav-link {{ Request::is('sponsors*') ? 'active' : '' }}">
            <span class="material-symbols-outlined">
                handshake
            </span>
            <p>Sponsors & Partners</p>
        </a>
    </li>
@endif
<!-- ---------------------------end--------------------------- -->
<!-- ---------------------------News--------------------------- -->
@if (auth()->guard('admin')->user()->hasPermissionTo('view-news'))
    <li class="nav-item">
        <a href="{{ route('news.index') }}" class="nav-link {{ Request::is('news') ? 'active' : '' }}">
            <span class="material-symbols-outlined">
                feed
            </span>
            <p>News</p>
        </a>
    </li>
@endif
<!-- ---------------------------end--------------------------- -->
<!-- ---------------------------Configuration--------------------------- -->
<li class="nav-item">
    @if (auth()->guard('admin')->user()->hasPermissionTo('view-application-settings'))
        <a href="#" class="nav-link">
            <span class="material-symbols-outlined">
                settings
            </span>
            <p>
                <span class="material-symbols-outlined arrow_right">
                    arrow_right
                </span>
                Application Settings
            </p>
        </a>
    @endif
    <ul class="nav nav-treeview">
        <li class="nav-item">
            </a>
            <a href="{{ url('application-settings') }}"
                class="nav-link {{ Request::is('application-settings*') ? 'active' : '' }}">
                <span class="material-symbols-outlined">
                    tune
                </span>
                <p>Configuration</p>
            </a>
        </li>
        @if (auth()->guard('admin')->user()->hasPermissionTo('view-general-settings'))
            <li class="nav-item">
                <a href="{{ url('general-settings') }}"
                    class="nav-link {{ Request::is('general-settings*') ? 'active' : '' }}">
                    <span class="material-symbols-outlined">
                        settings_applications
                    </span>
                    <p>General Settings</p>
                </a>
            </li>
        @endif
    </ul>
</li>
<!-- ---------------------------end--------------------------- -->
<!-- ---------------------------payments--------------------------- -->
@if (auth()->guard('admin')->user()->hasPermissionTo('view-payment-methods') ||
        auth()->guard('admin')->user()->hasPermissionTo('view-transactions'))
    <li class="nav-item">
        <a href="#" class="nav-link">
            <span class="material-symbols-outlined">
                payments
            </span>
            <p>
                <span class="material-symbols-outlined arrow_right">
                    arrow_right
                </span>
                Payments Settings
            </p>
        </a>
        <ul class="nav nav-treeview">
            @if (auth()->guard('admin')->user()->hasPermissionTo('view-payment-methods'))
                <li class="nav-item">
                    <a href="{{ url('paymentMethods') }}"
                        class="nav-link {{ Request::is('paymentMethods*') ? 'active' : '' }}">
                        <span class="material-symbols-outlined">
                            payments
                        </span>
                        <p>Payment Methods</p>
                    </a>
                </li>
            @endif
            @if (auth()->guard('admin')->user()->hasPermissionTo('view-transactions'))
                <li class="nav-item">
                    <a href="{{ url('transactions') }}"
                        class="nav-link {{ Request::is('transactions*') ? 'active' : '' }}">
                        <span class="material-symbols-outlined">
                            receipt_long
                        </span>
                        <p>Transactions</p>
                    </a>
                </li>
            @endif
        </ul>
    </li>
@endif
<!-- ---------------------------end--------------------------- -->
{{-- <!-- ---------------------------General Settings--------------------------- -->
<li class="nav-item">
<a href="{{ url('general-settings') }}"
class="nav-link {{ Request::is('general-settings*') ? 'active' : '' }}">
<span class="material-symbols-outlined">
settings
</span>
<p>General Settings</p>
</a>
</li>
<!-- ---------------------------end--------------------------- --> --}}
<!-- ---------------------------  Developer Settings--------------------------- -->
@if (auth()->guard('admin')->user()->hasPermissionTo('view-developer-settings-categories') ||
        auth()->guard('admin')->user()->hasPermissionTo('view-developer-settings-list') ||
        auth()->guard('admin')->user()->hasPermissionTo('view-developer-settings') ||
        auth()->guard('admin')->user()->hasPermissionTo('view-permissions') ||
        auth()->guard('admin')->user()->hasPermissionTo('view-roles'))
    <li class="nav-item">
        <a href="#" class="nav-link">
            <span class="material-symbols-outlined">
                manage_accounts
            </span>
            <p>
                <span class="material-symbols-outlined arrow_right">
                    arrow_right
                </span>
                Developer Settings
            </p>
        </a>
        <ul class="nav nav-treeview">
            @if (auth()->guard('admin')->user()->hasPermissionTo('view-developer-settings-categories'))
                <li class="nav-item">
                    <a href="{{ route('categories.index') }}"
                        class="nav-link {{ Request::is('categories*') ? 'active' : '' }}">
                        <span class="material-symbols-outlined">
                            category
                        </span>
                        <p>Categories</p>
                    </a>
                </li>
            @endif
            @if (auth()->guard('admin')->user()->hasPermissionTo('view-developer-settings-list'))
                <li class="nav-item">
                    <a href="{{ route('applicationSettings.index') }}"
                        class="nav-link {{ Request::is('applicationSettings*') ? 'active' : '' }}">
                        <span class="material-symbols-outlined">
                            list
                        </span>
                        <p>List</p>
                    </a>
                </li>
            @endif
            @if (auth()->guard('admin')->user()->hasPermissionTo('view-developer-settings'))
                <li class="nav-item">
                    <a href="{{ url('developer-settings') }}"
                        class="nav-link {{ Request::is('developer-settings*') ? 'active' : '' }}">
                        <span class="material-symbols-outlined">
                            settings
                        </span>
                        <p>Settings</p>
                    </a>
                </li>
            @endif
            @if (auth()->guard('admin')->user()->hasPermissionTo('view-permissions'))
                <li class="nav-item">
                    <a href="{{ route('permissions.index') }}"
                        class="nav-link {{ Request::is('permissions*') ? 'active' : '' }}">
                        <span class="material-symbols-outlined">
                            supervised_user_circle
                        </span>
                        <p> User Management Permissions</p>
                    </a>
                </li>
            @endif
            @if (auth()->guard('admin')->user()->hasPermissionTo('view-roles'))
                <li class="nav-item">
                    <a href="{{ route('roles.index') }}"
                        class="nav-link {{ Request::is('roles*') ? 'active' : '' }}">
                        <span class="material-symbols-outlined">
                            verified_user
                        </span>
                        <p> User Management Roles</p>
                    </a>
                </li>
            @endif
        </ul>
    </li>
@endif
<!-- ---------------------------end--------------------------- -->
<!-- --------------------------- Payments --------------------------- -->
{{-- <li class="nav-item">
<a href="{{ route('paymentMethods.index') }}" class="nav-link {{ Request::is('paymentMethods*') ? 'active' : '' }}">
<i class="nav-icon fas fa-home"></i>
<p>Payment Methods</p>
</a>
</li> --}}
{{-- <li class="nav-item">
<a href="{{ route('transactions.index') }}" class="nav-link {{ Request::is('transactions*') ? 'active' : '' }}">
<i class="nav-icon fas fa-home"></i>
<p>Transactions</p>
</a>
</li> --}}
@if (auth()->guard('admin')->user()->hasPermissionTo('view-mail-templates'))
    <li class="nav-item">
        <a href="{{ route('mailTemplates.index') }}"
            class="nav-link {{ Request::is('mailTemplates*') ? 'active' : '' }}">
            <span class="material-symbols-outlined">
                dynamic_feed
            </span>
            <p>Mail Templates</p>
        </a>
    </li>
@endif
<li class="nav-item user-menu mobileMenu">
    <a href="{{ url('send-email') }}" class="nav-link" target="_self">
        <span class="material-symbols-outlined">
            forward_to_inbox
        </span>
        <p> Send Mails</p>
    </a>
</li>
<li class="nav-item user-menu mobileMenu">
    <a href="https://login.mailchimp.com/" class="nav-link" target="_blank">
        <span class="material-symbols-outlined">
            person_pin
        </span>
        <p>Mailchimp</p>
    </a>
</li>
<li class="nav-item user-menu mobileMenu">
    <a href="{{ url('/') }}" class="nav-link" target="_blank">
        <span class="material-symbols-outlined">
            home
        </span>
        <p>Frontend</p>
    </a>
</li>
<li class="nav-item user-menu mobileMenu" style="margin-bottom: 100px">
    <a href="{{ route('enquiries.index') }}" class="nav-link  {{ Request::is('enquiries*') ? 'active' : '' }}"
        target="_blank">
        <span class="material-symbols-outlined">
            contact_support
        </span>
        <p>Enquiries</p>
    </a>
</li>
<!-- ---------------------------  end--------------------------- -->

<li class="nav-item">
    <a href="{{ route('serviceCategories.index') }}" class="nav-link {{ Request::is('serviceCategories*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Service Categories</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('services.index') }}" class="nav-link {{ Request::is('services*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Services</p>
    </a>
</li>
