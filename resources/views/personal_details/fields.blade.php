@isset($personalDetails)
    <input type="hidden" name="personalDetailsId" value="{{ $personalDetails->id }}" />
@endisset

@isset($communicationDetail)
    <input type="hidden" name="communicationDetailId" value="{{ $communicationDetail->id }}" />
@endisset

@isset($transaction)
    <input type="hidden" name="transactionId" value="{{ $transaction->id }}" />
@endisset

@include('membership_form_common.member_details')

@include('membership_form_common.spouse_details')

@include('membership_form_common.datepicker')

<!-- card title -->
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
<!-- card title end-->

<div class="card col-sm-12 admin_tab_card">
    <div class="card-body ">
        <div class="admin_tabs">
            <div class="p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#member" data-toggle="tab">Member</a></li>
                    <li class="nav-item"><a class="nav-link" href="#spouse" data-toggle="tab">Spouse</a></li>
                    <li class="nav-item"><a class="nav-link" href="#child" data-toggle="tab">Child</a></li>
                </ul>
            </div><!-- /.card-header -->

            <div class="tab-content">
                @include('membership_form_common.become_volunteer')
            </div>
        </div>
        <!-- /.tab-content -->

    </div>
</div>

@include('membership_form_common.communication')
<!-- card title -->
<div class="col-sm-12 row form_heading">
    <div class="col-md-6">
        <h2>
            <span class="material-symbols-outlined">front_hand</span>
            Membership Details
        </h2>
    </div>
    <div class="col-md-6 text-right">
        <p>(Please fill Membership details)</p>
    </div>
</div>
<!-- card title end-->

<!-- card -->
<div class="card col-sm-12 ">
    <div class="card-body row">
        <!-- Membership Type Id Field -->
        <div class="form-group col-sm-4 select-area select-full-width">
            {!! Form::select('membership_type_id', $membershiptypes, null, [
                'class' => 'form-control select2',
                'id' => 'membership_type_id',
                'placeholder' => 'Select Membership Type',
                'required',
            ]) !!}
            {!! Form::label('membership_type_id', 'Select Membership Type:', ['class' => 'span_required']) !!}
        </div>

        <!-- Membership Amount -->
        <div class="form-group col-sm-4 disbaled_input dollar_symbol">
            {!! Form::text('amount', isset($transaction) ? $transaction->amount : null, [
                'class' => 'form-control numbers-input',
                'readonly',
                'id' => 'amount',
            ]) !!}
            {!! Form::label('amount', 'Amount') !!}
        </div>

        <!-- Expiry Date -->
        <div class="form-group col-sm-4 disbaled_input">
            {!! Form::text('expiry_date', isset($user) ? $user->expiry_date : null, [
                'class' => 'form-control',
                'id' => 'expiry_date',
                'readonly',
            ]) !!}
            {!! Form::label('expiry_date', 'Expiry Date') !!}
        </div>

    </div>
</div>
<!-- card end-->

<!-- card title -->
<div class="col-sm-12 row form_heading">
    <div class="col-md-6">
        <h2>
            <span class="material-symbols-outlined">front_hand</span>
            Payment Transaction Details
        </h2>
    </div>
    <div class="col-md-6 text-right">
        <p>(Please fill Payment details)</p>
    </div>
</div>
<!-- card title end-->

