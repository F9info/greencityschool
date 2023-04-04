<div class="col-sm-12 accordion mobile_accordion">
    <div class="ac-item card form_heading">
        <h2 class="ac-title">
            <span class="material-symbols-outlined">family_restroom</span>
            Spouse Details
            <em>(Please fill spouse details)</em>
        </h2>

        <div class="ac-content">
            <!-- Card title -->
            <div class="col-sm-12 row form_heading">
                <div class="col-md-6">
                    <h2>
                        <span class="material-symbols-outlined">family_restroom</span>
                        Spouse Details
                    </h2>
                </div>
                <div class="col-md-6 text-right">
                    <p>(Please fill spouse details)</p>
                </div>
            </div>
            <!-- Card title end -->

            <!-- Card  -->
            <div class="card col-sm-12">
                <div class="card-body row">
                    <!-- Spouse First Name Field -->
                    <div class="form-group col-sm-4">
                        {!! Form::text('spouse_first_name', isset($personalDetails) ? $personalDetails->spouse_first_name : null, [
                            'class' => 'form-control letters-input ',
                            'minlength' => '2',
                            'maxlength' => '50',
                            'data-parsley-pattern' => '[a-zA-Z .]*',
                            'data-parsley-error-message' => 'First name should be between 2 and 50 characters ',
                        ]) !!}
                        {!! Form::label('spouse_first_name', 'Spouse First Name:') !!}
                    </div>

                    <!-- Spouse Last Name Field -->
                    <div class="form-group col-sm-4">
                        {!! Form::text('spouse_last_name', isset($personalDetails) ? $personalDetails->spouse_last_name : null, [
                            'class' => 'form-control letters-input ',
                            'minlength' => '2',
                            'maxlength' => '50',
                            'data-parsley-pattern' => '[a-zA-Z .]*',
                            'data-parsley-error-message' => 'Last name should be between 2 and 50 characters ',
                        ]) !!}
                        {!! Form::label('spouse_last_name', 'Spouse Last Name:') !!}
                    </div>

                    <!-- Spouse Gender Field -->
                    <div class="form-group select-area select-full-width  col-sm-4">
                        {!! Form::select(
                            'spouse_gender',
                        
                            ['male' => 'MALE', 'female' => 'FEMALE'],
                            isset($personalDetails) ? $personalDetails->spouse_gender : null,
                            ['class' => 'form-control select2', 'placeholder' => 'Select Gender'],
                        ) !!}
                        {!! Form::label('spouse_gender', 'Spouse Gender:') !!}
                    </div>

                    <!-- Spouse Date Of Birth Field -->
                    <div class="form-group col-sm-4">
                        {!! Form::text(
                            'spouse_date_of_birth',
                            isset($personalDetails) ? formatSpecialDate($personalDetails->spouse_date_of_birth) : null,
                            ['class' => 'form-control datepicker', 'readonly', 'id' => 'spouse_date_of_birth'],
                        ) !!}
                        {!! Form::label('spouse_date_of_birth', 'Spouse Birth Date and Month:') !!}
                    </div>

                    <h5 class="col-sm-12 m-b-30">Please fill Spouse Native Place Details</h5>

                    <!-- Spouse Native State Field -->
                    <div class="form-group select-area select-full-width col-sm-4">
                        {!! Form::select(
                            'spouse_native_state',
                            ['Andhra Pradesh' => 'Andhra Pradesh', 'Telangana' => 'Telangana', 'Other' => 'Other'],
                            isset($personalDetails) ? $personalDetails->spouse_native_state : null,
                            ['class' => 'form-control select2', 'placeholder' => 'Select Spouse Native State', 'id' => 'NativeState2'],
                        ) !!}
                        {!! Form::label('spouse_native_state', 'Spouse Native State:') !!}
                    </div>

                    <!-- Spouse Native District Field -->
                    <div class="form-group select-area select-full-width col-sm-4">
                        {!! Form::select(
                            'spouse_native_district',
                            [],
                            isset($personalDetails) ? $personalDetails->spouse_native_district : null,
                            ['class' => 'form-control textonly select2', 'placeholder' => 'Select District', 'id' => 'district2'],
                        ) !!}
                        {!! Form::text(
                            'spouse_native_district_other',
                            isset($personalDetails) ? $personalDetails->spouse_native_district : null,
                            [
                                'class' => 'form-control textonly',
                                'id' => 'district_other2',
                                'placeholder' => 'District name',
                                'maxlength' => '50',
                                'data-parsley-pattern' => '[a-zA-Z]*',
                                'style' => 'display:none;',
                            ],
                        ) !!}

                        {!! Form::label('spouse_native_district_other', 'Spouse Native District:', ['class' => 'dropdown_label']) !!}
                    </div>

                    <!-- Spouse Native City Field -->
                    <div class="form-group  col-sm-4">
                        {!! Form::text('spouse_native_city', isset($personalDetails) ? $personalDetails->spouse_native_city : null, [
                            'class' => 'form-control letters-input',
                            'data-parsley-pattern' => '[a-zA-Z ]*',
                        ]) !!}
                        {!! Form::label('spouse_native_city', 'Spouse Native City:') !!}
                    </div>
                </div>
            </div>
            <!-- Card end -->

        </div>
    </div>
</div>
<div class="col-sm-12 accordion mobile_accordion">
    <div class="ac-item card form_heading">
        <h2 class="ac-title">
            <span class="material-symbols-outlined">face</span>
            Child Details
            <em>(Please fill child details)</em>
        </h2>

        <div class="ac-content">



            <!-- Card title -->
            <div class="col-sm-12 row form_heading">
                <div class="col-md-6">
                    <h2>
                        <span class="material-symbols-outlined">
                            face
                        </span>
                        Child Details
                    </h2>
                </div>
                <div class="col-md-6 text-right">
                    <p>(Please fill child details)</p>
                </div>
            </div>
            <!-- Card title end -->

            <!-- Card  -->
            <div class="card col-sm-12 paddingB">
                <div class="card-body">
                    @include('membership_form_common.add_child')
                </div>
            </div>
            <!-- Card end -->



        </div>
    </div>
</div>





@include('membership_form_common.state-city')
