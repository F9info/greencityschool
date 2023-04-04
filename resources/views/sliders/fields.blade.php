<!-- Image Field -->
<div class="form-group col-sm-12 image_input_required image_preview_block">
    <div class="pic">
        <div id="image_preview">
            @isset($slider)
                @if ($slider->image != '')
                    <img src="{{ asset('images/slider/' . $slider->image) }}" alt="">
                @endif
            @endisset
        </div>
    </div>
    <div class="custom-file">
        {!! Form::file('image', [
            'class' => 'custom-file-input',
            isset($slider) ? '' : 'required',
            'onchange' => 'readURL(this, "image_preview")',
            'accept' => '.jpg,.png,.jpeg',
            'data-parsley-max-file-size' => applicationSettings('banner-image-size'),
            'data-parsley-fileextension' => 'jpg,png,jpeg',
        ]) !!}
        {!! Form::label('image', 'Upload File', ['class' => 'custom-file-label']) !!}
        <span class="image_note">[ Image size should not be more than {!! applicationSettings('banner-image-size') !!} KB ]</span>
    </div>
</div>
<div class="clearfix"></div>

<!-- Title Field -->
<div class="form-group col-sm-6">

    {!! Form::text('title', null, ['class' => 'form-control', 'maxlength' => '100']) !!}
    {!! Form::label('title', 'Title:') !!}
</div>

<!-- Tagline Field -->
<div class="form-group col-sm-6">

    {!! Form::textarea('tagline', null, ['class' => 'form-control']) !!}
    {!! Form::label('tagline', 'Tagline:') !!}
</div>

<!-- Button Name Field -->
<div class="form-group col-sm-6">

    {!! Form::text('button_name', null, ['class' => 'form-control', 'maxlength' => '100']) !!}
    {!! Form::label('button_name', 'Button Name:') !!}
</div>

<!-- Button Url Field -->
<div class="form-group col-sm-6">

    {!! Form::text('button_url', null, ['class' => 'form-control']) !!}
    {!! Form::label('button_url', 'Button Url:') !!}
</div>

@include('common.image-preview')