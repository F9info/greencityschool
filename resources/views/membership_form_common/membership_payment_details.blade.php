<!-- Card title -->
<div class="col-sm-12 row form_heading">
    <div class="col-md-6">
        <h2>
            <span class="material-symbols-outlined">stars</span>
            Select Membership <span style="color: red">*</span>
        </h2>
    </div>
    <div class="col-md-6 text-right">
        <p>(Please choose the membership)</p>
    </div>
</div>
<!-- Card title end -->

<!-- Card  -->
<div class="card col-sm-12  select_membership">
    <div class="card-body">
        <div class="radio-payment payment-type-radio-payment">

            @foreach ($membershipTypes as $membershipType)
                <div class="radio-item">
                    {!! Form::radio('membership_type_id', $membershipType->id, null, [
                        'required',
                        'id' => 'payment' . $membershipType->id,
                        'onchange' => "showAmount($membershipType->price)",
                        'data-parsley-error-message' => 'Select membership type',
                    ]) !!}
                    <label for="{{ 'payment' . $membershipType->id }}">
                        {{ $membershipType->membership_name }}
                    </label>
                </div>
            @endforeach
        </div>
        <input type="hidden" name="membership_amount" class="membership_amount" />
        <input type="hidden" name="amount" class="amount" value="" required />
        <div class="grand-total" id="grand-total"></div>
        <div class="note grand-note">
            <p>Note:</p>
            {!! applicationSettings('membership-note') !!}
        </div>
    </div>
</div>

@include('membership_form_common.payment_methods')
