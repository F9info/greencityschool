@include('adminlte-templates::common.errors')


{!! Form::open(['route' => 'photoGalleryCategories.store']) !!}

<div class="card-body">

    <div class="row animation-form">
        @include('photo_gallery_categories.fields')
    </div>

</div>

<div class="card-footer">
    {!! Form::submit('Save', ['class' => 'btn btn-primary rgbtn']) !!}
    <a href="{{ route('photoGalleryCategories.index') }}" class="btn btn-default rgbtn"> Cancel </a>
</div>

{!! Form::close() !!}
