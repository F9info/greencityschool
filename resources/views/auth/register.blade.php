@extends('frontend.app')

@section('content')
    <!-- Page title -->
    <div class="inner-banner ">
        <div class="inner-page-title">
            <h1>Membership
            </h1>
        </div>
        <figure>
            <img src="{{ applicationSettings('membership-banner') != '' ? asset('images/site-images/' . applicationSettings('membership-banner')) : asset('images/inner_banner.jpg') }}"
                alt="{!! applicationSettings('site-name') !!}">
        </figure>
    </div>
    <!-- end: Page title -->
    <section class="all_forms membership_form">
        <div class="container">
            @include('flash::message')
            <form id='checkout-form' method="post" action="{{ route('register') }}" autocomplete="off">
                @csrf









                <div class="row">
                    @include('membership_form_common.member_details')
                    @include('membership_form_common.spouse_details')




                    <div class="col-sm-12 accordion mobile_accordion">
                        <div class="ac-item card form_heading">
                            <h2 class="ac-title">
                                <span class="material-symbols-outlined">front_hand</span>
                                Want to become a Volunteer
                                <em>(Please select your interested fields)</em>
                            </h2>

                            <div class="ac-content">



                                <!-- Card title -->
                                <div class="col-sm-12 row form_heading">
                                    <div class="col-md-6">
                                        <h2>
                                            <span class="material-symbols-outlined">front_hand</span>
                                            Want to become a Volunteer
                                        </h2>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <p>(Please select your interested fields)</p>
                                    </div>
                                </div>
                                <!-- Card title end -->

                                <!-- Card  -->
                                <div class="card col-sm-12 p-b-30">
                                    <div class="card-body row">
                                        <div class="tabs">
                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="member-tab" data-toggle="tab"
                                                        href="#member" role="tab" aria-controls="member"
                                                        aria-selected="true">Member</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="spouse-tab" data-toggle="tab" href="#spouse"
                                                        role="tab" aria-controls="spouse"
                                                        aria-selected="false">Spouse</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="child-tab" data-toggle="tab" href="#child"
                                                        role="tab" aria-controls="child" aria-selected="false">Child</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="myTabContent">
                                                @include('membership_form_common.become_volunteer')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card  -->





                            </div>
                        </div>
                    </div>



                    <div class="col-sm-12 accordion mobile_accordion">
                        <div class="ac-item card form_heading">
                            <h2 class="ac-title">
                                <span class="material-symbols-outlined">add_call</span>
                                Communication
                                <em>(Please select your Communication fields)</em>
                            </h2>

                            <div class="ac-content">

                                @include('membership_form_common.communication')
                            </div>
                        </div>
                    </div>




                    @include('membership_form_common.membership_payment_details')

                    {{-- Terms and Conditions --}}
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
                            <button type="submit" id="register" class="btn btn-primary">REGISTER</button>
                        </div>
                    </div>


                </div>
            </form>
        </div>
    </section>


    <!--------------------------- sponser-block --------------------------->
    @include('pages.sponsors')
    <!--------------------------- subscribe_block --------------------------->
    @include('pages.subscribe')
    <!--------------------------- media-partners-block --------------------------->
    @include('pages.media-partners')
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

        function generateReferenceNo(){
            var firstName = $('#first_name').val();
            var lastName = $('#last_name').val();
            var letters = firstName.charAt(0)+lastName.charAt(0);
            var date = "{{ date('YmdHis') }}";
            var uniqid = "{{ substr(uniqid(), 0, 4) }}";
            
            var refno = date+letters+uniqid;
            $('#quickrefno').text("quick_"+refno);
            $('#quick_pay_ref_id').val("quick_"+refno);
            $('#cheque_pay_ref_id').val("cheque_"+refno);
        }

        function setFinalAmount(){
            var payment_method = $('input[name="payment_method"]:checked').val();
            var membership_amount = $('.membership_amount').val();
            if(membership_amount != '' && payment_method != '') {
                var membershipamountparsed = parseInt(membership_amount);
                if(payment_method == 'stripe' || payment_method == 'paypal'){
                    var fees = "{!! applicationSettings('payment-gateway-fees') !!}";
                    var final_amount = membershipamountparsed + (membershipamountparsed * (fees/100));
                    $('.payment_block_amount').show();
                    $('.payment_block_amount span').text("$"+final_amount.toFixed(2));
                    $('.amount').val(final_amount.toFixed(2));
                }else if(payment_method == 'cheque' || payment_method == 'quickpay'){
                    $('.payment_block_amount').show();
                    $('.payment_block_amount span').text("$"+membershipamountparsed.toFixed(2));
                    $('.amount').val(membershipamountparsed.toFixed(2));
                }
            }else{
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
            $('#checkout-form').parsley().validate();
            document.getElementById("register").disabled = true;
            stripe.createToken(cardElement).then(function(result) {
                if (typeof result.error != 'undefined') {
                    document.getElementById("register").disabled = false;
                    $('#stripe-error').text(result.error.message);
                }

                // creating token success
                if (typeof result.token != 'undefined') {
                    document.getElementById("stripe-token-id").value = result.token.id;
                    $('#checkout-form').attr('action', "{{ url('/stripe/create-charge') }}");
                    document.getElementById('checkout-form').submit();
                }
            });
        }

        $(document).ready(function() {
            $(".payment_block").hide();
            $('input[type=radio][name=payment_method]').change(function() {
                setFinalAmount();
                $(".payment_block").hide();
                $("." + this.value).show();
                if(this.value == "cheque" || this.value == "quickpay"){
                    generateReferenceNo();
                }
            });
            $("#first_name, #last_name").on('change keyup paste', function () {
                generateReferenceNo();
            });
        });

        $("#register").click(function() {
            var response = grecaptcha.getResponse();
            if (response != '' && $('#checkout-form').parsley().isValid()) {
                var payment_method = $('input[name="payment_method"]:checked').val();
                if (payment_method == 'stripe') {
                    createToken();
                } else if (payment_method == 'paypal') {
                    $('#checkout-form').attr('action', "{{ url('/process-transaction') }}");
                    document.getElementById('checkout-form').submit();
                } else {
                    event.preventDefault();
                    document.getElementById('checkout-form').submit();
                }
            } else {
                event.preventDefault();
                $('#checkout-form').parsley().validate();
                if (response == '') {
                    $("#captchaerrors").text("Invalid Captcha");
                    $("#captchaerrors").addClass("captchaError");
                }
                return false;
            }
        });
    </script>
@endpush