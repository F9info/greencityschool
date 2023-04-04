@extends('frontend.app')

@section('content')
    <section class="user_login all_forms user_forgot">
        <div class="container">

            <div class="card">
                <div class="card-body login-card-body">

                    <p class="login-box-msg">Reset your password
                    </p>

                    <p class="m-b-30">Enter a new password for account <b>{{ $email }}</b></p>

                    <form action="{{ route('password.update') }}" method="POST">
                        @csrf

                        @php
                            if (!isset($token)) {
                                $token = \Request::route('token');
                            }
                            if (!isset($email)) {
                                $email = \Request::route('email');
                            }
                        @endphp

                        <input type="hidden" name="token" value="{{ $token }}">
                        <input type="hidden" name="email" value="{{ $email }}">

                        <input type="hidden" class="{{ $errors->has('email') ? ' is-invalid' : '' }}">

                        @if ($errors->has('email'))
                            <span class="error invalid-feedback">{{ $errors->first('email') }}</span>
                        @endif

                        <!-- Password Field -->
                        <div class="form-group col-sm-12 password_validations  password_validations_eye">
                            <input type="password" id="password" name="password" class="form-control  password_input_eye"
                                required data-parsley-required-message="This value is required" data-parsley-group="first"
                                data-parsley-pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z\d]).{8,}"
                                data-parsley-error-message="" autocomplete="off" readonly
                                onfocus="this.removeAttribute('readonly');", />
                            {!! Form::label('password', 'New Password:', ['class' => 'span_required']) !!}
                            <div class="password_val_show">
                                <ul class="password-strength" id="password-criteria">
                                    <li id="length">
                                        <span class="material-symbols-outlined span_check">
                                            check_circle
                                        </span>
                                        <span class="material-symbols-outlined span_uncheck">
                                            cancel
                                        </span>
                                        At least 8 characters which must include
                                    </li>
                                    <li id="special_characters">
                                        <span class="material-symbols-outlined span_check">
                                            check_circle
                                        </span>
                                        <span class="material-symbols-outlined span_uncheck">
                                            cancel
                                        </span>
                                        One or more special characters (ex. !@#$%^&*)
                                    </li>
                                    <li id="number">
                                        <span class="material-symbols-outlined span_check">
                                            check_circle
                                        </span>
                                        <span class="material-symbols-outlined span_uncheck">
                                            cancel
                                        </span>
                                        One or more numbers (0-9)
                                    </li>
                                    <li id="lowercase">
                                        <span class="material-symbols-outlined span_check">
                                            check_circle
                                        </span>
                                        <span class="material-symbols-outlined span_uncheck">
                                            cancel
                                        </span>
                                        One or more lower case letters (a-z)
                                    </li>
                                    <li id="uppercase">
                                        <span class="material-symbols-outlined span_check">
                                            check_circle
                                        </span>
                                        <span class="material-symbols-outlined span_uncheck">
                                            cancel
                                        </span>
                                        One or more upper case letters(A-Z)
                                    </li>
                                </ul>
                            </div>
                            <a href="javascript:void(0)" class="pwd-btn">
                                <span class="material-symbols-outlined visibility_off">
                                    visibility_off
                                </span>
                                <span class="material-symbols-outlined visibility">
                                    visibility
                                </span>
                            </a>
                        </div>

                        <!-- Confirm Password Field -->
                        <div class="form-group col-sm-12" id="password-match-label">
                            <input type="password" id="password-confirm" name="password_confirmation" class="form-control"
                                required data-parsley-group="first" data-parsley-required-message="This value is required"
                                data-parsley-equalto="#password"
                                data-parsley-pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z\d]).{8,}"
                                data-parsley-error-message="" autocomplete="off" readonly
                                onfocus="this.removeAttribute('readonly');" />
                            {!! Form::label('password_confirmation', 'Confirm new password:', ['class' => 'span_required']) !!}
                            <span class="material-symbols-outlined check_circle">
                                check_circle
                            </span>
                            <span class="material-symbols-outlined cancel">
                                cancel
                            </span>

                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-lg btn-primary btn-block">Reset Password</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                </div>
            </div>
    </section>
@endsection
