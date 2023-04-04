<!-- Video Gallery Category Id Field -->
<div class="form-group col-sm-4 select-area">

    {!! Form::select('video_gallery_category_id', $names, null, ['class' => 'form-control select2']) !!}
    {!! Form::label('video_gallery_category_id', 'Select Video Gallery Category', ['class' => 'span_required']) !!}

</div>

<!-- Title Field -->
<div class="form-group col-sm-4">

    {!! Form::text('title', null, ['class' => 'form-control', 'required']) !!}
    {!! Form::label('title', 'Title:', ['class' => 'span_required']) !!}

</div>

<!-- Video Url Field -->
<div class="form-group col-sm-4">

    {!! Form::text('video_url', null, ['class' => 'form-control', 'required']) !!}
    {!! Form::label('video_url', 'Youtube Video URL:', ['class' => 'span_required']) !!}

</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">

    {!! Form::textarea('description', null, ['class' => 'form-control', 'required']) !!}
    {!! Form::label('description', 'Description:') !!}
</div>
