@extends('frontend.app')

@section('content')
    <section class="user_login all_forms donation_success">
        <div class="container">

            <div class="card">

                <div class="icon"><span class="material-symbols-outlined">
                        volunteer_activism
                    </span></div>





                <h1>Thank You!</h1>
                <h4>{{ $donation->first_name . ' ' . $donation->last_name }}</h4>
                <p>Your donation was successful!</p>
                <p>You donated <span>{{ formatAmount($donation->transaction->amount) }}</span> towards <span>
                        {{ $donation->donationCategory->donation_cause == 'Other' ? $donation->donation_cause_other : $donation->donationCategory->donation_cause }}
                    </span>
                </p>
                <p class="no_marginB">An email with donation receipt will be sent to you shortly.</p>
                <a href="{{ url('/') }}" class="btn btn-primary">Go to Home</a>
                <div class="back_button"><a href="{{ url('/donate') }}"><span class="material-symbols-outlined">
                            arrow_back_ios
                        </span>Make Another Donation</a></div>

            </div>
        </div>

        <div class="login_pic">
            <img alt="{!! applicationSettings('site-name') !!}" class="positon-right-pic" src="{{ asset('images/login_pic.svg') }}">
        </div>
    </section>
@endsection
