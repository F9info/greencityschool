@extends('frontend.app')
@section('content')
    <!-- Page title -->
    <div class="inner-banner ">
        <div class="inner-page-title">
            <h1>Event Registration
            </h1>
        </div>
        <figure>
         



                @if (applicationSettings('event-registration-banner') != '')
                <img src="{{  asset('images/site-images/' . applicationSettings('event-registration-banner')) }}"
                alt="{!! applicationSettings('site-name') !!}">
                @else
                <img src="{{  asset('images/site-images/' . applicationSettings('inner-banner')) }}"
                alt="{!! applicationSettings('site-name') !!}">
                @endif 






        </figure>
    </div>
    <!-- end: Page title -->


    <section class="all_forms event_registration">
        <div class="container">



            <div class="event_reg_card">
                @include('flash::message')
                <div class="card">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="inner">
                                <h2> {{ $event->event_name }}</h2>
                                <p class="date"> <span class="material-symbols-outlined check_circle">
                                        event
                                    </span>
                                    {{ date('D d M Y', strtotime($event->start_date)) . ' to ' . date('D d M Y', strtotime($event->end_date)) }}
                                </p>
                                <p class="loc"> <span class="material-symbols-outlined check_circle">
                                        location_on
                                    </span>{{ $event->location }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <figure><img src="{{ asset('images/events/' . $event->image) }}" />
                            </figure>
                        </div>
                    </div>

                </div>
            </div>

            @php($conditions = checkUserEventRegistrationConditions($event->id))
            @if($conditions == 'success')

                @if(Auth::guest())
                <div class="members_nonmembers">
                    <div class="row">
                        <div class="col-md-6 nonmembers_block nonmembers_left">
                            <span class="material-symbols-outlined">
                                group
                            </span>
                            <h2>Members</h2>
                            <p><a href="{{ url('/login') }}">Login</a>to your Membership Account and Register with Member
                                discount pricing
                            </p>
                        </div>
                        <div class="col-md-6 nonmembers_block nonmembers_right">
                            <span class="material-symbols-outlined">
                                group_off
                            </span>

                            <h2>Non Members</h2>
                            <p><a href="{{ url('/register') }}">Become Member</a>and take advantages of discounted price future
                                events</p>
                        </div>
                    </div>
                </div>
                @endif

                {!! Form::open(['url' => 'event-registration-submission', 'id' => 'event-registration-form']) !!}

                <input type="hidden" name="type" value="eventregistration" />

                @include('event_form_common.event_form')

                @include('event_form_common.attendee-details')

                @include('membership_form_common.payment_methods')

                <div class="col-md-12">
                    <div class="recapta_inner">
                        <div class="g-recaptcha" data-callback="imNotARobot" data-sitekey="{!! applicationSettings('google-recaptcha-site-key') !!}">
                        </div>
                        <div class="clear"></div>
                        <div id="captchaerrors"></div>
                        <br />
                    </div>
                    <button type="submit" id="event_register_btn" class="btn btn-primary">REGISTER</button>
                    {{-- {!! Form::submit('Submit', ['class' => 'btn btn-primary', 'id' => 'event_register_btn']) !!} --}}
                </div>

                {!! Form::close() !!}

                @if(Auth::check())
                    @if (!userExpiryStatus(Auth::user()->expiry_date))
                        <!-- Modal -->
                        <div id="modal-auto-open" class="modal modal-auto-open text-center cookie-notify" data-delay="500">
                            <span class="material-symbols-outlined" style="color: red; font-size:5em;">
                                cancel
                            </span>
                            <h2 class="modal-title">Your Membership Expired</h2>
                            <p>Your membership has expired. Please renew your membership or continue your registration as non member.
                            </p>
                            <a class="btn btn-primary" href="{{ url('/home?tab=renew') }}">Renew Membership</a>
                            <a class="btn btn-primary modal-close" href="#">Continue</a>
                        </div>
                    @endif
                @endif
            @else
                <h3>{{ $conditions }}</h3>
            @endif
        </div>
    </section>
    
@endsection

@include('pages.recaptcha')

@push('page_scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
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
            var original_amount = $('.original_amount').val();
            if(original_amount != '' && payment_method != '') {
                var originalamountparsed = parseInt(original_amount);
                if(payment_method == 'stripe' || payment_method == 'paypal'){
                    var fees = "{!! applicationSettings('payment-gateway-fees') !!}";
                    var final_amount = originalamountparsed + (originalamountparsed * (fees/100));
                    $('.payment_block_amount').show();
                    $('.payment_block_amount span').text("$"+final_amount.toFixed(2));
                    $('.amount').val(final_amount.toFixed(2));
                }else if(payment_method == 'cheque' || payment_method == 'quickpay'){
                    $('.payment_block_amount').show();
                    $('.payment_block_amount span').text("$"+originalamountparsed.toFixed(2));
                    $('.amount').val(originalamountparsed.toFixed(2));
                }
            }else{
                $('.payment_block_amount').hide();
                $('.amount').val(original_amount);
            }
        }

        $('input[name="payment_method"]').prop('checked', false);
        var stripe = Stripe("{{ getStripeKey() }}");
        var elements = stripe.elements();
        var cardElement = elements.create('card');
        cardElement.mount('#card-element');

        function createToken() {
            event.preventDefault();
            $('#event-registration-form').parsley().validate();
            document.getElementById("event_register_btn").disabled = true;
            stripe.createToken(cardElement).then(function(result) {
                if (typeof result.error != 'undefined') {
                    document.getElementById("event_register_btn").disabled = false;
                    $('#stripe-error').text(result.error.message);
                }

                // creating token success
                if (typeof result.token != 'undefined') {
                    document.getElementById("stripe-token-id").value = result.token.id;
                    $('#event-registration-form').attr('action', "{{ url('/stripe/create-charge') }}");
                    document.getElementById('event-registration-form').submit();
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

        $("#event_register_btn").click(function() {
            var response = grecaptcha.getResponse();
            if (response != '' && $('#event-registration-form').parsley().isValid()) {
                var payment_method = $('input[name="payment_method"]:checked').val();
                if (payment_method == 'stripe') {
                    createToken();
                } else if (payment_method == 'paypal') {
                    $('#event-registration-form').attr('action', "{{ url('/process-transaction') }}");
                    document.getElementById('event-registration-form').submit();
                } else {
                    event.preventDefault();
                    document.getElementById('event-registration-form').submit();
                }
            } else {
                event.preventDefault();
                $('#event-registration-form').parsley().validate();
                if (response == '') {
                    $("#captchaerrors").text("Invalid Captcha");
                    $("#captchaerrors").addClass("captchaError");
                }
                return false;
            }
        });
    </script>
@endpush
