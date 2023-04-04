<!-- Membership Name Field -->
<div class="col-sm-12">
    {!! Form::label('membership_name', 'Membership Name:') !!}
    <p>{{ $membershipType->membership_name }}</p>
</div>

<!-- Price Field -->
<div class="col-sm-12">
    {!! Form::label('price', 'Price:') !!}
    <p>{{ $membershipType->price }}</p>
</div>

<!-- Months Field -->
<div class="col-sm-12">
    {!! Form::label('months', 'Months:') !!}
    <p>{{ $membershipType->months }}</p>
</div>

<!-- Expiry Date Field -->
<div class="col-sm-12">
    {!! Form::label('expiry_date', 'Expiry Date:') !!}
    <p>{{ $membershipType->expiry_date }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $membershipType->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $membershipType->updated_at }}</p>
</div>

