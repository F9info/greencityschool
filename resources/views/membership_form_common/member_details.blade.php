<!-- Card title -->

<div class="col-sm-12 row form_heading">
    <div class="col-md-6">
        <h2>
            <span class="material-symbols-outlined">
                contact_emergency
            </span>
            Personal Details
        </h2>
    </div>
    <div class="col-md-6 text-right">
        <p>(Please fill your personal details)</p>
    </div>
</div>
<!-- Card title end -->

<!-- Card -->
<div class="card col-sm-12">
    <div class="card-body row">
        <input type="hidden" name="type" value="membership" />
        <!-- First Name Field -->
        <div class="form-group col-sm-4">
            {!! Form::text('first_name', isset($user) ? $user->first_name : null, [
                'class' => 'form-control letters-input',
                'id' => 'first_name',
                'required',
                'data-parsley-pattern' => '[a-zA-Z .]*',
                'minlength' => '2',
                'maxlength' => '50',
                'data-parsley-required-message' => 'Please enter your first name',
            ]) !!}
            {!! Form::label('first_name', 'First Name:', ['class' => 'span_required']) !!}

        </div>

        <!-- Last Name Field -->
        <div class="form-group col-sm-4">
            {!! Form::text('last_name', isset($user) ? $user->last_name : null, [
                'class' => 'form-control letters-input',
                'id' => 'last_name',
                'required',
                'data-parsley-pattern' => '[a-zA-Z .]*',
                'minlength' => '2',
                'maxlength' => '50',
                'data-parsley-required-message' => 'Please enter your last name',
            ]) !!}
            {!! Form::label('last_name', 'Last Name:', ['class' => 'span_required']) !!}
        </div>

        <!-- Email Field -->
        <div class="form-group col-sm-4">
            {!! Form::email('email', isset($user) ? $user->email : null, [
                'class' => 'form-control',
                'required',
                'maxlength' => '100',
                isset($personalDetails) ? '' : 'data-parsley-checkemail',
                'data-parsley-checkemail-message' => 'Email Address already exists',
            ]) !!}
            {!! Form::label('email', 'Email:', ['class' => 'span_required']) !!}
        </div>

        <!-- Gender Field -->
        <div class="form-group select-area select-full-width col-sm-4">
            {!! Form::select(
                'gender',
                ['male' => 'MALE', 'female' => 'FEMALE'],
                isset($personalDetails) ? $personalDetails->gender : null,
                [
                    'class' => 'form-control select2',
                    'placeholder' => 'Select Gender',
                ],
            ) !!}
            {!! Form::label('gender', 'Gender:') !!}
        </div>

        <!-- Date Of Birth Field -->
        <div class="form-group col-sm-4">
            {!! Form::text(
                'date_of_birth',
                isset($personalDetails) ? formatSpecialDate($personalDetails->date_of_birth) : null,
                [
                    'class' => 'form-control datepicker',
                    'readonly',
                    'id' => 'date_of_birth',
                ],
            ) !!}
            {!! Form::label('date_of_birth', 'Birth Date and Month:') !!}


            <i class="fa fa-question-circle qtooltip" aria-hidden="true">
                <span>Your day and month details will be used to send wishes.</span>
            </i>


        </div>

        <!-- Wedding Anniversary Field -->
        <div class="form-group col-sm-4 ">
            {!! Form::text(
                'wedding_anniversary',
                isset($personalDetails) ? formatSpecialDate($personalDetails->wedding_anniversary) : null,
                [
                    'class' => 'form-control datepicker',
                    'readonly',
                    'id' => 'wedding_anniversary',
                ],
            ) !!}
            {!! Form::label('wedding_anniversary', 'Wedding Anniversary:') !!}
            <i class="fa fa-question-circle qtooltip" aria-hidden="true">
                <span>Your day and month details will be used to send wishes.</span>
            </i>

        </div>

        <!-- Phone No Field -->
        <div class="form-group col-sm-4">

            <input type="text" name="phone_no" value="{{ isset($user) ? $user->phone_no : null }}"
                class="form-control digitsonly" required id="phone" minlength="12" maxlength="12"
                data-parsley-error-message="Please enter a valid phone number" readonly
                onfocus="this.removeAttribute('readonly');" data-parsley-pattern="[0-9-]*" inputmode="numeric">
            {!! Form::label('phone_no', 'Phone No:', ['class' => 'span_required']) !!}
        </div>

        @if (!isset($user))
            <!-- Password Field -->
            <div class="form-group col-sm-4 password_validations  password_validations_eye">
                <input type="password" id="password" name="password" placeholder="Password"
                    class="form-control  password_input_eye" required
                    data-parsley-required-message="This value is required" data-parsley-group="first"
                    data-parsley-pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z\d]).{8,}"
                    data-parsley-error-message="" autocomplete="off" readonly
                    onfocus="this.removeAttribute('readonly');", />
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
            <div class="form-group col-sm-4" id="password-match-label">
                <input type="password" id="password-confirm" name="password_confirmation" class="form-control"
                    placeholder="Confirm Password" required data-parsley-group="first"
                    data-parsley-required-message="This value is required" data-parsley-equalto="#password"
                    data-parsley-pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z\d]).{8,}"
                    data-parsley-error-message="" autocomplete="off" readonly
                    onfocus="this.removeAttribute('readonly');" />
                {!! Form::label('password_confirmation', 'Confirm Password:', ['class' => 'span_required']) !!}
                <span class="material-symbols-outlined check_circle">
                    check_circle
                </span>
                <span class="material-symbols-outlined cancel">
                    cancel
                </span>

            </div>
        @endif
    </div>
