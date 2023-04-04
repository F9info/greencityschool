<!-- Field Name Field -->
<div class="form-group col-sm-6">

    {!! Form::text('field_name', null, [
        'class' => 'form-control',
        'required',
        'id' => 'field_name',
        'onkeyup' => 'convertToSlug()',
    ]) !!}
    {!! Form::label('field_name', 'Field Name:', ['class' => 'span_required']) !!}

</div>

<!-- Slug Field -->
<div class="form-group col-sm-6 fixed_label readonly_input">

    {!! Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug', 'required', 'readonly']) !!}
    {!! Form::label('slug', 'Slug:', ['class' => 'span_required']) !!}

</div>

<!-- Input Type Field -->
<div class="form-group select-area col-sm-6">

    {!! Form::select(
        'input_type',
        ['textbox' => 'textbox', 'textarea' => 'textarea', 'select' => 'select', 'file' => 'file', 'heading' => 'heading'],
        null,
        ['class' => 'form-control select2', 'id' => 'input_type', 'placeholder' => 'Select Input Type', 'required'],
    ) !!}
    {!! Form::label('input_type', 'Select Input Type:', ['class' => 'span_required']) !!}

</div>

<!-- Options Field -->
<div class="form-group col-sm-6 options_block" style="display: none;">

    {!! Form::textarea('options', null, ['class' => 'form-control', 'id' => 'options']) !!}
    {!! Form::label('options', 'Options:', ['class' => 'span_required']) !!}

</div>

<!-- Category Id Field -->
<div class="form-group select-area col-sm-6">

    {!! Form::select('category_id', $categories, null, [
        'class' => 'form-control select2',
        'placeholder' => 'Select
                Category',
    ]) !!}
    {!! Form::label('category_id', 'Select Category:', ['class' => 'span_required']) !!}

</div>

<!-- Type Field -->
<div class="form-group select-area col-sm-6">

    {!! Form::select(
        'type',
        [
            'application-settings' => 'Application Settings',
            'developer-settings' => 'Developer Settings',
            'home-page-blocks' => 'Home Page Blocks',
            'general-settings' => 'General Settings',
        ],
        null,
        ['class' => 'form-control select2', 'placeholder' => 'Select Type', 'required'],
    ) !!}
    {!! Form::label('type', 'Select Type:', ['class' => 'span_required']) !!}

</div>

<!-- Value Field -->
<!-- <div class="form-group col-sm-12 col-lg-12">
    {{-- {!! Form::label('value', 'Value:') !!}
    {!! Form::textarea('value', null, ['class' => 'form-control']) !!} --}}
</div> -->

@include('common.string-to-slug', ['fieldName' => 'field_name'])

@push('page_scripts')
    <script type="text/javascript">
        function checkInputType(type) {
            if (type == 'select') {
                $('.options_block').show();
                $('#options').attr('required', true);
            } else {
                $('.options_block').hide();
                $('#options').attr('required', false);
            }
        }
        checkInputType($("#input_type option:selected").val());
        $("#input_type").change(function() {
            checkInputType(this.value);
        });
    </script>
@endpush
