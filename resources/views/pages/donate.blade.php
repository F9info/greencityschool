@extends('frontend.app')
@section('content')
    <!-- Page title -->
    <div class="inner-banner ">
        <div class="inner-page-title">
            <h1>Donate
            </h1>
        </div>
        <figure>


           
            @if (applicationSettings('donate-page-banner') != '')
            <img src="{{  asset('images/site-images/' . applicationSettings('donate-page-banner')) }}"
            alt="{!! applicationSettings('site-name') !!}">
            @else
            <img src="{{  asset('images/site-images/' . applicationSettings('inner-banner')) }}"
            alt="{!! applicationSettings('site-name') !!}">
            @endif 


        </figure>
    </div>
    <!-- end: Page title -->

    <section class="donate">
        <div class="container">
            <div class="all_forms">
                {{-- <center>
                    <h2>Donations will be available soon</h2>
                </center> --}}

                @include('flash::message')
                {!! Form::open(['url' => 'donation-form-submission', 'id' => 'donation-form']) !!}

                @include('donation_form_common.donation_form')

                <input type="hidden" name="donation_amount" class="donation_amount" id="donation_amount" value=""
                    required />
                <input type="hidden" name="amount" class="amount" value="" required />
                <div class="grand-total" id="grand-total"></div>

                @include('membership_form_common.payment_methods')

                <div class="col-md-12">
                    <div class="terms_and_conditions">
                        <label>
                            {!! Form::checkbox('terms_and_conditions', 1, ['required']) !!}
                            By checking this option, you agree to accept with our <a href="/pages/terms-and-conditions"
                                target="_blank">Terms and
                                Conditions.</a>
                        </label>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="recapta_inner">
                        <div class="g-recaptcha" data-callback="imNotARobot" data-sitekey="{!! applicationSettings('google-recaptcha-site-key') !!}">
                        </div>
                        <div class="clear"></div>
                        <div id="captchaerrors"></div>
                        <br />
                    </div>
                </div>
                <div class="col-md-12 btn_padding_l">
                    {!! Form::submit('Submit', ['class' => 'btn btn-primary', 'id' => 'donation_btn']) !!}

                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </section>
@endsection

@include('pages.recaptcha')

@push('page_scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        $(".letters-input").lettersOnly();
        $(".numbers-input").numbersOnly();

        function showAmount(amount) {
            document.getElementById("grand-total").innerHTML = "<h3>Grand Total : $" + amount + "</h3>";
            $('input.cheque_amount').val(amount);
            $('input.amount').val(amount);
            $('input.donation_amount').val(amount);
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
            var donation_amount = $('#donation_amount').val();
            if (donation_amount != '' && payment_method != '') {
                var donationamountparsed = parseInt(donation_amount);
                if (payment_method == 'stripe' || payment_method == 'paypal') {
                    var fees = "{!! applicationSettings('payment-gateway-fees') !!}";
                    var final_amount = donationamountparsed + (donationamountparsed * (fees / 100));
                    $('.payment_block_amount').show();
                    $('.payment_block_amount span').text("$" + final_amount.toFixed(2));
                    $('.amount').val(final_amount.toFixed(2));
                } else if (payment_method == 'cheque' || payment_method == 'quickpay') {
                    $('.payment_block_amount').show();
                    $('.payment_block_amount span').text("$" + donationamountparsed.toFixed(2));
                    $('.amount').val(donationamountparsed.toFixed(2));
                }
            } else {
                $('.payment_block_amount').hide();
                $('.amount').val(donation_amount);
            }
        }

        $("#donation_amount").on('change keyup paste', function() {
            showAmount(this.value);
        });

        $('input[name="payment_method"]').prop('checked', false);
        var stripe = Stripe("{{ getStripeKey() }}");
        var elements = stripe.elements();
        var cardElement = elements.create('card');
        cardElement.mount('#card-element');

        function createToken() {
            event.preventDefault();
            $('#donation-form').parsley().validate();
            document.getElementById("donation_btn").disabled = true;
            stripe.createToken(cardElement).then(function(result) {
                if (typeof result.error != 'undefined') {
                    document.getElementById("donation_btn").disabled = false;
                    $('#stripe-error').text(result.error.message);
                }

                // creating token success
                if (typeof result.token != 'undefined') {
                    document.getElementById("stripe-token-id").value = result.token.id;
                    $('#donation-form').attr('action', "{{ url('/stripe/create-charge') }}");
                    document.getElementById('donation-form').submit();
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

        $("#donation_btn").click(function() {
            var response = grecaptcha.getResponse();
            if (response != '' && $('#donation-form').parsley().isValid()) {
                var payment_method = $('input[name="payment_method"]:checked').val();
                if (payment_method == 'stripe') {
                    createToken();
                } else if (payment_method == 'paypal') {
                    $('#donation-form').attr('action', "{{ url('/process-transaction') }}");
                    document.getElementById('donation-form').submit();
                } else {
                    event.preventDefault();
                    document.getElementById('donation-form').submit();
                }
            } else {
                event.preventDefault();
                $('#donation-form').parsley().validate();
                if (response == '') {
                    $("#captchaerrors").text("Invalid Captcha");
                    $("#captchaerrors").addClass("captchaError");
                }
                return false;
            }
        });
    </script>
@endpush
