@include('adminlte-templates::common.errors')


{!! Form::open(['route' => 'videoGalleryCategories.store']) !!}

<div class="card-body">

    <div class="row animation-form">
        @include('video_gallery_categories.fields')
    </div>

</div>

<div class="card-footer">
    {!! Form::submit('Save', ['class' => 'btn btn-primary rgbtn']) !!}
    <a href="{{ route('videoGalleryCategories.index') }}" class="btn btn-default rgbtn"> Cancel </a>
</div>

{!! Form::close() !!}
