<!-- Card title -->
<div class="col-sm-12 row form_heading" style="margin-top: 20px; margin-bottom:10px;">
    <div class="col-md-6">
        <h2>
            <span class="material-symbols-outlined">
                calendar_month
            </span>
            Event Details
        </h2>
    </div>
    <div class="col-md-6 text-right">
        <p>(Please fill your event details)</p>
    </div>
</div>
<!-- Card title end -->
<!-- Card -->
<div class="card col-sm-12">
    <div class="card-body">
        <div class="form-group  image_input_required image_preview_block" style="max-width: 100%">
            <div class="pic">
                <div id="image_preview">
                    @isset($event)
                        @if ($event->image != '')
                            <p><img src="{{ asset('images/events/' . $event->image) }}" alt="" height="50"></p>
                        @endif
                    @endisset
                </div>
            </div>
            <div class="custom-file">
                {!! Form::file('image', [
                    'class' => 'custom-file-input',
                    isset($event) ? '' : 'required',
                    'onchange' => 'readURL(this, "image_preview")',
                    'accept' => '.jpg,.png,.jpeg',
                    'data-parsley-max-file-size' => 500,
                    'data-parsley-fileextension' => 'jpg,png,jpeg',
                    'data-parsley-error-message' => 'Please upload event banner',
                ]) !!}
                {!! Form::label('image', 'Choose file', ['class' => 'custom-file-label']) !!}
                <span class="image_note">[ Image size should not be more than {!! applicationSettings('event-image-size') !!} KB ]</span>
            </div>
        </div>
    </div>
</div>
<!-- Card -->
<div class="card col-sm-12">
    <div class="card-body row">
        <!-- Event Name Field -->
        <div class="form-group col-sm-4">

            {!! Form::text('event_name', null, [
                'class' => 'form-control',
                'required',
                'minlength' => '2',
                'maxlength' => '60',
                'id' => 'event_name',
                'onkeyup' => 'convertToSlug()',
                'data-parsley-error-message' => 'Enter event name',
            ]) !!}
            {!! Form::label('event_name', 'Event Name:', ['class' => 'span_required']) !!}

        </div>
        <!-- Slug Field -->
        <div class="form-group col-sm-4 disbaled_input">

            {!! Form::text('slug', null, [
                'class' => 'form-control',
                'required',
                'id' => 'slug',
                'readonly',
                'data-parsley-required-message' => '',
                'data-parsley-error-message' => '',
            ]) !!}
            {!! Form::label('slug', 'Slug:', ['class' => 'span_required']) !!}

        </div>
        <!-- Event Category Id Field -->
        <div class="form-group col-sm-4 select-area">
            {!! Form::select('event_category_id', $eventCategories, null, [
                'class' => 'form-control select2',
                'placeholder' => 'Select Event Category',
                'required',
                'data-parsley-error-message' => 'Select event category',
            ]) !!}
            {!! Form::label('event_category_id', 'Event Category:', ['class' => 'span_required']) !!}
        </div>
        <!-- Start Date Field -->
        <div class="form-group date_input_picker input_date_row col-sm-4">
            {!! Form::text('start_date', null, [
                'class' => 'form-control  datetimepicker-input number-input',
                'id' => 'start_date',
                'placeholder' => 'Start Date',
                'data-toggle' => 'datetimepicker',
                'required',
                'readonly',
                'maxlength' => '19',
                'data-parsley-error-message' => 'Select date and time',
            ]) !!}
            {!! Form::label('start_date', 'Start Date:') !!}
        </div>
        <!-- End Date Field -->
        <div class="form-group date_input_picker input_date_row col-sm-4">
            {!! Form::text('end_date', null, [
                'class' => 'form-control  datetimepicker-input number-input',
                'readonly',
                'placeholder' => 'End Date',
                'id' => 'end_date',
                'data-toggle' => 'datetimepicker',
                'required',
                'maxlength' => '19',
                'data-parsley-error-message' => 'Select date and time',
            ]) !!}
            {!! Form::label('end_date', 'End Date:') !!}
        </div>
        <!-- Location Field -->
        <div class="form-group col-sm-4">
            {!! Form::text('location', null, [
                'class' => 'form-control text-input',
                'required',
                'data-parsley-error-message' => 'Enter event location',
            ]) !!}
            {!! Form::label('location', 'Location:', ['class' => 'span_required']) !!}
        </div>
        <!-- City Field -->
        <div class="letters-input form-group col-sm-4">
            {!! Form::text('city', null, ['class' => 'form-control text-input']) !!}
            {!! Form::label('city', 'City:') !!}
        </div>
        <!-- State Field -->
        <div class="letters-input form-group col-sm-4">
            {!! Form::text('state', null, ['class' => 'form-control text-input']) !!}
            {!! Form::label('state', 'State:') !!}
        </div>
        <!-- Zipcode Field -->
        <div class="numbers-input form-group col-sm-4">
            {!! Form::text('zipcode', null, [
                'class' => 'form-control digitsonly',
                'minlength' => '5',
                'maxlength' => '5',
            ]) !!}
            {!! Form::label('zipcode', 'Zipcode:') !!}
        </div>
        <!-- Contact Email Field -->
        <div class="form-group col-sm-4">
            {!! Form::email('contact_email', null, [
                'class' => 'form-control',
                'required',
                'data-parsley-error-message' => 'Enter valid email address',
            ]) !!}
            {!! Form::label('contact_email', 'Contact Email:', ['class' => 'span_required']) !!}
        </div>
        <!-- Member Only Field -->
        <div class="form-group  col-sm-4">
            <div class="checkbox checkbox_toggle">
                <input type="checkbox" name="members_only" id="members_only"
                    {{ isset($event) ? ($event->members_only ? 'checked' : '') : '' }}>
                <label for="members_only">Member Only</label>
            </div>
        </div>

    </div>
