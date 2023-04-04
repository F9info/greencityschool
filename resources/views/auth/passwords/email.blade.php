@extends('frontend.app')

@section('content')
    <section class="user_login all_forms user_forgot">
        <div class="container">
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Forgot your password?</p>
                    <p class="m-b-30">We will send you a link to reset your password.</p>
                    @if (session('status'))
                        {{-- <div class="alert alert-success">
                            {{ session('status') }}
                        </div> --}}
                        <!-- Modal -->
                        <div id="modal-auto-open" class="modal modal-auto-open text-center cookie-notify" data-delay="500"
                            data-cookie-enabled="false">
                            <span class="material-symbols-outlined colorgreen" style=" font-size:5em;">
                                mark_email_read
                            </span>
                            <h2 class="modal-title">Email has been sent!</h2>
                            <p>
                                Check your inbox for instructions on <br>how to reset your access
                            </p>
                            <a class="btn btn-primary" href="{{ url('/') }}">Back to home</a>
                        </div>
                    @endif

                    <form action="{{ route('password.email') }}" method="post">
                        @csrf

                        <div class="form-group mb-3">
                            <input type="email" name="email"
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required>
                            <label class="span_required">Email address</label>
                            @if ($errors->has('email'))
                                <span class="error invalid-feedback">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-lg btn-primary btn-block">Request reset link</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

                    <p class="mt-3 mb-1">
                        <a class="ancher-btn" href="{{ route('login') }}">
                            <span class="material-symbols-outlined">
                                chevron_left
                            </span>

                            Back to Login</a>
                    </p>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
        <div class="login_pic">
            <img alt="{!! applicationSettings('site-name') !!}" class="positon-right-pic" src="{{ asset('images/login_pic.svg') }}">
        </div>
    </section>
@endsection
