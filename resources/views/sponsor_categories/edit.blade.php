{!! Form::model($sponsorCategory, [
    'route' => ['sponsorCategories.update', $sponsorCategory->id],
    'method' => 'patch',
]) !!}

<div class="card-body">
    <div class="row animation-form">
        @include('sponsor_categories.fields')
    </div>
</div>

<div class="card-footer">
    {!! Form::submit('Save', ['class' => 'btn btn-primary rgbtn']) !!}
    <a href="{{ route('sponsorCategories.index') }}" class="btn btn-default rgbtn"> Cancel </a>
</div>

{!! Form::close() !!}
