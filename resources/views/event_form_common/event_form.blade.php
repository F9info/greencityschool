<input type="hidden" name="event_id" value="{{ $event->id }}">

<input type="hidden" name="user_id" value="{{ Auth::check() ? Auth::user()->id : null }}">

<!-- Card title -->
<div class="col-sm-12 row form_heading">
    <div class="col-md-6">
        <h2>
            <span class="material-symbols-outlined">
                contact_emergency
            </span>
            Details
        </h2>
    </div>
    <div class="col-md-6 text-right">
        <p>(Please fill your Personal details)</p>
    </div>
</div>
<!-- Card title end -->

<!-- Card -->
<div class="card col-sm-12">
    <div class="card-body row">
        <!-- First Name Field -->
        <div class=" form-group col-sm-6">

            {!! Form::text('first_name', Auth::check() ? Auth::user()->first_name : null, [
                'class' => 'form-control letters-input',
                'id' => 'first_name',
                'required',
                'data-parsley-pattern' => '[a-zA-Z .]*',
                'minlength' => '2',
                'maxlength' => '50',
                'data-parsley-required-message' => 'Please enter your first name',
            ]) !!}
            {!! Form::label('first_name', 'First Name:') !!}
        </div>

        <!-- Last Name Field -->
        <div class=" form-group col-sm-6">

            {!! Form::text('last_name', Auth::check() ? Auth::user()->last_name : null, [
                'class' => 'form-control letters-input',
                'id' => 'last_name',
                'required',
                'data-parsley-pattern' => '[a-zA-Z .]*',
                'minlength' => '2',
                'maxlength' => '50',
                'data-parsley-required-message' => 'Please enter your last name',
            ]) !!}
            {!! Form::label('last_name', 'Last Name:') !!}
        </div>

        <!-- Email Field -->
        <div class="form-group col-sm-6">

            {!! Form::email('email', Auth::check() ? Auth::user()->email : null, [
                'class' => 'form-control',
                'required',
                'maxlength' => '100',
                'data-parsley-error-message' => 'Please enter a valid email address',
            ]) !!}
            {!! Form::label('email', 'Email:') !!}
        </div>

        <!-- Phone Field -->
        <div class=" form-group col-sm-6">
            <input type="text" class="form-control digits-only" name="phone"
                value="{{ Auth::check() ? Auth::user()->phone_no : null }}" class="form-control digitsonly"
                id="phone2" required minlength="12" maxlength="12"
                data-parsley-error-message="Please enter a valid phone number" data-parsley-pattern="[0-9-]*"
                inputmode="numeric">
            {!! Form::label('phone', 'Phone:') !!}
        </div>

    </div>
</div>

<!-- Card title -->
<div class="col-sm-12 row form_heading">
    <div class="col-md-6">
        <h2>
            <span class="material-symbols-outlined">
                location_on
            </span>
            Address Details
        </h2>
    </div>
    <div class="col-md-6 text-right">
        <p>(Please fill your address details)</p>
    </div>
</div>
<!-- Card title end -->

<!-- Card -->
<div class="card col-sm-12">
    <div class="card-body row">
        <!-- Address Field -->
        <div class="form-group select-area col-sm-12 col-lg-12 ">

            {!! Form::textarea('address', Auth::check() ? Auth::user()->personalDetails->address : null, [
                'class' => 'form-control',
                'maxlength' => '300',
                'minlength' => '10',
                'required',
                'data-parsley-required-message' => 'Please fill your address',
            ]) !!}
            {!! Form::label('address', 'Address:') !!}
        </div>

        <!-- State Field -->
        <div class="form-group select-area  col-sm-4 requiredSpan">

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
                Auth::check() ? Auth::user()->personalDetails->state : null,
                [
                    'class' => 'form-control select2',
                    'placeholder' => 'Select State',
                    'required',
                    'data-parsley-error-message' => 'Select your state',
                ],
            ) !!}
            {!! Form::label('state', 'State:') !!}
        </div>

        <!-- City Field -->
        <div class=" form-group col-sm-4">

            {!! Form::text('city', Auth::check() ? Auth::user()->personalDetails->city : null, [
                'class' => 'form-control letters-input',
                'required',
            ]) !!}
            {!! Form::label('city', 'City:') !!}
        </div>

        <!-- Zipcode Field -->
        <div class=" form-group col-sm-4">

            {!! Form::text('zipcode', Auth::check() ? Auth::user()->personalDetails->zipcode : null, [
                'class' => 'form-control digitsonly',
                'maxlength' => '5',
                'minlength' => '5',
                'data-parsley-pattern' => '[0-9]*',
                'inputmode' => 'numeric',
                'required',
                'data-parsley-required-message' => 'Enter your zipcode',
                'data-parsley-error-message' => 'Enter a valid zipcode',
            ]) !!}
            {!! Form::label('zipcode', 'Zipcode:') !!}
        </div>
    </div>
</div>
