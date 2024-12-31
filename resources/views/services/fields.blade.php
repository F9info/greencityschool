<!-- Service Category Id Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('service_category_id', 'Service Category Id:') !!}
    {!! Form::number('service_category_id', null, ['class' => 'form-control', 'required']) !!}
</div> --}}






<div class="form-group col-sm-6 select-area">

    {!! Form::select('service_category_id', $servicenames, null, ['class' => 'form-control select2', 'required', 'placeholder' => 'Select Service Category']) !!}
    {!! Form::label('service_category_id', 'Select Service Category', ['class' => 'span_required']) !!}

</div>





<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::text('title', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255, 'maxlength' => 255]) !!}
    {!! Form::label('title', 'Title:', ['class' => 'span_required']) !!}
   
</div>

<!-- Slug Field -->
<div class="form-group col-sm-6">
   
    {!! Form::text('slug', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255, 'maxlength' => 255]) !!}
    {!! Form::label('slug', 'Slug:') !!}
</div>

<!-- Sub Title Field -->
<div class="form-group col-sm-6">
   
    {!! Form::text('sub_title', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255, 'maxlength' => 255]) !!}
    {!! Form::label('sub_title', 'Sub Title:') !!}
</div>

<!-- Icon Field -->
<div class="form-group col-sm-6">
   
    {!! Form::text('icon', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255, 'maxlength' => 255]) !!}
    {!! Form::label('icon', 'Icon:') !!}
</div>

{{-- <!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', 'Image:') !!}
    {!! Form::text('image', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255, 'maxlength' => 255]) !!}
</div> --}}


<!-- Image Field -->
<div class="form-group image_input col-sm-6">

    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('image', ['class' => 'custom-file-input']) !!}
            {!! Form::label('image', 'Choose file', ['class' => 'custom-file-label']) !!}
        </div>
    </div>
    {!! Form::label('image', 'Image:') !!}
    <span class="image_note">[ Image size should not be more than {!! applicationSettings('banner-image-size') !!} KB
        ]</span>
    @isset($services)
        @if ($services->image != '')
            <div class="pic-img-block"><img
                    src="{{ asset('images/services/' . $services->image) }}" alt=""
                    height="50"></div>
        @endif
    @endisset
</div>








<!-- Image Alt Text Field -->
<div class="form-group col-sm-6">
   
    {!! Form::text('image_alt_text', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255, 'maxlength' => 255]) !!}
    {!! Form::label('image_alt_text', 'Image Alt Text:') !!}
</div>

<!-- Short Description Field -->
<div class="form-group textarea-section  col-sm-12 col-lg-12">
   
    {!! Form::textarea('short_description', null, ['class' => 'form-control', 'maxlength' => 65535, 'maxlength' => 65535, 'maxlength' => 65535]) !!}
    {!! Form::label('short_description', 'Short Description:') !!}
</div>

<!-- Description Field -->
<div class="form-group textarea-section  col-sm-12 col-lg-12">
   
    {!! Form::textarea('description', null, ['class' => 'form-control', 'maxlength' => 65535, 'maxlength' => 65535, 'maxlength' => 65535]) !!}
    {!! Form::label('description', 'Description:') !!}
</div>

<!-- Custom Url Field -->
<div class="form-group col-sm-6">
   
    {!! Form::text('custom_url', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255, 'maxlength' => 255]) !!}
    {!! Form::label('custom_url', 'Custom Url:') !!}
</div>

<!-- New Window Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('new_window', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('new_window', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('new_window', 'New Window', ['class' => 'form-check-label']) !!}
    </div>
</div>

<!-- Gallery Field -->
{{-- <div class="form-group col-sm-12 col-lg-12">
  
    {!! Form::textarea('gallery', null, ['class' => 'form-control', 'maxlength' => 65535, 'maxlength' => 65535, 'maxlength' => 65535]) !!}
    {!! Form::label('gallery', 'Gallery:') !!}
</div> --}}

<div class="form-group image_input col-sm-6">

    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('gallery[]', ['class' => 'custom-file-input', 'multiple' => true]) !!}
            {!! Form::label('gallery', 'Choose file', ['class' => 'custom-file-label']) !!}
        </div>
    </div>
    {!! Form::label('gallery', 'Gallery:') !!}
    <span class="image_note">[ Upload multiple images ]</span>
    @isset($cms)
        @if ($cms->gallery != '')
            <p class="welcome-image">
                @foreach ($cms->gallery as $gal)
                    @if ($gal != null)
                        <span>
                            <a href="{{ url('delete-services-image/' . $cms->id . '/' . $gal) }}"
                                class="remove_field">X</a>
                            <img src="{{ asset('images/inner-pages/' . $gal) }}" alt=""
                                height="50">
                        </span>
                    @endif
                @endforeach
            </p>
        @endif
    @endisset
</div>

<!-- Video Url Field -->
<div class="form-group col-sm-6">
   
    {!! Form::text('video_url', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255, 'maxlength' => 255]) !!}
    {!! Form::label('video_url', 'Video Url:') !!}
</div>

<!-- Video Iframe Field -->
<div class="form-group col-sm-12 col-lg-12">
   
    {!! Form::textarea('video_iframe', null, ['class' => 'form-control', 'maxlength' => 65535, 'maxlength' => 65535, 'maxlength' => 65535]) !!}
    {!! Form::label('video_iframe', 'Video Iframe:') !!}
</div>

<!-- Page Title Field -->
<div class="form-group col-sm-12 col-lg-12">
   
    {!! Form::textarea('page_title', null, ['class' => 'form-control', 'maxlength' => 65535, 'maxlength' => 65535, 'maxlength' => 65535]) !!}
    {!! Form::label('page_title', 'Page Title:') !!}
</div>

<!-- Seo Title Field -->
<div class="form-group col-sm-12 col-lg-12">
    
    {!! Form::textarea('seo_title', null, ['class' => 'form-control', 'maxlength' => 65535, 'maxlength' => 65535, 'maxlength' => 65535]) !!}
    {!! Form::label('seo_title', 'Seo Title:') !!}
</div>

<!-- Seo Keywords Field -->
<div class="form-group col-sm-12 col-lg-12">
  
    {!! Form::textarea('seo_keywords', null, ['class' => 'form-control', 'maxlength' => 65535, 'maxlength' => 65535, 'maxlength' => 65535]) !!}
    {!! Form::label('seo_keywords', 'Seo Keywords:') !!}
</div>

<!-- Seo Description Field -->
<div class="form-group textarea-section  col-sm-12 col-lg-12">
  
    {!! Form::textarea('seo_description', null, ['class' => 'form-control', 'maxlength' => 65535, 'maxlength' => 65535, 'maxlength' => 65535]) !!}
    {!! Form::label('seo_description', 'Seo Description:') !!}
</div>

@include('common.editor', ['variable' => 'editor1', 'field' => 'short_description'])

@include('common.editor', ['variable' => 'editor1', 'field' => 'description'])

@include('common.editor', ['variable' => 'editor1', 'field' => 'seo_description'])



{{-- @push('page_scripts')
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
        var editor1 = CKEDITOR.replace('short_description');
        editor1.config.allowedContent = true;

        var editor2 = CKEDITOR.replace('description');
        editor2.config.allowedContent = true;


        var editor3 = CKEDITOR.replace('seo_description');
        editor3.config.allowedContent = true;


    </script>
@endpush --}}