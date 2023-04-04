@extends('frontend.app')

@section('content')
    <section class="user_login all_forms">
        <div class="container">
            @include('flash::message')

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @if (session('resetpassword'))
                <!-- Modal -->
                <div id="modal-auto-open" class="modal modal-auto-open text-center cookie-notify" data-delay="500"
                    data-cookie-enabled="false">
                    <span class="material-symbols-outlined colorgreen" style=" font-size:5em;">
                        check_circle
                    </span>
                    <h2 class="modal-title">Password Changed!</h2>
                    <p>
                        Your password has been changed successfully
                    </p>
                    <a class="btn btn-primary modal-close" href="#">Dismiss</a>
                </div>
            @endif
            <!-- /.login-box-body -->
            <div class="card ">
                <div class="card-body login-card-body">
                    <h1 class="login-box-msg">Login to your account </h1>

                    <form method="post" action="{{ url('/login') }}" autocomplete="off">
                        @csrf

                        <div class="form-group ">
                            <input type="email" name="email" value="{{ old('email') }}" autocomplete="off"
                                onfocus="this.removeAttribute('readonly');"
                                class="form-control @error('email') is-invalid @enderror">
                            <label class="span_required">Email address</label>
                            @error('email')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group ">
                            <input type="password" name="password" id="password" autocomplete="off"
                                onfocus="this.removeAttribute('readonly');"
                                class="form-control @error('password') is-invalid @enderror">
                            <label class="span_required">Password</label>
                            @error('password')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror


                            <a href="javascript:void(0)" class="pwd-btn">
                                <span class="material-symbols-outlined visibility_off">
                                    visibility_off
                                </span>
                                <span class="material-symbols-outlined visibility">
                                    visibility
                                </span>
                            </a>





                        </div>

                        <div class="row">
                            <div class="col-6 text-left">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember">
                                    <label for="remember">Remember Me</label>
                                </div>
                            </div>

                            <div class="col-6 text-right">
                                <a href="{{ route('password.request') }}">Forgot Password?</a>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-lg btn-primary btn-block">Login</button>

                    </form>



                    <a class="ancher-btn" href="{{ route('register') }}"><span>Not a Member? </span> Register now</a>




                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
        <div class="login_pic">
            <img alt="{!! applicationSettings('site-name') !!}" class="positon-right-pic" src="{{ asset('images/login_pic.svg') }}">
        </div>
    </section>




    <!-- Modal alla -->
    {{-- <div id="modal-auto-open" class="modal modal-auto-open text-center close_hide" data-delay="500"
        data-cookie-enabled="false">
        <span class="material-symbols-outlined color_primary" style="font-size:5em;">
            gpp_maybe
        </span>
        <h2 class="modal-title">Welcome to the new portal of
            F9 Info Technologies</h2>
        <p>
            Please reset your password if you’re trying to login for the first time.
        </p>

        <p> If you have already changed your password please proceed to login.
        </p>
        <div class="modal_buttons"><a class="btn btn-primary" href="{{ route('password.request') }}">Reset
                Password</a>
            <a class="btn btn-primary modal-close" href="#">Login</a>
        </div>

    </div> --}}
@endsection
