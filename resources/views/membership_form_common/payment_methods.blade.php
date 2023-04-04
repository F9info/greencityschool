<!-- Card title -->
<div class="col-sm-12 row form_heading">
    <div class="col-md-6">
        <h2>
            <span class="material-symbols-outlined">monetization_on</span>
            Payment Methods <span style="color: red">*</span>
        </h2>
    </div>
    <div class="col-md-6 text-right">
        <p>(Please choose your payment method)</p>
    </div>
</div>
<!-- Card title end -->

<!-- Card  -->
<div class="card col-sm-12">
    <div class="card-body radio-payment-card paymentMethods payment-type-radio-payment payment-type-radio-card">
        <div class="radio-payment">
            @php($i = 1)
            @foreach ($paymentMethods as $paymentMethod)
                <div class="radio-item">
                    {!! Form::radio('payment_method', $paymentMethod->slug, null, [
                        'required',
                        'data-parsley-error-message' => 'Select payment method',
                        'id' => 'payment_method' . $i,
                    ]) !!}
                    <label for="{{ 'payment_method' . $i }}">{{ $paymentMethod->display_name }}</label>
                </div>
                @php($i++)
            @endforeach

            <div class="payment_block_amount" style="display: none;">You will be charged - <span></span></div>

        </div>

        <div class="payment_block stripe" style="display: none">
            <input type='hidden' name='stripeToken' id='stripe-token-id'>
            <div id="card-element" class="form-control"></div>
            <div id="stripe-error"></div>
        </div>


        <div class="payment_block cheque row" style="display: none">
            <!-- Bank Name Field -->
            <div class="form-group col-sm-6">
                {!! Form::text('bank_name', null, [
                    'class' => 'form-control',

                    'data-parsley-error-message' => 'Enter bank name',
                ]) !!}
                {!! Form::label('bank_name', 'Bank Name:', ['class' => 'span_required', 'id' => 'bank_name']) !!}
            </div>

            <!-- Cheque No Field -->
            <div class="form-group col-sm-6" id="cheque_no">
                {!! Form::text('cheque_no', null, [
                    'class' => 'form-control',
                    // 'id' => 'cheque_no',
                    'min-length' => '3',
                    'max-length' => '6',
                    'data-parsley-error-message' => 'Enter cheque number',
                ]) !!}
                {!! Form::label('cheque_no', 'Cheque No:', ['class' => 'span_required']) !!}
            </div>

            <!-- Cheque Date Field -->
            <div class="form-group col-sm-6 show-year">
                {!! Form::text('cheque_date', null, [
                    'class' => 'form-control dateyear',
                    'id' => 'cheque_date',
                    'data-parsley-error-message' => 'Select cheque date',
                ]) !!}
                {!! Form::label('cheque_date', 'Cheque Date:', ['class' => 'span_required']) !!}
            </div>

            <!-- Cheque Amount Field -->
            <div class="form-group col-sm-6 disbaled_input dollar_symbol">
                {!! Form::text('cheque_amount', null, ['class' => 'form-control cheque_amount', 'readonly']) !!}
                {!! Form::label('cheque_amount', 'Cheque Amount:', ['class' => 'span_required']) !!}
            </div>

            <div class="form-group col-sm-12 disbaled_input">

                <input type='text' name='cheque_pay_ref_id' class="form-control" id="cheque_pay_ref_id" readonly>
                <label>Reference Number</label>
            </div>



            <div class="payments_note col-sm-12 m-t-30">
                <h6>Note:</h6>
                <p>Please ensure that Cheque is received by CAA before claiming any benefits. You will receive a
                    confirmation email regarding payment. If you do not receive an email within seven days,
                    please contact to projects@f9tech.com. Please keep a note of the above reference number.
                </p>
            </div>





        </div>


        <div class="payment_block quickpay" style="display: none">


            <div class="payments_note">
                <div class="row">
                    <div class="col-md-8 qr_code_left">
                        <h6>Note:</h6>
                        <input type="hidden" name="quick_pay_ref_id" id="quick_pay_ref_id" />
                        {!! applicationSettings('quickpay-note') !!}
                    </div>
                    <div class="col-md-4 qr_code_right">
                        <figure>
                            <img src="{{ asset('images/qrcode.jpeg') }}" />
                        </figure>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Card end -->
<script src="jquery.js"></script>
<script>
    $(document).ready(function() {
        $('input[name="payment_method2"]').change(function() {
            if (this.value == 'cheque') {
                $('#bank_name, #cheque_no, #cheque_date').prop('required', true);
            } else {
                $('#bank_name, #cheque_no, #cheque_date').prop('required', false);
            }
        });
    });
</script>
