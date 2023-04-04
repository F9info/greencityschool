@include('adminlte-templates::common.errors')

<div class="card">

    {!! Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'patch']) !!}

    <div class="card-body">
        <div class="row animation-form">
            @include('categories.fields')
        </div>
    </div>

    <div class="card-footer">
        {!! Form::submit('Save', ['class' => 'btn btn-primary rgbtn']) !!}
        <a href="{{ route('categories.index') }}" class="btn btn-default rgbtn"> Cancel </a>
    </div>

    {!! Form::close() !!}
