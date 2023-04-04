<!-- Name Field -->
<div class="form-group col-sm-6">

    {!! Form::text('name', null, ['class' => 'form-control letters-input', 'required']) !!}
    {!! Form::label('name', 'Name', ['class' => 'span_required']) !!}

</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    <input type="email" name="email" class="form-control", required, data-parsley-error-message="" autocomplete="off"
        readonly onfocus="this.removeAttribute('readonly');" value="{{ isset($user) ? $user->email : null }}" />
    {!! Form::label('email', 'Email', ['class' => 'span_required']) !!}

</div>

<!-- Mobile Field -->
<div class="form-group col-sm-6">




    {!! Form::text('mobile', null, [
        'class' => 'form-control digitsonly',
        'id' => 'phone',
        'minlength' => '12',
        'maxlength' => '12',
    ]) !!}


    {!! Form::label('mobile', 'Phone Number') !!}
</div>

<!-- Designation Field -->
<div class="form-group col-sm-6">

    {!! Form::text('designation', null, ['class' => 'form-control letters-input']) !!}
    {!! Form::label('designation', 'Designation') !!}
</div>

<!-- Role Field -->
<div class="form-group select-area col-sm-3">
    {!! Form::label('role', 'Select Role', ['class' => 'span_required']) !!}

    <select class="form-control select2" name="role">
        <option value="">Select Role</option>
        @foreach ($roles as $role)
            <option {{ isset($user) ? ($user->hasRole($role->name) ? 'selected' : '') : '' }}>{{ $role->name }}
            </option>
        @endforeach
    </select>
</div>

<!-- Address Field -->
<div class="form-group col-sm-12">

    {!! Form::textarea('address', null, ['class' => 'form-control']) !!}
    {!! Form::label('address', 'Address') !!}
</div>

@if (!isset($user))
    <!-- Password Field -->
    <div class="form-group col-sm-6 password_validations  password_validations_eye">

        <input type="password" id="password" name="password" placeholder="Password"
            class="form-control  password_input_eye" required data-parsley-required-message="This value is required"
            data-parsley-group="first" data-parsley-pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z\d]).{8,}"
            data-parsley-error-message="" autocomplete="off" readonly onfocus="this.removeAttribute('readonly');", />
        {!! Form::label('password', 'Password:', ['class' => 'span_required']) !!}

        {{--
        {!! Form::password('password', [
            'class' => 'form-control',
            'id' => 'password',
            'required',
            'autocomplete' => 'off',
            'data-parsley-minlength' => '8',
        ]) !!}
        {!! Form::label('password', 'Password', ['class' => 'span_required']) !!} --}}

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
    <div class="form-group col-sm-6" id="password-match-label">

        {{-- {!! Form::password('password_confirmation', [
            'class' => 'form-control',
            'required',
            'data-parsley-equalto' => '#password',
        ]) !!}
        {!! Form::label('password', 'Password Confirmation', ['class' => 'span_required']) !!} --}}



        <input type="password" id="password-confirm" name="password_confirmation" class="form-control"
            placeholder="Confirm Password" required data-parsley-group="first"
            data-parsley-required-message="This value is required" data-parsley-equalto="#password"
            data-parsley-pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z\d]).{8,}" data-parsley-error-message=""
            autocomplete="off" readonly onfocus="this.removeAttribute('readonly');" />
        {!! Form::label('password_confirmation', 'Confirm Password:', ['class' => 'span_required']) !!}
        <span class="material-symbols-outlined check_circle">
            check_circle
        </span>
        <span class="material-symbols-outlined cancel">
            cancel
        </span>

    </div>
@endif
