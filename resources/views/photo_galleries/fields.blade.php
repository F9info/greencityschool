<!-- Card -->
<div class="col-sm-12">
    <div class="card  sponser_card">
        <div class="card-body">
            <div class="form-group  image_input_required image_preview_block" style="max-width: 100%">
                <div class="pic">
                    <div id="image_preview">
                        @isset($photoGallery)
                            @if ($photoGallery->image != '')
                                <p><img src="{{ asset('images/gallery/' . $photoGallery->image) }}" alt=""
                                        height="50"></p>
                            @endif
                        @endisset
                    </div>
                </div>
                <div class="custom-file">

                    {!! Form::file('image', [
                        'class' => 'custom-file-input',
                        isset($sponsor) ? '' : 'required',
                        'onchange' => 'readURL(this, "image_preview")',
                        'accept' => '.jpg,.png,.jpeg',
                        'data-parsley-max-file-size' => applicationSettings('member-image-size'),
                        'data-parsley-fileextension' => 'jpg,png,jpeg',
                        'data-parsley-error-message' =>
                            'Image size should be less then ' . applicationSettings('member-image-size') . ' KB',
                    ]) !!}

                    {!! Form::label('image', 'Choose file', ['class' => 'custom-file-label']) !!}
                    <span class="image_note"> [ Image size should not be more than {!! applicationSettings('member-image-size') !!} KB ]</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Card -->







<!-- Photo Gallery Category Id Field -->
<div class="form-group select-area  col-sm-4">

    {!! Form::select('photo_gallery_category_id', $names, null, ['class' => 'form-control select2', 'required']) !!}
    {!! Form::label('photo_gallery_category_id', 'Select Photo Gallery Category', ['class' => 'span_required']) !!}

</div>

<!-- Title Field -->
<div class="form-group   col-sm-4">

    {!! Form::text('title', null, ['class' => 'form-control', 'required']) !!}
    {!! Form::label('title', 'Title:', ['class' => 'span_required']) !!}

</div>



<!-- Image Url Field -->
<div class="form-group  col-sm-4 ">

    {!! Form::text('image_url', null, ['class' => 'form-control', 'required']) !!}
    {!! Form::label('image_url', 'Photo Gallery URL:', ['class' => 'span_required']) !!}

</div>















<!-- Image Field -->
{{-- <div class="form-group image_input image_input_required col-sm-6">

    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('image', ['class' => 'custom-file-input']) !!}
            {!! Form::label('image', 'Choose file', ['class' => 'custom-file-label']) !!}

        </div>
    </div>
    {!! Form::label('image', 'Image:') !!}

    @isset($photoGallery)
        @if ($photoGallery->image != '')
            <p><img src="{{ asset('images/gallery/' . $photoGallery->image) }}" alt="" height="50"></p>
        @endif
    @endisset
    <span class="image_note"> [ Image size should not be more than {!! applicationSettings('member-image-size') !!} KB ]</span>
</div>
<div class="clearfix"></div> --}}





@include('common.image-preview')