</div>
<!-- Card title -->
<div class="col-sm-12 row form_heading" style="margin-top: 20px; margin-bottom:10px;">
    <div class="col-md-6">
        <h2>
            <span class="material-symbols-outlined">
                calendar_month
            </span>
            Additional Field
        </h2>
    </div>
    <div class="col-md-6 text-right">
        <p>(Please fill additional fields)</p>
    </div>
</div>
<!-- Card title end -->
<!-- Card -->
<div class="card col-sm-12">
    <div class="card-body row">
        {{-- Additonal Field Name --}}
        <div class="form-group col-sm-6">
            {!! Form::text(
                'additional_field1_name',
                isset($event)
                    ? (isset($event->additional_fields['field_1'])
                        ? $event->additional_fields['field_1']['field_name']
                        : null)
                    : null,
                ['class' => 'form-control '],
            ) !!}
            {!! Form::label('additional_field1_name', 'Additional Field1 Name:') !!}
        </div>
        <!-- Additional Fields Field -->
        <div class="form-group select-area col-sm-6">
            {!! Form::select(
                'additional_field1_type',
                ['textbox' => 'textbox', 'textarea' => 'textarea', 'select' => 'select'],
                isset($event)
                    ? (isset($event->additional_fields['field_1'])
                        ? $event->additional_fields['field_1']['field_type']
                        : null)
                    : null,
                ['class' => 'form-control select2', 'id' => 'additional_field1_type', 'placeholder' => 'Field type'],
            ) !!}
            {!! Form::label('additional_field1_type', 'Additional Field1 Field Type:') !!}
        </div>
        <!-- Options Field -->
        <div class="form-group col-sm-6 options_block1"
            style="{{ isset($event) ? (isset($event->additional_fields['field_1']) ? ($event->additional_fields['field_1']['field_type'] == 'select' ? 'display: block;' : 'display: none;') : 'display: none;') : 'display: none;' }}">
            {!! Form::textarea(
                'additional_field1_options',
                isset($event)
                    ? (isset($event->additional_fields['field_1'])
                        ? $event->additional_fields['field_1']['field_options']
                        : null)
                    : null,
                [
                    'class' => 'form-control',
                    'id' => 'additional_field1_options',
                ],
            ) !!}
            {!! Form::label('additional_field1_options', 'Options:', ['class' => 'span_required']) !!}
            <p>*Please insert values with comma(,) separated</p>

        </div>
    </div>
    <div class="card-body row">
        {{-- Additonal Field Name --}}
        <div class="form-group col-sm-6">
            {!! Form::text(
                'additional_field2_name',
                isset($event)
                    ? (isset($event->additional_fields['field_2'])
                        ? $event->additional_fields['field_2']['field_name']
                        : null)
                    : null,
                ['class' => 'form-control '],
            ) !!}
            {!! Form::label('additional_field2_name', 'Additional Field2 Name:') !!}
        </div>
        <!-- Additional Fields Field -->
        <div class="form-group select-area col-sm-6">
            {!! Form::select(
                'additional_field2_type',
                ['textbox' => 'textbox', 'textarea' => 'textarea', 'select' => 'select'],
                isset($event)
                    ? (isset($event->additional_fields['field_2'])
                        ? $event->additional_fields['field_2']['field_type']
                        : null)
                    : null,
                ['class' => 'form-control select2', 'id' => 'additional_field2_type', 'placeholder' => 'Field type'],
            ) !!}
            {!! Form::label('additional_field2_type', 'Additional Field2 Field Type:') !!}
        </div>
        <!-- Options Field -->
        <div class="form-group col-sm-4 options_block2"
            style="{{ isset($event) ? (isset($event->additional_fields['field_2']) ? ($event->additional_fields['field_2']['field_type'] == 'select' ? 'display: block;' : 'display: none;') : 'display: none;') : 'display: none;' }}">
            {!! Form::textarea(
                'additional_field2_options',
                isset($event)
                    ? (isset($event->additional_fields['field_2'])
                        ? $event->additional_fields['field_2']['field_options']
                        : null)
                    : null,
                [
                    'class' => 'form-control',
                    'id' => 'additional_field2_options',
                ],
            ) !!}
            {!! Form::label('additional_field2_options', 'Options:', ['class' => 'span_required']) !!}
            <p>*Please insert values with comma(,) separated</p>

        </div>
    </div>
