<!-- Card -->
<div class="col-sm-12">
    <div class="card  sponser_card">
        <div class="card-body">


            <div class="form-group  image_input_required image_preview_block" style="max-width: 100%">
                <div class="pic">
                    <div id="image_preview">
                        @isset($sponsor)
                            @if ($sponsor->image != '')
                                <p><img src="{{ asset('images/sponsor/' . $sponsor->image) }}" alt="" height="50">
                                </p>
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

                    {!! Form::label('image', 'Choose file', ['class' => 'custom-file-label ']) !!}
                    <span class="image_note">[ Image size should not be more than {!! applicationSettings('member-image-size') !!} KB ]</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Card -->


<!-- Sponsor Category Id Field -->
<div class="form-group col-sm-4 select-area">

    {!! Form::select('sponsor_category_id', $categories, null, [
        'class' => 'form-control select2',
        'required',
        'placeholder' => 'Select Sponsor Category',
    ]) !!}
    {!! Form::label('sponsor_category_id', 'Select Sponsor Category', ['class' => 'span_required']) !!}

</div>

<!-- Title Field -->
<div class="form-group col-sm-4">

    {!! Form::text('title', null, ['class' => 'form-control', 'required', 'maxlength' => '100']) !!}
    {!! Form::label('title', 'Title:', ['class' => 'span_required']) !!}

</div>


<div class="clearfix"></div>

<!-- Url Field -->
<div class="form-group col-sm-4">

    {!! Form::text('url', null, ['class' => 'form-control', 'required']) !!}
    {!! Form::label('url', 'Url:', ['class' => 'span_required']) !!}

</div>

@include('common.image-preview')
