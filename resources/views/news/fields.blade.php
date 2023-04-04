<!-- Title Field -->
<div class="form-group col-sm-6">

    {!! Form::text('title', null, ['class' => 'form-control', 'required', 'maxlength' => '100']) !!}
    {!! Form::label('title', 'Title:', ['class' => 'span_required']) !!}

</div>

<!-- Image Field -->
<div class="form-group image_input image_input_required col-sm-6">

    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('image', [
                'class' => 'custom-file-input',
                isset($news) ? '' : 'required',
                'accept' => '.jpg,.png,.jpeg',
                'data-parsley-max-file-size' => applicationSettings('member-image-size'),
                'data-parsley-fileextension' => 'jpg,png,jpeg',
            ]) !!}
            {!! Form::label('image', 'Choose file', ['class' => 'custom-file-label']) !!}

        </div>
    </div>
    {!! Form::label('image', 'Image:') !!}
    <span class="image_note">[ Image size should not be more than {!! applicationSettings('member-image-size') !!} KB ]</span>

</div>
<div class="clearfix"></div>

<!-- Description Field -->
<div class="form-group text-area col-sm-12 col-lg-12">

    {!! Form::textarea('description', null, ['class' => 'form-control', 'required']) !!}
    {!! Form::label('description', 'Description:', ['class' => 'span_required']) !!}

</div>

@push('page_scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
        var editor1 = CKEDITOR.replace('description');
        editor1.config.allowedContent = true;
    </script>
@endpush
