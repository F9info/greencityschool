<!-- Donation Cause Field -->
<div class="col-sm-12">
    {!! Form::label('donation_cause', 'Donation Cause:') !!}
    <p>{{ $donationCategory->donation_cause }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $donationCategory->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $donationCategory->updated_at }}</p>
</div>

