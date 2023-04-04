@extends('frontend.app')

@section('content')
    <!-- Page title -->
    <div class="inner-banner">
        @if (applicationSettings('contact-page-banner') != '')
            <img src="{{ asset('images/site-images/' . applicationSettings('contact-page-banner')) }}"
                alt="{!! applicationSettings('site-name') !!}">
        @else
            <img src="{{ asset('images/inner_banner.jpg') }}" alt="{!! applicationSettings('site-name') !!}">
        @endif
    </div>
    <!-- end: Page title -->

    <section class="contact-us">
        <div class="container">
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Please confirm your password before continuing.</p>

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="input-group mb-3">
                            <input type="password" name="password"
                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                placeholder="Password" required autocomplete="current-password">
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-lock"></span></div>
                            </div>
                            @if ($errors->has('password'))
                                <span class="error invalid-feedback">{{ $errors->first('password') }}</span>
                            @endif
                        </div>


                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block">Confirm Password</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

                    <p class="mt-3 mb-1">
                        <a href="{{ route('password.request') }}">Forgot Your Password?</a>
                    </p>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
    </section>
@endsection
