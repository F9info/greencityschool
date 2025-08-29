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
                'readonly',
                'maxlength' => '19',
              
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
                'maxlength' => '19',
            ]) !!}
            {!! Form::label('end_date', 'End Date:') !!}
        </div>
        <!-- Location Field -->
        <div class="form-group col-sm-4">
            {!! Form::text('location', null, [
                'class' => 'form-control text-input',
            ]) !!}
            {!! Form::label('location', 'Location:') !!}
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
        <div class="form-group image_input col-sm-6">

<div class="input-group">
    <div class="custom-file">
        {!! Form::file('event_gallery[]', ['class' => 'custom-file-input', 'multiple' => true]) !!}
        {!! Form::label('event_gallery', 'Choose file', ['class' => 'custom-file-label']) !!}
    </div>
</div>
{!! Form::label('event_gallery', 'Event Gallery:') !!}
<span class="image_note">[ Upload multiple images ]</span>
@isset($event)
    @if ($event->event_gallery != '')
        <p class="welcome-image">
            @foreach ($event->event_gallery as $gal)
                @if ($gal != null)
                    <span>
                        <a href="{{ url('delete-event-image/' . $event->id . '/' . $gal) }}"
                            class="remove_field">X</a>
                        <img src="{{ asset('images/events/' . $gal) }}" alt=""
                            height="50">
                    </span>
                @endif
            @endforeach
        </p>
    @endif
@endisset
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
        <div class="form-group textarea-section col-sm-12 col-lg-12">

            {!! Form::textarea('event_description', null, ['class' => 'form-control']) !!}
            {!! Form::label('event_description', 'Event Description:') !!}

        </div>

        <!-- Registration Note Field -->
      
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
