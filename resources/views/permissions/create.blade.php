@include('flash::message')

@include('adminlte-templates::common.errors')



{!! Form::open(['route' => 'permissions.store']) !!}

<div class="card-body">
    <div class="row animation-form">
        @include('permissions.fields')
    </div>
</div>

<div class="card-footer">
    {!! Form::submit('Save', ['class' => 'btn btn-primary rgbtn']) !!}
    <a href="{{ route('permissions.index') }}" class="btn btn-default">Cancel</a>
</div>

{!! Form::close() !!}