</div>
<!-- Card title -->
<div class="col-sm-12 row form_heading" style="margin-top: 20px; margin-bottom:10px;">
    <div class="col-md-6">
        <h2>
            <span class="material-symbols-outlined">
                calendar_month
            </span>
            Registrations Details
        </h2>
    </div>
    <div class="col-md-6 text-right">
        <p>(Please fill registrations details)</p>
    </div>
</div>
<!-- Card title end -->
<!-- Card -->
<div class="card col-sm-12">
    <div class="card-body row">
        <div class="col-md-2 form-group">
            <!-- Is Registration Enabled Field -->
            <div class="checkbox_toggle">
                <div class="checkbox">
                    <input type="checkbox" name="registration_enabled" value="1" id="registration_enabled"
                        {{ isset($event) ? ($event->registration_enabled ? 'checked' : '') : '' }}>
                    <label for="registration_enabled">
                        Is Registration Enabled
                    </label>
                </div>
            </div>
        </div>
        <!-- Reg Start Date Field -->
        <div class="form-group date_input_picker input_date_row col-md-4">
            {!! Form::text('reg_start_date', null, [
                'class' => 'form-control  datetimepicker-input',
                'readonly',
                'id' => 'reg_start_date',
                'data-toggle' => 'datetimepicker',
                'required',
            ]) !!}
            {!! Form::label('reg_start_date', 'Reg Start Date:') !!}
        </div>
        <!-- Reg End Date Field -->
        <div class="form-group date_input_picker input_date_row col-md-4">

            {!! Form::text('reg_end_date', null, [
                'class' => 'form-control  datetimepicker-input',
                'readonly',
                'id' => 'reg_end_date',
                'data-toggle' => 'datetimepicker',
                'required',
            ]) !!}
            {!! Form::label('reg_end_date', 'Reg End Date:') !!}
        </div>

        <div class="col-md-12 clear-fix" style="width: 100%; height:1px;">&nbsp;</div>

        <div class="col-md-2 form-group">
            <!-- Is Adult Field -->
            <div class="checkbox_toggle">
                <div class="checkbox">
                    <input type="checkbox" name="is_adult" value="1" id="is_adult"
                        {{ isset($event) ? ($event->is_adult ? 'checked' : '') : '' }}>
                    <label for="is_adult">
                        Adult
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group col-md-4">
            {!! Form::text('adult_amount', null, [
                'class' => 'form-control numbers-input',
                'minlength' => '1',
                'maxlength' => '3',
                'id' => 'adult_amount',
                'disabled',
            ]) !!}
            {!! Form::label('adult_amount', 'Adult Amount:') !!}
        </div>


        <div class="col-md-2 form-group">
            <!-- Is Child Field -->
            <div class="checkbox_toggle">
                <div class="checkbox">
                    <input type="checkbox" name="is_child" value="1" id="is_child"
                        {{ isset($event) ? ($event->is_child ? 'checked' : '') : '' }}>
                    <label for="is_child">
                        Child
                    </label>
                </div>
            </div>
        </div>


        <!-- Child Amount Field -->
        <div class="form-group col-md-4">

            {!! Form::text('child_amount', null, [
                'class' => 'form-control numbers-input',
                'minlength' => '1',
                'maxlength' => '3',
                'id' => 'child_amount',
                'disabled',
            ]) !!}
            {!! Form::label('child_amount', 'Child Amount:') !!}
        </div>

        <div class="col-md-12 clear-fix" style="width: 100%; height:1px;">&nbsp;</div>


        <div class="col-md-2 form-group">

            <!-- Is Guest Adult Field -->
            <div class="checkbox_toggle">
                <div class="checkbox">
                    <input type="checkbox" name="is_guest_adult" value="1" id="is_guest_adult"
                        {{ isset($event) ? ($event->is_guest_adult ? 'checked' : '') : '' }}>
                    <label for="is_guest_adult">
                        Guest Adult
                    </label>
                </div>
            </div>


        </div>



        <div class="form-group col-md-4">

            {!! Form::text('guest_adult_amount', null, [
                'class' => 'form-control numbers-input',
                'minlength' => '1',
                'maxlength' => '3',
                'id' => 'guest_adult_amount',
                'disabled',
            ]) !!}
            {!! Form::label('guest_adult_amount', 'Guest Adult Amount:') !!}
        </div>


        <div class="col-md-2 form-group">

            <!-- Is Guest Child Field -->
            <div class="checkbox_toggle">
                <div class="checkbox">
                    <input type="checkbox" name="is_guest_child" value="1" id="is_guest_child"
                        {{ isset($event) ? ($event->is_guest_child ? 'checked' : '') : '' }}>
                    <label for="is_guest_child">
                        Guest Child
                    </label>
                </div>
            </div>

        </div>


        <!-- Guest Child Amount Field -->
        <div class="form-group col-md-4">

            {!! Form::text('guest_child_amount', null, [
                'class' => 'form-control numbers-input',
                'minlength' => '1',
                'maxlength' => '3',
                'id' => 'guest_child_amount',
                'disabled',
            ]) !!}
            {!! Form::label('guest_child_amount', 'Guest Child Amount:') !!}
        </div>




    </div>
