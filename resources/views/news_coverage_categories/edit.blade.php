@include('adminlte-templates::common.errors')



{!! Form::model($newsCoverageCategory, [
    'route' => ['newsCoverageCategories.update', $newsCoverageCategory->id],
    'method' => 'patch',
]) !!}

<div class="card-body">
    <div class="row animation-form">
        @include('news_coverage_categories.fields')
    </div>
</div>

<div class="card-footer">
    {!! Form::submit('Save', ['class' => 'btn btn-primary rgbtn']) !!}
    <a href="{{ route('newsCoverageCategories.index') }}" class="btn btn-default rgbtn"> Cancel </a>
</div>

{!! Form::close() !!}
