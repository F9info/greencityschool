@include('adminlte-templates::common.errors')

{!! Form::model($eventCategory, [
    'route' => ['eventCategories.update', $eventCategory->id],
    'method' => 'patch',
]) !!}

<div class="card-body">
    <div class="row animation-form">
        @include('event_categories.fields')
    </div>
</div>

<div class="card-footer">
    {!! Form::submit('Save', ['class' => 'btn btn-primary rgbtn']) !!}
    <a href="{{ route('eventCategories.index') }}" class="btn btn-default rgbtn"> Cancel </a>
</div>

{!! Form::close() !!}
