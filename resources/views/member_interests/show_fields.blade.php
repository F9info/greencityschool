<!-- Interests Field -->
<div class="col-sm-12">
    {!! Form::label('interests', 'Interests:') !!}
    <p>{{ $memberInterest->interests }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $memberInterest->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $memberInterest->updated_at }}</p>
</div>