</div>




<!-- Card title -->
<div class="col-sm-12 row form_heading" style="margin-top: 20px; margin-bottom:10px;">
    <div class="col-md-6">
        <h2>
            <span class="material-symbols-outlined">
                calendar_month
            </span>
            Event Description
        </h2>
    </div>
    <div class="col-md-6 text-right">
        <p>(Please fill your event Descriptions)</p>
    </div>
</div>
<!-- Card title end -->




<!-- Card -->
<div class="card col-sm-12">
    <div class="card-body row">




        <!-- Event Description Field -->
        <div class="form-group textarea-section col-sm-6 col-lg-6">

            {!! Form::textarea('event_description', null, ['class' => 'form-control', 'required']) !!}
            {!! Form::label('event_description', 'Event Description:', ['class' => 'span_required']) !!}

        </div>

        <!-- Registration Note Field -->
        <div class="form-group textarea-section col-sm-6 col-lg-6">

            {!! Form::textarea('registration_note', null, ['class' => 'form-control']) !!}
            {!! Form::label('registration_note', 'Registration Note:') !!}
        </div>
    </div>
</div>



<!-- Card title -->
<div class="col-sm-12 row form_heading" style="margin-top: 20px; margin-bottom:10px;">
    <div class="col-md-6">
        <h2>
            <span class="material-symbols-outlined">
                calendar_month
            </span>
            SEO Details
        </h2>
    </div>
    <div class="col-md-6 text-right">
        <p>(Please fill your SEO Details)</p>
    </div>
</div>
<!-- Card title end -->





<!-- Card -->
<div class="card col-sm-12">
    <div class="card-body row">




        <!-- Page Title Field -->
        <div class="form-group col-sm-6">

            {!! Form::text('page_title', null, ['class' => 'form-control']) !!}
            {!! Form::label('page_title', 'Page Title:') !!}
        </div>

        <!-- Meta Description Field -->
        <div class="form-group col-sm-6">

            {!! Form::text('meta_description', null, ['class' => 'form-control']) !!}
            {!! Form::label('meta_description', 'Meta Description:') !!}
        </div>

        <!-- Meta Keywords Field -->
        <div class="form-group col-sm-6">

            {!! Form::text('meta_keywords', null, ['class' => 'form-control']) !!}
            {!! Form::label('meta_keywords', 'Meta Keywords:') !!}
        </div>

        <!-- Top Line Field -->
        <div class="form-group col-sm-6">

            {!! Form::text('top_line', null, ['class' => 'form-control']) !!}
            {!! Form::label('top_line', 'Top Line:') !!}
        </div>
    </div>
