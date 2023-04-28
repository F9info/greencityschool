@extends('frontend.app')
@section('content')
    <!-- Page title -->
    <div class="inner-banner ">
  
        <figure>
            @if (applicationSettings('contact-page-banner') != '')
            <img src="{{  asset('images/site-images/' . applicationSettings('contact-page-banner')) }}"
            alt="{!! applicationSettings('site-name') !!}">
            @else
            <img src="{{  asset('images/site-images/' . applicationSettings('inner-banner')) }}"
            alt="{!! applicationSettings('site-name') !!}">
            @endif 
        </figure>
    </div>

<div class="container text-center">
    <div class="inner-page-title">
        <h1>Contact Us
        </h1>
    </div>
</div>

    <!-- end: Page title -->
    <section class="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-md-6 contact_left">
                    <h2>Get In Touch</h2>
                 {!! Form::open(['url' => 'contact-form-submission', 'id' => 'contact-form']) !!}
                    <div class="row form_fields">
                        {{ csrf_field() }}
                        @include('enquiries.fields')
                    </div>
                    <div class="g-recaptcha" data-callback="imNotARobot" data-sitekey="{!! applicationSettings('google-recaptcha-site-key') !!}"></div>
                    <div id="captchaerrors"></div>
                    <br />
                    {!! Form::submit('Submit', ['class' => 'btn btn-primary', 'id' => 'contact_btn']) !!}
                    {!! Form::close() !!}
                </div>
                <div class="col-md-6 contact_right">
                    <h2>Address & Map</h2>
                    <ul class="list-icon">
                        <li><i class="fa fa-map-marker-alt"></i> {!! applicationSettings('address') !!}</li>
                        <li><i class="fa fa-phone"></i> <a
                                href="mailto:{{ applicationSettings('primary-phone-number') }}">{{ applicationSettings('primary-phone-number') }}</a>
                        </li>
                        <li><i class="far fa-envelope"></i> <a
                                href="tel:{{ applicationSettings('primary-email') }}">{{ applicationSettings('primary-email') }}</a>
                        </li>
                    </ul>
                    <div class="iframe-container">
                        {!! applicationSettings('google-map-iframe') !!}
                    </div>
                </div>
    </section>
  
@endsection
@include('pages.recaptcha')
