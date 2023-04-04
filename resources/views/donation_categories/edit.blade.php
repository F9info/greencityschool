@include('adminlte-templates::common.errors')

{!! Form::model($donationCategory, [
    'route' => ['donationCategories.update', $donationCategory->id],
    'method' => 'patch',
]) !!}

<div class="card-body">
    <div class="row animation-form">
        @include('donation_categories.fields')
    </div>
</div>

<div class="card-footer">
    {!! Form::submit('Save', ['class' => 'btn btn-primary rgbtn']) !!}
    <a href="{{ route('donationCategories.index') }}" class="btn btn-default rgbtn"> Cancel </a>
</div>

{!! Form::close() !!}
