<input type="hidden" name="user_id" value="{{ Auth::check() ? Auth::user()->id : null }}" />

<input type="hidden" name="type" value="donation" />

<!-- Card title -->

<div class="col-sm-12 row form_heading">
    <div class="col-md-6">
        <h2>
            <span class="material-symbols-outlined">
                volunteer_activism
            </span>
            Donation Details
        </h2>
    </div>
    <div class="col-md-6 text-right">
        <p>(Please fill donation details)</p>
    </div>
</div>
<!-- Card title end -->

<!-- Card -->
<div class="card col-sm-12">
    <div class="card-body row">

        <!-- Donation Category Id Field -->
        <div class="form-group col-sm-6 select-area select_area_required">
            {!! Form::select('donation_category_id', $categories, null, [
                'class' => 'form-control select2',
                'id' => 'donation_category_id',
                'required',
                'placeholder' => 'Select Donation Cause',
                'parsley-error-message' => 'Please select donation cause',
            ]) !!}
            {!! Form::label('donation_category_id', 'Donation Category Id:', ['class' => 'span_required']) !!}
        </div>

        <!-- Donation Cause Other Field -->
        <div class="form-group col-sm-6 donation_cause_block" style="display: none;">
            {!! Form::text('donation_cause_other', isset($donation) ? $donation->donation_cause_other : null, [
                'class' => 'form-control',
                'id' => 'donation_cause_other',
                'data-parsley-pattern' => '[a-zA-Z .]*',
                'minlength' => '2',
                'maxlength' => '100',
                'data-parsley-required-message' => 'Please enter other donation cause',
            ]) !!}
            {!! Form::label('donation_cause_other', 'Other Donation Cause:', ['class' => 'span_required']) !!}
        </div>

        <!-- Donation Amount Field -->
        <div class="form-group  col-sm-6">
            {!! Form::text('donation_amount', null, [
                'class' => 'form-control numbers-input',
                'id' => 'donation_amount',
                'required',
                'data-parsley-pattern' => '[0-9]*',
                'inputmode' => 'numeric',
                'maxlength' => '5',
                'minlength' => '1',
                'parsley-error-message' => 'Please enter donation amount',
            ]) !!}
            {!! Form::label('donation_amount', 'Donation Amount ($)', ['class' => 'span_required']) !!}
        </div>
    </div>
</div>

<!-- Card title -->

<div class="col-sm-12 row form_heading">
    <div class="col-md-6">
        <h2>
            <span class="material-symbols-outlined">
                contact_emergency
            </span>
            Donor Details
        </h2>
    </div>
    <div class="col-md-6 text-right">
        <p>(Please fill donor details)</p>
    </div>
</div>
<!-- Card title end -->

<!-- Card -->
<div class="card col-sm-12">
    <div class="card-body row">


        <!-- First Name Field -->
        <div class="form-group  col-sm-6">
            {!! Form::text('first_name', Auth::check() ? Auth::user()->first_name : null, [
                'class' => 'form-control  letters-input',
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
        <div class="form-group col-sm-6">
            {!! Form::text('last_name', Auth::check() ? Auth::user()->last_name : null, [
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
        <div class="form-group col-sm-6">
            {!! Form::email('email', Auth::check() ? Auth::user()->email : null, [
                'class' => 'form-control',
                'required',
                'maxlength' => '100',
                'data-parsley-error-message' => 'Please enter a valid email address',
            ]) !!}
            {!! Form::label('email', 'Email:', ['class' => 'span_required parsley_span']) !!}
        </div>

        <!-- Phone Field -->
        <div class="form-group  col-sm-6">
            <input type="text" name="phone_no" class="form-control digitsonly"
                value="{{ Auth::check() ? Auth::user()->phone_no : (isset($donation) ? $donation->phone_no : null) }}"
                required minlength="12" maxlength="12" data-parsley-error-message="Please enter a valid phone number"
                readonly id="phone" onfocus="this.removeAttribute('readonly');" data-parsley-pattern="[0-9-]*"
                inputmode="numeric">
            {!! Form::label('phone', 'Phone:', ['class' => 'span_required']) !!}
        </div>

        <!-- Address Field -->
        <div class="form-group col-sm-12 col-lg-12">
            {!! Form::textarea('address', Auth::check() ? Auth::user()->personalDetails->address : null, [
                'class' => 'form-control',
                'maxlength' => '300',
                'minlength' => '10',
                'required',
            ]) !!}
            {!! Form::label('address', 'Address:', ['class' => 'span_required']) !!}
        </div>

    </div>
</div>

@push('page_scripts')
    <script type="text/javascript">
        function checkDonationCategory() {
            var category = $("#donation_category_id option:selected").text();
            if (category == 'Other') {
                $('.donation_cause_block').show();
                $("#donation_cause_other").prop('required', true);
            } else {
                $('.donation_cause_block').hide();
                $("#donation_cause_other").prop('required', false);
            }
        }
        checkDonationCategory();
        $("#donation_category_id").change(function() {
            checkDonationCategory();
        });
    </script>
@endpush
