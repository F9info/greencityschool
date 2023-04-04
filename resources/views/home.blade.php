@extends('frontend.app')

@section('content')
    <!-- Page title -->
    <div class="inner-banner member-inner-banner">
        <div class="inner-page-title">
            <h1>My Account
            </h1>
        </div>
        <figure>
            <img src="{{ applicationSettings('profile-banner') != '' ? asset('images/site-images/' . applicationSettings('profile-banner')) : asset('images/inner_banner.jpg') }}"
                alt="{!! applicationSettings('site-name') !!}">
        </figure>
    </div>
    <!-- end: Page title -->

    <section class="member_profile">
        <div class="container">
            @include('flash::message')
            <div class="all_forms">
                <div class="card membership_details_card">
                    <div class="inner">
                        <h4>Membership Details</h4>
                        <ul>
                            <li>
                                <span class="material-symbols-outlined">
                                    arrow_circle_right
                                </span>
                                <em class="name">Current Membership
                                    :</em><em>{{ $personalDetails->membershipType != null ? $personalDetails->membershipType->membership_name : '' }}</em>
                            </li>

                            <li>
                                <span class="material-symbols-outlined">
                                    arrow_circle_right
                                </span>
                                <em class="name">Expires on :</em><em>
                                    @if (formatDate($user->expiry_date) != '')
                                        {{ formatDate($user->expiry_date) }}
                                    @else
                                        NA
                                    @endif
                                </em>
                            </li>

                            <li>
                                <span class="material-symbols-outlined">
                                    arrow_circle_right
                                </span>
                                <em class="name">Membership Status :</em>
                                @if (userExpiryStatus(Auth::user()->expiry_date))
                                    <em class="badgh">Active</em>
                                @else
                                    <em class="badgh" style="background: red">Expired</em>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- @if (memberInterestNames($personalDetails->child_interests) != '')
                    <ul class="member_list child_member_list">
                        <li><span>Child
                                Interests:
                            </span>{{ memberInterestNames($personalDetails->child_interests) }}
                        </li>
                    </ul>
                @endif --}}

                <div class="tabs">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->get('tab') != null ? '' : 'active' }}" id="member-profile-tab"
                                data-toggle="tab" href="#member-profile" role="tab" aria-controls="member-profile"
                                aria-selected="true">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " id="edit-profile-tab" data-toggle="tab" href="#edit-profile" role="tab"
                                aria-controls="edit-profile" aria-selected="true">Edit Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="change-password-profile-tab" data-toggle="tab"
                                href="#change-password-profile" role="tab" aria-controls="change-password-profile"
                                aria-selected="false">Change Password</a>
                        </li>
                        <li class="nav-item"
                            style="{{ $personalDetails->membershipType->lifetime == 1 ? 'display:none;' : 'display:block;' }}">
                            <a class="nav-link {{ request()->get('tab') != 'renew' ? '' : 'active' }}"
                                id="renew-membership-tab" data-toggle="tab" href="#renew-membership" role="tab"
                                aria-controls="renew-membership" aria-selected="true">Renew Membership</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="registerd-events-tab" data-toggle="tab" href="#registerd-events"
                                role="tab" aria-controls="registerd-events" aria-selected="false">Registerd Events</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade {{ request()->get('tab') != null ? '' : 'show active' }}"
                            id="member-profile" role="tabpanel" aria-labelledby="member-profile-tab">
                            <div class="memner_profile_section">
                                <a class="btn btn-primary edit_button" id="edit-profile-tab" data-toggle="tab"
                                    href="#edit-profile" role="tab" aria-controls="edit-profile"
                                    aria-selected="true"><span class="material-symbols-outlined">
                                        edit
                                    </span> Edit Profile</a>
                                <div class="clear"></div>

                                <div class="item">
                                    <div class="form_heading">
                                        <h2>
                                            <span class="material-symbols-outlined">
                                                contact_emergency
                                            </span>
                                            Personal Details
                                        </h2>
                                    </div>

                                    <div class="card">
                                        <ul class="member_list">
                                            <li><span>Name</span>: {{ $user->first_name }} {{ $user->last_name }}</li>
                                            <li><span>Id</span>: {{ $user->id }}</li>
                                            <li><span>Email</span>: {{ $user->email }}</li>
                                            <li><span>Gender</span>: {{ $personalDetails->gender }}</li>
                                            <li><span>Birth Date and Month</span>:
                                                {{ formatSpecialDate($personalDetails->date_of_birth) }}
                                            </li>
                                            <li><span>Wedding
                                                    Anniversary</span>:
                                                {{ formatSpecialDate($personalDetails->wedding_anniversary) }}
                                            </li>
                                            <li><span>Phone</span>: {{ $user->phone_no }}</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="form_heading">
                                        <h2><span class="material-symbols-outlined">
                                                location_on
                                            </span> Address Details</h2>
                                    </div>
                                    <div class="card">
                                        <ul class="member_list">
                                            <li class="full_width"><span>Address</span>: {{ $personalDetails->address }}
                                            </li>
                                            <li><span>State</span>: {{ $personalDetails->state }}</li>
                                            <li><span>City</span>: {{ $personalDetails->city }}</li>
                                            <li><span>Zipcode</span>: {{ $personalDetails->zipcode }}</li>
                                            <li><span>Native State</span>: {{ $personalDetails->native_state }}</li>
                                            <li><span>Native District</span>: {{ $personalDetails->native_district }}</li>
                                            <li><span>Native City</span>: {{ $personalDetails->native_city }}</li>
                                        </ul>
                                    </div>
                                </div>



                                <div class="item">
                                    <div class="form_heading">
                                        <h2><span class="material-symbols-outlined">
                                                family_restroom
                                            </span> Spouse Details</h2>
                                    </div>
                                    <div class="card">
                                        <ul class="member_list">
                                            <li><span>Spouse Name</span>: {{ $personalDetails->spouse_first_name }}
                                                {{ $personalDetails->spouse_last_name }}</li>
                                            <li><span>Spouse Gender</span>: {{ $personalDetails->spouse_gender }}</li>
                                            <li><span>Birth Date and Month</span>:
                                                {{ formatSpecialDate($personalDetails->spouse_date_of_birth) }}
                                            </li>
                                            <li><span>Spouse Native State</span>:
                                                {{ $personalDetails->spouse_native_state }}
                                            </li>
                                            <li><span>Spouse Native
                                                    District</span>: {{ $personalDetails->spouse_native_district }}</li>
                                            <li><span>Spouse Native City</span>: {{ $personalDetails->spouse_native_city }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="form_heading">
                                        <h2><span class="material-symbols-outlined">
                                                face
                                            </span> Child Details</h2>
                                    </div>
                                    <div class="card">
                                        @isset($child_details)
                                            @foreach ($child_details as $child_detail)
                                                <ul class="member_list child_member_list">
                                                    <li><span>Child Name</span>: {{ $child_detail->child_name }} </li>
                                                    <li><span>Child Age</span>: {{ $child_detail->age }} </li>
                                                    <li><span>Child Gender</span>: {{ $child_detail->gender }} </li>
                                                    <li><span>Birth Date and Month</span>:
                                                        {{ $child_detail->date_of_birth }} </li>
                                                </ul>
                                            @endforeach
                                        @endisset
                                    </div>
                                </div>



                                <div class="item">
                                    <div class="form_heading">
                                        <h2><span class="material-symbols-outlined">
                                                front_hand
                                            </span> Become a Volunteer</h2>
                                    </div>
                                    <div class="card">
                                        @if (memberInterestNames($personalDetails->member_interests) != '')
                                            <ul class="member_list child_member_list">
                                                <li><span>Member
                                                        Interests
                                                    </span>: {{ memberInterestNames($personalDetails->member_interests) }}
                                                </li>
                                            </ul>
                                        @endif
                                        @if (memberInterestNames($personalDetails->spouse_interests) != '')
                                            <ul class="member_list child_member_list">
                                                <li><span>Spouse
                                                        Interests
                                                    </span>: {{ memberInterestNames($personalDetails->spouse_interests) }}
                                                </li>
                                            </ul>
                                        @endif

                                        @if (memberInterestNames($personalDetails->child_interests) != '')
                                            <ul class="member_list child_member_list">
                                                <li><span>Child
                                                        Interests
                                                    </span>: {{ memberInterestNames($personalDetails->child_interests) }}
                                                </li>
                                            </ul>
                                        @endif


                                    </div>
                                </div>
                                <div class="item preferred_communication">
                                    <div class="form_heading">
                                        <h2><span class="material-symbols-outlined">
                                                add_call
                                            </span> Preferred Communication</h2>
                                    </div>
                                    <div class="card">
                                        @if ($communicationDetail->facebook)
                                            <div class="list">
                                                <label>
                                                    <svg width="27" height="27" viewBox="0 0 27 27"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M27 13.5C27 6.04336 20.9566 0 13.5 0C6.04336 0 0 6.04336 0 13.5C0 20.2389 4.93383 25.824 11.3917 26.8371V17.4055H7.96658V13.5H11.3917V10.5263C11.3917 7.14551 13.4035 5.27449 16.4885 5.27449C17.9677 5.27449 19.5138 5.5408 19.5138 5.5408V8.86201H17.8126C16.1336 8.86201 15.6157 9.9051 15.6157 10.9703V13.5H19.3588L18.7597 17.4055H15.6157V26.8371C22.0662 25.824 27 20.2389 27 13.5Z" />
                                                    </svg>

                                                    Facebook</label>
                                            </div>
                                        @endif




                                        @if ($communicationDetail->twitter)
                                            <div class="list">
                                                <label>
                                                    <svg width="27" height="27" viewBox="0 0 27 27"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M26.9998 13.4999C26.9998 20.9557 20.9557 26.9998 13.4999 26.9998C6.0441 26.9998 0 20.9557 0 13.4999C0 6.0441 6.0441 0 13.4999 0C20.9557 0 26.9998 6.0441 26.9998 13.4999ZM19.9156 10.2094C20.5682 10.132 21.1905 9.95845 21.7691 9.70192C21.3366 10.349 20.7896 10.9172 20.1586 11.372C20.1649 11.5101 20.168 11.6495 20.168 11.7893C20.168 16.0538 16.9222 20.9707 10.9868 20.9707C9.16462 20.9707 7.46806 20.4367 6.04077 19.5208C6.29273 19.5509 6.55022 19.5661 6.81012 19.5661C8.32236 19.5661 9.71354 19.0504 10.8181 18.1848C9.40576 18.1585 8.21431 17.2255 7.80376 15.9438C8.00061 15.9814 8.20251 16.0014 8.41091 16.0014C8.70475 16.0014 8.9904 15.9621 9.26088 15.888C7.78499 15.5918 6.67223 14.2877 6.67223 12.7242C6.67223 12.7107 6.67223 12.697 6.67247 12.6833C7.10732 12.9256 7.60522 13.0707 8.13393 13.0874C7.26856 12.5088 6.69846 11.5207 6.69846 10.4015C6.69846 9.81021 6.85777 9.25551 7.13548 8.77903C8.72713 10.7319 11.105 12.0165 13.7868 12.151C13.7314 11.9147 13.7028 11.6685 13.7028 11.4156C13.7028 9.63381 15.1479 8.18872 16.9296 8.18872C17.8583 8.18872 18.6969 8.5805 19.2856 9.20739C20.0203 9.06276 20.7112 8.79443 21.3347 8.42456C21.0933 9.17851 20.5819 9.81021 19.9156 10.2094Z" />
                                                    </svg>
                                                    Twitter</label>
                                            </div>
                                        @endif



                                        @if ($communicationDetail->instagram)
                                            <div class="list">
                                                <label>
                                                    <svg width="27" height="27" viewBox="0 0 27 27"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M0 13.5C0 6.04445 6.04445 0 13.5 0C20.9555 0 27 6.04445 27 13.5C27 20.9555 20.9555 27 13.5 27C6.04445 27 0 20.9555 0 13.5ZM17.5236 21.657C19.783 21.657 21.6206 19.8194 21.6206 17.56V9.51278C21.6206 7.2537 19.783 5.41576 17.5236 5.41576H9.47638C7.21731 5.41576 5.37936 7.2537 5.37936 9.51278V17.56C5.37936 19.8194 7.21731 21.657 9.47638 21.657H17.5236ZM17.5237 7.18335H9.47644C8.19198 7.18335 7.14697 8.22836 7.14697 9.51281V17.5601C7.14697 18.8445 8.19198 19.8898 9.47644 19.8898H17.5237C18.8081 19.8898 19.8534 18.8448 19.8534 17.5601V9.51281C19.8534 8.22836 18.8084 7.18335 17.5237 7.18335ZM13.5001 17.7195C11.1938 17.7195 9.31731 15.843 9.31731 13.5364C9.31731 11.2301 11.1938 9.35369 13.5001 9.35369C15.8067 9.35369 17.6831 11.2301 17.6831 13.5364C17.6831 15.8427 15.8064 17.7195 13.5001 17.7195ZM17.8176 10.2185C17.2716 10.2185 16.8276 9.77452 16.8276 9.22885C16.8276 8.68318 17.2716 8.23919 17.8176 8.23919C18.3632 8.23919 18.8072 8.68318 18.8072 9.22885C18.8072 9.77452 18.3632 10.2185 17.8176 10.2185ZM13.5 11.1212C12.1686 11.1212 11.0845 12.2047 11.0845 13.5361C11.0845 14.8681 12.1686 15.9519 13.5 15.9519C14.8319 15.9519 15.9152 14.8681 15.9152 13.5361C15.9152 12.205 14.8316 11.1212 13.5 11.1212Z" />
                                                    </svg>
                                                    Instagram</label>
                                            </div>
                                        @endif


                                        @if ($communicationDetail->whatsapp)
                                            <div class="list">
                                                <label>
                                                    <svg width="27" height="27" viewBox="0 0 27 27"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M0 13.5C0 6.0588 6.0588 0 13.5 0C20.9466 0 27 6.0534 27 13.5C27 20.9466 20.9412 27 13.5 27C6.0588 27 0 20.9412 0 13.5ZM10.2978 20.0502C11.4804 20.682 12.798 21.0114 14.1372 21.0114C18.63 21.0114 22.2912 17.3502 22.2912 12.8574C22.2912 8.3646 18.6354 4.7088 14.1426 4.7088C9.6498 4.7088 5.994 8.3646 5.994 12.8574C5.9886 14.4234 6.4422 15.9624 7.2954 17.2746L6.0534 20.0016C5.886 20.3634 6.048 20.7846 6.4044 20.9466C6.5556 21.0168 6.723 21.0276 6.885 20.9844L10.2978 20.0502ZM8.6832 16.794C6.5124 13.7808 7.1982 9.57961 10.2114 7.40881C13.2246 5.23801 17.4366 5.91841 19.6074 8.93161C21.7782 11.9448 21.0924 16.146 18.0792 18.3168C16.9344 19.143 15.5574 19.5858 14.148 19.5858C12.96 19.5858 11.7882 19.2672 10.7622 18.6678C10.6488 18.603 10.5246 18.5706 10.4004 18.5706C10.3356 18.5706 10.2708 18.5814 10.2114 18.5976L7.9812 19.2078L8.7534 17.5014C8.856 17.2692 8.829 16.9992 8.6832 16.794ZM16.6374 16.5888C17.2692 16.47 17.8902 16.0758 18.1386 15.471C18.2142 15.2928 18.2412 15.093 18.2088 14.904C18.1357 14.5704 17.7453 14.3528 17.434 14.1792C17.3774 14.1477 17.3235 14.1176 17.2746 14.0886C16.9344 13.8834 16.4916 13.6566 16.0866 13.8186C15.8697 13.9084 15.7098 14.1665 15.5655 14.3992C15.5015 14.5025 15.4406 14.6008 15.3792 14.6772C15.2766 14.8014 15.1524 14.823 14.9958 14.7582C13.8402 14.2938 12.9492 13.5216 12.312 12.4578C12.204 12.2958 12.2256 12.1608 12.3552 12.0096C12.3708 11.9914 12.3867 11.9731 12.4027 11.9545C12.5873 11.741 12.7965 11.4989 12.8412 11.2158C12.8898 10.9134 12.7494 10.5516 12.6252 10.2816C12.6031 10.2338 12.5808 10.1833 12.5577 10.1312C12.4114 9.80089 12.2372 9.40733 11.934 9.23941C11.61 9.05581 11.1888 9.15841 10.9026 9.39061C10.4112 9.79561 10.1736 10.422 10.179 11.0484C10.179 11.2212 10.2006 11.3994 10.2438 11.5722C10.341 11.988 10.53 12.3768 10.746 12.7386C10.9026 13.014 11.0808 13.2786 11.2698 13.5378C11.8908 14.3802 12.663 15.1038 13.554 15.6546C14.0022 15.93 14.4828 16.1568 14.9796 16.3296C15.0245 16.3444 15.069 16.3593 15.1132 16.3741C15.6167 16.5426 16.0814 16.698 16.6374 16.5888Z" />
                                                    </svg>
                                                    Whatsapp</label>
                                            </div>
                                        @endif


                                        @if ($communicationDetail->email)
                                            <div class="list">
                                                <label>
                                                    <svg width="27" height="27" viewBox="0 0 27 27"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M13.5 0C6.042 0 0 6.042 0 13.5C0 20.958 6.042 27 13.5 27C20.958 27 27 20.958 27 13.5C27 6.042 20.958 0 13.5 0ZM6.75 6.75H20.25C20.49 6.75 20.724 6.804 20.94 6.9L13.5 15.576L6.06 6.9C6.276 6.798 6.51 6.75 6.75 6.75ZM5.064 18.564V8.436C5.064 8.4 5.064 8.364 5.07 8.328L10.02 14.1L5.124 18.996C5.082 18.858 5.064 18.708 5.064 18.564ZM20.25 20.25H6.75C6.6 20.25 6.456 20.232 6.312 20.19L11.112 15.39L13.494 18.168L15.876 15.39L20.676 20.19C20.55 20.232 20.4 20.25 20.25 20.25ZM21.936 18.564C21.936 18.714 21.918 18.858 21.876 19.002L16.98 14.106L21.93 8.334C21.93 8.37 21.936 8.406 21.936 8.442V18.564Z" />
                                                    </svg>
                                                    Email</label>
                                            </div>
                                        @endif

                                    </div>
                                </div>







                            </div>
                        </div>

                        <div class="tab-pane fade" id="edit-profile" role="tabpanel" aria-labelledby="edit-profile-tab">
                            <form id='profile-form' method="post" action="{{ url('update-profile') }}"
                                autocomplete="off">
                                @csrf
                                @isset($personalDetails)
                                    <input type="hidden" name="personalDetailsId" value="{{ $personalDetails->id }}" />
                                @endisset
                                @isset($communicationDetail)
                                    <input type="hidden" name="communicationDetailId"
                                        value="{{ $communicationDetail->id }}" />
                                @endisset



                                <div class="bs-callout bs-callout-warning hidden alert_danger">
                                    Please fill in all mandatory details before updating your profile!
                                </div>





                                <button type="submit" id="profileBtn" class="btn btn-primary edit_button">Update
                                    Profile</button>


                                <div class="clear"></div>

                                <div class="row">
                                    @include('membership_form_common.member_details')
                                    @include('membership_form_common.spouse_details')

                                    <!-- Card title -->
                                    <div class="col-sm-12 row form_heading">
                                        <div class="col-md-6">
                                            <h2>
                                                <span class="material-symbols-outlined">front_hand</span>
                                                Want to become a Volunteer
                                            </h2>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <p>(Please tick the required fields)</p>
                                        </div>
                                    </div>
                                    <!-- Card title end -->

                                    <!-- Card  -->
                                    <div class="card col-sm-12">
                                        <div class="card-body row">
                                            <div class="tabs">
                                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="member-tab" data-toggle="tab"
                                                            href="#member" role="tab" aria-controls="member"
                                                            aria-selected="true">Member</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="spouse-tab" data-toggle="tab"
                                                            href="#spouse" role="tab" aria-controls="spouse"
                                                            aria-selected="false">Spouse</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="child-tab" data-toggle="tab"
                                                            href="#child" role="tab" aria-controls="child"
                                                            aria-selected="false">Child</a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content" id="myTabContent">
                                                    @include('membership_form_common.become_volunteer')

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card  -->



                                    <!-- Card  -->
                                    <div class="card col-sm-12 profile-edit-communication">
                                        <div class="card-body row">
                                            @include('membership_form_common.communication')
                                        </div>
                                    </div>
                                    <!-- Card  -->






                                    <div class="update-btn">
                                        <button type="submit" id="profileBtn" class="btn btn-primary">Update
                                            Profile</button>
                                    </div>

                                </div>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="change-password-profile" role="tabpanel"
                            aria-labelledby="change-password-profile-tab">
                            <form id='update-password-form' method="post" action="{{ url('update-password') }}"
                                autocomplete="off">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />

                                <div class="card">

                                    <div class="row">
                                        <!-- Password Field -->
                                        <div class="form-group col-sm-6 password_validations  password_validations_eye">
                                            <input type="password" id="password" name="password"
                                                class="form-control  password_input_eye" autocomplete="off" required
                                                placeholder="New Password" required
                                                data-parsley-required-message="This field is required"
                                                data-parsley-group="first"
                                                data-parsley-pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z\d]).{8,}"
                                                data-parsley-error-message="" autocomplete="off" readonly
                                                onfocus="this.removeAttribute('readonly');" />
                                            {!! Form::label('password', 'Password:', ['class' => 'span_required']) !!}
                                            <div class="password_val_show">
                                                <ul class="password-strength" id="password-criteria">
                                                    <li id="length">
                                                        <span class="material-symbols-outlined span_check">
                                                            check_circle
                                                        </span>
                                                        <span class="material-symbols-outlined span_uncheck">
                                                            cancel
                                                        </span>
                                                        At least 8 characters which must include
                                                    </li>
                                                    <li id="special_characters">
                                                        <span class="material-symbols-outlined span_check">
                                                            check_circle
                                                        </span>
                                                        <span class="material-symbols-outlined span_uncheck">
                                                            cancel
                                                        </span>
                                                        One or more special characters (ex. !@#$%^&*)
                                                    </li>
                                                    <li id="number">
                                                        <span class="material-symbols-outlined span_check">
                                                            check_circle
                                                        </span>
                                                        <span class="material-symbols-outlined span_uncheck">
                                                            cancel
                                                        </span>
                                                        One or more numbers (0-9)
                                                    </li>
                                                    <li id="lowercase">
                                                        <span class="material-symbols-outlined span_check">
                                                            check_circle
                                                        </span>
                                                        <span class="material-symbols-outlined span_uncheck">
                                                            cancel
                                                        </span>
                                                        One or more lower case letters (a-z)
                                                    </li>
                                                    <li id="uppercase">
                                                        <span class="material-symbols-outlined span_check">
                                                            check_circle
                                                        </span>
                                                        <span class="material-symbols-outlined span_uncheck">
                                                            cancel
                                                        </span>
                                                        One or more upper case letters(A-Z)
                                                    </li>
                                                </ul>
                                            </div>
                                            <a href="javascript:void(0)" class="pwd-btn">
                                                <span class="material-symbols-outlined visibility_off">
                                                    visibility_off
                                                </span>
                                                <span class="material-symbols-outlined visibility">
                                                    visibility
                                                </span>
                                            </a>
                                        </div>

                                        <!-- Confirm Password Field -->
                                        <div class="form-group col-sm-6" id="password-match-label">

                                            <input type="password" class="form-control" id="password-confirm"
                                                name="password_confirmation" placeholder="Confirm Password" required
                                                data-parsley-equalto="#password"required data-parsley-group="first"
                                                data-parsley-required-message="This field is required"
                                                data-parsley-error-message="Password and confirm password should match"
                                                autocomplete="off" readonly onfocus="this.removeAttribute('readonly');">
                                            <label for="password_confirmation" class="span_required">Confirm
                                                Password:</label>
                                            {{-- {!! Form::password('password_confirmation', [
                                                'class' => 'form-control ',
                                                'id' => 'password-confirm',
                                                'required',
                                                'required data-parsley-equalto' => '#password',
                                                'data-parsley-group' => 'first',
                                                'data-parsley-required-message' => '',
                                                'data-parsley-error-message' => 'Password and confirm passeord should match',
                                                'autocomplete' => 'off',
                                            ]) !!}
                                            {!! Form::label('password_confirmation', 'Confirm Password:', ['class' => 'span_required']) !!} --}}
                                            <span class="material-symbols-outlined check_circle">
                                                check_circle
                                            </span>
                                            <span class="material-symbols-outlined cancel">
                                                cancel
                                            </span>
                                        </div>




                                    </div>

                                </div>

                                <div class="text-center"><button type="submit" id="passwordBtn"
                                        class="btn btn-primary">Update
                                        Password</button></div>
                            </form>

                        </div>

                        <div class="tab-pane fade {{ request()->get('tab') != 'renew' ? '' : 'show active' }}"
                            id="renew-membership" role="tabpanel" aria-labelledby="renew-membership-tab">

                            <form id='renewal-form' method="post" action="{{ url('renew-membership') }}"
                                autocomplete="off">
                                @csrf

                                <input type="hidden" name="type" value="renewal" />
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
                                @include('membership_form_common.membership_payment_details')

                                <div class="col-md-12">
                                    <div class="recapta_inner">
                                        <div class="g-recaptcha" data-callback="imNotARobot"
                                            data-sitekey="{!! applicationSettings('google-recaptcha-site-key') !!}">
                                        </div>
                                        <div class="clear"></div>
                                        <div id="captchaerrors"></div>
                                        <br />
                                        <button type="submit" id="renew_membership" class="btn btn-primary">Renew
                                            Membership</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="registerd-events" role="tabpanel"
                            aria-labelledby="registerd-events-tab">

                            @if ($eventRegistrations->count() > 0)
                                @foreach ($eventRegistrations as $reg)
                                    <div class="event_reg_card">
                                        <div class="card">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="inner">
                                                        <h2>{{ $reg->event->event_name }}</h2>
                                                        <p class="date"> <span
                                                                class="material-symbols-outlined check_circle">
                                                                event
                                                            </span>{{ date('D d M Y', strtotime($reg->event->reg_start_date)) }}
                                                            to {{ date('D d M Y', strtotime($reg->event->reg_end_date)) }}
                                                        </p>
                                                        <p class="loc"> <span
                                                                class="material-symbols-outlined check_circle">
                                                                location_on
                                                            </span>{{ $reg->event->location }}</p>
                                                        <p class="loc"> <span
                                                                class="material-symbols-outlined check_circle">
                                                                confirmation_number
                                                            </span><i>Adults: {{ $reg->adult_count }}</i> <i>Children:
                                                                {{ $reg->child_count }}</i> <i>Guest Adults:
                                                                {{ $reg->guest_adult_count }}</i>
                                                            <i>Guest Children: {{ $reg->guest_child_count }}</i>
                                                        </p>
                                                        <p class="loc"> <span
                                                                class="material-symbols-outlined check_circle">
                                                                monetization_on
                                                            </span>$
                                                            {{ $reg->transaction != null ? $reg->transaction->amount : '' }}
                                                            @if ($reg->transaction != null)
                                                                <i
                                                                    class="badge {{ $reg->transaction->payment_status == 'Success' ? 'badge-success' : 'badge-danger' }}">Payment
                                                                    {{ $reg->transaction->payment_status }}</i>
                                                        </p>
                                @endif

                        </div>
                    </div>
                    <div class="col-md-4">
                        <figure>
                            <img src="{{ asset('images/events/' . $reg->event->image) }}" alt="" />
                        </figure>
                    </div>
                </div>

            </div>
        </div>
        @endforeach
    @else
        <h4>You haven't registered for any event, to view our upcoming events <a
                href="{{ url('pages/latest-events') }}">Click Here</a></h4>
        @endif
        </div>
        </div>
        </div>
        </div>
        </div>
    </section>
    @if (session('renewal'))
        <!-- Modal -->
        <div id="modal-auto-open" class="modal modal-auto-open text-center cookie-notify spacing" data-delay="500">
            <span class="material-symbols-outlined colorgreen" style=" font-size:5em;">
                published_with_changes
            </span>
            <h2 class="modal-title">Member Renewal Successful</h2>
            <p>
                Thank you for renewing your membership.<br>
                A confirmation email has been sent to your email address.
            </p>
            <a class="btn btn-primary modal-close" href="#">Dismiss</a>
        </div>
    @endif

    @if (!userExpiryStatus(Auth::user()->expiry_date))
        <!-- Modal -->
        <div id="modal-auto-open" class="modal modal-auto-open text-center cookie-notify" data-delay="500"
            data-cookie-enabled="true" data-cookie-name="cookieName{{ date('Y') }}">
            <span class="material-symbols-outlined" style="color: red; font-size:5em;">
                cancel
            </span>
            <h2 class="modal-title">Your membership has expired!</h2>
            <p>
                Please renew your membership to avail membership benefits.
            </p>
            <a class="btn btn-primary modal-close" href="{{ url('/home?tab=renew') }}">Renew Membership</a>
        </div>
    @endif
@endsection

@include('pages.recaptcha')

@push('page_scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        function showAmount(amount) {
            document.getElementById("grand-total").innerHTML = "<h3>Grand Total : $" + amount + "</h3>";
            $('input.cheque_amount').val(amount);
            $('input.amount').val(amount);
            $('input.membership_amount').val(amount);
            setFinalAmount();
        }

        function generateReferenceNo() {
            var firstName = $('#first_name').val();
            var lastName = $('#last_name').val();
            var letters = firstName.charAt(0) + lastName.charAt(0);
            var date = "{{ date('YmdHis') }}";
            var uniqid = "{{ substr(uniqid(), 0, 4) }}";

            var refno = date + letters + uniqid;
            $('#quickrefno').text("quick_" + refno);
            $('#quick_pay_ref_id').val("quick_" + refno);
            $('#cheque_pay_ref_id').val("cheque_" + refno);
        }

        function setFinalAmount() {
            var payment_method = $('input[name="payment_method"]:checked').val();
            var membership_amount = $('.membership_amount').val();
            if (membership_amount != '' && payment_method != '') {
                var membershipamountparsed = parseInt(membership_amount);
                if (payment_method == 'stripe' || payment_method == 'paypal') {
                    var fees = "{!! applicationSettings('payment-gateway-fees') !!}";
                    var final_amount = membershipamountparsed + (membershipamountparsed * (fees / 100));
                    $('.payment_block_amount').show();
                    $('.payment_block_amount span').text("$" + final_amount.toFixed(2));
                    $('.amount').val(final_amount.toFixed(2));
                } else if (payment_method == 'cheque' || payment_method == 'quickpay') {
                    $('.payment_block_amount').show();
                    $('.payment_block_amount span').text("$" + membershipamountparsed.toFixed(2));
                    $('.amount').val(membershipamountparsed.toFixed(2));
                }
            } else {
                $('.payment_block_amount').hide();
                $('.amount').val(membership_amount);
            }
        }
        $('input[name="payment_method"]').prop('checked', false);
        var stripe = Stripe("{{ getStripeKey() }}");
        var elements = stripe.elements();
        var cardElement = elements.create('card');
        cardElement.mount('#card-element');

        function createToken() {
            event.preventDefault();
            $('#renewal-form').parsley().validate();
            document.getElementById("renew_membership").disabled = true;
            stripe.createToken(cardElement).then(function(result) {
                if (typeof result.error != 'undefined') {
                    document.getElementById("renew_membership").disabled = false;
                    $('#stripe-error').text(result.error.message);
                }

                // creating token success
                if (typeof result.token != 'undefined') {
                    document.getElementById("stripe-token-id").value = result.token.id;
                    $('#renewal-form').attr('action', "{{ url('/stripe/create-charge') }}");
                    document.getElementById('renewal-form').submit();
                }
            });
        }


        $(document).ready(function() {
            $(".payment_block").hide();
            $('input[type=radio][name=payment_method]').change(function() {
                setFinalAmount();
                $(".payment_block").hide();
                $("." + this.value).show();
                if (this.value == "cheque" || this.value == "quickpay") {
                    generateReferenceNo();
                }
            });
            $("#first_name, #last_name").on('change keyup paste', function() {
                generateReferenceNo();
            });
        });

        $("#renew_membership").click(function() {
            var response = grecaptcha.getResponse();
            if (response != '' && $('#renewal-form').parsley().isValid()) {
                var payment_method = $('input[name="payment_method"]:checked').val();
                if (payment_method == 'stripe') {
                    createToken();
                } else if (payment_method == 'paypal') {
                    $('#renewal-form').attr('action', "{{ url('/process-transaction') }}");
                    document.getElementById('renewal-form').submit();
                } else {
                    event.preventDefault();
                    document.getElementById('renewal-form').submit();
                }
            } else {
                event.preventDefault();
                $('#renewal-form').parsley().validate();
                if (response == '') {
                    $("#captchaerrors").text("Invalid Captcha");
                    $("#captchaerrors").addClass("captchaError");
                }
                return false;
            }
        });


        $(function() {
            $('#profile-form').parsley().on('field:validated', function() {
                var ok = $('.parsley-error').length === 0;
                window.scrollTo(0, 0);
                $('.bs-callout-info').toggleClass('hidden', !ok);
                $('.bs-callout-warning').toggleClass('hidden', ok);
            })

        });
    </script>
@endpush