</div>
<!-- Card End -->

<!-- Card title -->
<div class="col-sm-12 row form_heading sub_form_heading">
    <div class="col-md-6">
        <h2><span class="material-symbols-outlined">location_on</span>Address Details</h2>
    </div>
    <div class="col-md-6 text-right">
        <p>(Please fill your address details)</p>
    </div>
</div>
<!-- Card  -->

<div class="card col-sm-12">
    <div class="card-body row">
        <!-- Address Field -->
        <div class="form-group form-textarea col-sm-12 col-lg-12">
            {!! Form::textarea('address', isset($personalDetails) ? $personalDetails->address : null, [
                'class' => 'form-control',
                'maxlength' => '300',
                'minlength' => '10',
                'required',
                'data-parsley-required-message' => 'Please fill your address',
            ]) !!}
            {!! Form::label('address', 'Address:', ['class' => 'span_required']) !!}
        </div>

        <!-- State Field -->
        <div class="form-group select-area select-full-width col-sm-4 requiredSpan">
            {!! Form::select(
                'state',
                [
                    'IL' => 'IL',
                    'AL' => 'AL',
                    'AK' => 'AK',
                    'AZ' => 'AZ',
                    'AR' => 'AR',
                    'CA' => 'CA',
                    'CO' => 'CO',
                    'CT' => 'CT',
                    'DE' => 'DE',
                    'DC' => 'DC',
                    'FL' => 'FL',
                    'GA' => 'GA',
                    'HI' => 'HI',
                    'ID' => 'ID',
                    'IN' => 'IN',
                    'IA' => 'IA',
                    'KS' => 'KS',
                    'KY' => 'KY',
                    'LA' => 'LA',
                    'ME' => 'ME',
                    'MD' => 'MD',
                    'MA' => 'MA',
                    'MI' => 'MI',
                    'MN' => 'MN',
                    'MS' => 'MS',
                    'MO' => 'MO',
                    'MT' => 'MT',
                    'NE' => 'NE',
                    'NV' => 'NV',
                    'NH' => 'NH',
                    'NJ' => 'NJ',
                    'NM' => 'NM',
                    'NY' => 'NY',
                    'NC' => 'NC',
                    'ND' => 'ND',
                    'OH' => 'OH',
                    'OK' => 'OK',
                    'OR' => 'OR',
                    'PA' => 'PA',
                    'RI' => 'RI',
                    'SC' => 'SC',
                    'SD' => 'SD',
                    'TN' => 'TN',
                    'TX' => 'TX',
                    'UT' => 'UT',
                    'VT' => 'VT',
                    'VA' => 'VA',
                    'WA' => 'WA',
                    'WV' => 'WV',
                    'WI' => 'WI',
                    'WY' => 'WY',
                    'Other' => 'Other',
                    'India' => 'India',
                ],
                isset($personalDetails) ? $personalDetails->state : null,
                [
                    'class' => 'form-control select2 state_pincode',
                    'placeholder' => 'Select State',
                    'required',
                    'data-parsley-error-message' => 'Select your state',
                ],
            ) !!}
            {!! Form::label('state', 'State:', ['class' => 'span_required']) !!}
        </div>

        <!-- City Field -->
        <div class="form-group col-sm-4">
            {!! Form::text('city', isset($personalDetails) ? $personalDetails->city : null, [
                'class' => 'form-control letters-input',
                'required',
                'data-parsley-pattern' => '[a-zA-Z ]*',
                'minlength' => '2',
                'maxlength' => '50',
                'data-parsley-error-message' => 'Enter your city name',
            ]) !!}
            {!! Form::label('city', 'City:', ['class' => 'span_required']) !!}
        </div>

        <!-- Zipcode Field -->
        <div class="form-group col-sm-4">
            {!! Form::text('zipcode', isset($personalDetails) ? $personalDetails->zipcode : null, [
                'class' => 'form-control zipcode numbers-input',
                'maxlength' => '5',
                'minlength' => '5',
                'data-parsley-pattern' => '[0-9]*',
                'inputmode' => 'numeric',
                'required',
                'data-parsley-required-message' => 'Enter your zipcode',
                'data-parsley-error-message' => 'Enter a valid zipcode',
            ]) !!}
            {!! Form::label('zipcode', 'Zipcode:', ['class' => 'span_required']) !!}
        </div>

        <h5 class="col-sm-12 m-b-30">Please fill Native Place Details</h5>

        <!-- Native State Field -->
        <div class="form-group select-area select-full-width col-sm-4 ">
            {!! Form::select(
                'native_state',
                ['Andhra Pradesh' => 'Andhra Pradesh', 'Telangana' => 'Telangana', 'Other' => 'Other'],
                isset($personalDetails) ? $personalDetails->native_state : null,
                [
                    'class' => 'form-control select2',
                    'placeholder' => 'Select Native State',
                    'id' => 'NativeState',
            
                    'data-parsley-error-message' => 'Select your native state',
                ],
            ) !!}
            {!! Form::label('native_state', 'Native State:', ['class' => '']) !!}
        </div>

        <!-- Native District Field -->
        <div class="form-group select-area select-full-width col-sm-4 select-parsley-required">
            {!! Form::select('native_district', [], isset($personalDetails) ? $personalDetails->native_district : null, [
                'class' => 'form-control textonly select2',
                'placeholder' => 'Select District',
            
                'id' => 'district',
            ]) !!}
            {!! Form::text('native_district_other', isset($personalDetails) ? $personalDetails->native_district : null, [
                'class' => 'form-control textonly',
                'id' => 'district_other',
                'placeholder' => 'District name',
                'maxlength' => '50',
                'style' => 'display:none;',
            ]) !!}
            {!! Form::label('native_district', 'Native District:', ['class' => 'dropdown_label']) !!}
        </div>

        <!-- Native City Field -->
        <div class="form-group  letters-input  col-sm-4">
            {!! Form::text('native_city', isset($personalDetails) ? $personalDetails->native_city : null, [
                'class' => 'form-control',
                'maxlength' => '40',
                'minlength' => '2',
                'maxlength' => '50',
            ]) !!}
            {!! Form::label('native_city', 'Native City:', ['class' => 'span_not_required']) !!}
        </div>
    </div>
</div>
<!-- Card End -->

@push('page_scripts')
    <script type="text/javascript">
        var token = $('meta[name="csrf-token"]').attr("content");
        window.ParsleyValidator
            .addValidator('checkemail', function(value, requirement) {
                var response = false;

                $.ajax({
                    url: "{{ url('check-duplicate-email') }}",
                    method: "POST",
                    data: {
                        email: value,
                        _token: token
                    },
                    dataType: 'json',
                    type: 'post',
                    async: false,
                    success: function(data) {
                        if (data == 'error') {
                            response = false;
                        }
                        if (data == 'success') {
                            response = true;
                        }
                    }
                });
                return response;
            }, 32)
            .addMessage('en', 'checkemail', 'The username already exists.');
        $(document).ready(function() {
            $('#password').bind('paste', function(e) {
                e.preventDefault();
            });
        });
        $(document).ready(function() {
            $('#password-confirm').bind('paste', function(e) {
                e.preventDefault();
            });
        });
    </script>
@endpush
@include('membership_form_common.state-city')