<!-- card -->
<div class="card col-sm-12 ">
    <div class="card-body row">
        <!-- Membership Type Id Field -->
        <div class="form-group col-sm-3 select-area  payment_transaction_details">
            {!! Form::select(
                'payment_method',
                $paymentMethods,
                isset($transaction) ? $transaction->paymentMethod->slug : null,
                ['class' => 'form-control select2', 'id' => 'payment_method', 'required', 'placeholder' => 'Select Payment Method'],
            ) !!}
            {!! Form::label('payment_method', 'Payment Method :') !!}
        </div>
        <!-- Payment Date  -->
        <div class="form-group col-sm-3 show-year">
            {!! Form::text('transaction_date', isset($transaction) ? formatDate($transaction->transaction_date) : null, [
                'class' => 'form-control',
                'id' => 'yeardatepicker',
                'required',
            ]) !!}
            {!! Form::label('transaction_date', ' Payment Date') !!}
        </div>
        <!-- Payment Status  -->
        <div class="form-group col-sm-3 select-area select-full-width">
            {!! Form::select(
                'payment_status',
                ['Pending' => 'Pending', 'Success' => 'Success'],
                isset($transaction) ? $transaction->payment_status : null,
                [
                    'class' => 'form-control select2',
                    'placeholder' => 'Select Payment Status',
                    'required',
                ],
            ) !!}
            {!! Form::label('payment_status', 'Payment Status:') !!}
        </div>

        <!-- Transaction Id  -->
        <div class="form-group col-sm-3">
            {!! Form::text('transaction_id', isset($transaction) ? $transaction->transaction_id : null, [
                'class' => 'form-control ',
                'id' => 'transaction_id',
                'required',
            ]) !!}
            {!! Form::label('transaction_id', ' Transaction Id') !!}
        </div>

        <div class="row col-sm-12 cheque_block" style="display:none;">
            <div class="col-sm-12">
                <h3>Cheque Details </h3>
            </div>
            <!-- Bank Name -->
            <div class="form-group col-sm-3">
                {!! Form::text('bank_name', isset($transaction) ? $transaction->bank_name : null, [
                    'class' => 'form-control ',
                    'id' => 'bank_name',
                ]) !!}
                {!! Form::label('bank_name', 'Bank Name') !!}
            </div>

            <!-- Cheque No -->
            <div class="form-group col-sm-3">
                {!! Form::text('cheque_no', isset($transaction) ? $transaction->cheque_no : null, [
                    'class' => 'form-control ',
                    'id' => 'cheque_no',
                ]) !!}
                {!! Form::label('cheque_no', 'Cheque No') !!}
            </div>

            <!-- Cheque Date -->
            <div class="form-group col-sm-3 show-year">
                {!! Form::text('cheque_date', isset($transaction) ? $transaction->cheque_date : null, [
                    'class' => 'form-control dateyear',
                    'id' => 'cheque_date',
                ]) !!}
                {!! Form::label('cheque_date', 'Cheque Date') !!}
            </div>

            <!-- Cheque Amount -->
            <div class="form-group col-sm-3 disbaled_input">
                {!! Form::text('cheque_amount', isset($transaction) ? $transaction->cheque_amount : null, [
                    'class' => 'form-control ',
                    'id' => 'cheque_amount',
                ]) !!}
                {!! Form::label('cheque_amount', 'Cheque Amount') !!}
            </div>
        </div>

    </div>
</div>
<!-- card end-->

<!-- card title -->
<div class="col-sm-12 row form_heading">
    <div class="col-md-6">
        <h2>
            <span class="material-symbols-outlined">front_hand</span>
            Other Details
        </h2>
    </div>
    <div class="col-md-6 text-right">
        <p>(Please fill Other Details details)</p>
    </div>
</div>
<!-- card title end-->

<!-- card -->
<div class="card col-sm-12 ">
    <div class="card-body row">
        <!-- Admin Comment  -->
        <div class="form-group col-sm-6">
            {!! Form::textarea('admin_comment', isset($transaction) ? $transaction->admin_comment : null, [
                'class' => 'form-control',
            ]) !!}
            {!! Form::label('admin_comment', 'Admin Comment:', ['class' => 'admin_comment']) !!}
        </div>
        <!-- User Comment   -->
        <div class="form-group col-sm-6">
            {!! Form::textarea('user_comment', isset($transaction) ? $transaction->user_comment : null, [
                'class' => 'form-control',
            ]) !!}
            {!! Form::label('user_comment', 'User Comment:', ['class' => 'user_comment']) !!}
        </div>
    </div>
</div>
<!-- card end-->

@push('page_scripts')
    <script type="text/javascript">
        function CheckPaymentMethod(value) {
            if (value == 'cheque') {
                $('.cheque_block').show();
                $('.payment_transaction_details').addClass('check_active')
            } else {
                $('.cheque_block').hide();
                $('.payment_transaction_details').removeClass('check_active')
            }
        }
        var paymentmethod = "{{ isset($transaction) ? $transaction->paymentMethod->slug : null }}";
        CheckPaymentMethod(paymentmethod);
        $(document).ready(function() {
            $('#payment_method').on('change', function() {
                CheckPaymentMethod(this.value);
            });

            $('#membership_type_id').on('change', function() {
                var price = "{{ getMembershipPrice('+this.value+') }}";
                // alert("price");
                // $('#amount').parents('.form-group').addClass('input-has-value');
            });

            $("#membership_type_id").on("change", function() {
                var membershipTypeId = $(this).val();
                if (membershipTypeId) {
                    $.ajax({
                        type: "GET",
                        url: "{{ url('get-membership-type-details') }}?membership_type_id=" +
                            membershipTypeId,
                        success: function(res) {
                            $("#amount").val(res[0]);
                            $("#expiry_date").val(res[1]);
                            $("#cheque_amount").val(res[0]);
                        },
                    });
                } else {
                    $("#sub_product_id").empty();
                }
            });
        });
    </script>
@endpush