</div>

@include('common.string-to-slug', ['fieldName' => 'event_name'])

@include('common.editor', ['variable' => 'editor1', 'field' => 'event_description'])

@include('common.editor', ['variable' => 'editor1', 'field' => 'registration_note'])


@push('page_scripts')
    {{-- <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
        var editor1 = CKEDITOR.replace('event_description');
        editor1.config.allowedContent = true;

        var editor2 = CKEDITOR.replace('registration_note');
        editor2.config.allowedContent = true;
    </script> --}}
    <script type="text/javascript">
        $('.datetimepicker-input').datetimepicker({
            format: 'YYYY-MM-DD hh:mm A',
            icons: {
                time: 'far fa-clock'
            },
            useCurrent: false
        });
        $('#start_date').datetimepicker();
        $('#end_date').datetimepicker();
        $("#start_date").on("change.datetimepicker", function(e) {
            $('#end_date').datetimepicker('minDate', e.date);
        });
        $("#end_date").on("change.datetimepicker", function(e) {
            $('#reg_start_date').datetimepicker('maxDate', e.date);
            $('#reg_end_date').datetimepicker('maxDate', e.date);
        });
        $("#reg_start_date").on("change.datetimepicker", function(e) {
            $('#reg_end_date').datetimepicker('minDate', e.date);
        });

        function checkInputType(type, id) {
            if (type == 'select') {
                $('.options_block' + id).show();
                $('#additional_field1_options' + id).attr('required', true);
            } else {
                $('.options_block' + id).hide();
                $('#additional_field1_options' + id).attr('required', false);
            }
        }
        checkInputType($("#additional_field1_type option:selected", 1).val());
        checkInputType($("#additional_field2_type option:selected", 2).val());
        $("#additional_field1_type").change(function() {
            checkInputType(this.value, 1);
        });
        $("#additional_field2_type").change(function() {
            checkInputType(this.value, 2);
        });
        $(document).ready(function() {
            $('#adult_amount').css('background-color', '#e9ecef');
            $('#is_adult').change(function() {
                if (this.checked) {
                    $('#adult_amount').prop('required', true);
                    $('#adult_amount').prop('disabled', false);
                    $('#adult_amount').css('background-color', '#ffffff00');

                } else {
                    $('#adult_amount').prop('required', false);
                    $('#adult_amount').prop('disabled', true);
                    $('#adult_amount').css('background-color', '#e9ecef');


                }
            });
        });
        $(document).ready(function() {
            $('#child_amount').css('background-color', '#e9ecef');
            $('#is_child').change(function() {
                if (this.checked) {
                    $('#child_amount').prop('required', true);
                    $('#child_amount').prop('disabled', false);
                    $('#child_amount').css('background-color', '#ffffff00');
                } else {
                    $('#child_amount').prop('required', false);
                    $('#child_amount').prop('disabled', true);
                    $('#child_amount').css('background-color', '#e9ecef');
                }
            });
        });
        $(document).ready(function() {
            $('#guest_adult_amount').css('background-color', '#e9ecef');
            $('#is_guest_adult').change(function() {
                if (this.checked) {
                    $('#guest_adult_amount').prop('required', true);
                    $('#guest_adult_amount').prop('disabled', false);
                    $('#guest_adult_amount').css('background-color', '#ffffff00');
                } else {
                    $('#guest_adult_amount').prop('required', false);
                    $('#guest_adult_amount').prop('disabled', true);
                    $('#guest_adult_amount').css('background-color', '#e9ecef');
                }
            });
        });
        $(document).ready(function() {
            $('#guest_child_amount').css('background-color', '#e9ecef');
            $('#is_guest_child').change(function() {
                if (this.checked) {
                    $('#guest_child_amount').prop('required', true);
                    $('#guest_child_amount').prop('disabled', false);
                    $('#guest_child_amount').css('background-color', '#ffffff00');
                } else {
                    $('#guest_child_amount').prop('required', false);
                    $('#guest_child_amount').prop('disabled', true);
                    $('#guest_child_amount').css('background-color', '#e9ecef');
                }
            });
        });
    </script>
@endpush

@include('common.image-preview')
