<!-- Video Gallery Category Id Field -->
<div class="col-sm-12">
    {!! Form::label('video_gallery_category_id', 'Video Gallery Category Id:') !!}
    <p>{{ $videoGallery->video_gallery_category_id }}</p>
</div>

<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $videoGallery->title }}</p>
</div>

<!-- Video Url Field -->
<div class="col-sm-12">
    {!! Form::label('video_url', 'Video Url:') !!}
    <p>{{ $videoGallery->video_url }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $videoGallery->description }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $videoGallery->status }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $videoGallery->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $videoGallery->updated_at }}</p>
</div>

