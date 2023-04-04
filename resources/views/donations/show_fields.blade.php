<!-- Donation Amount Field -->
<div class="col-sm-12">
    {!! Form::label('donation_amount', 'Donation Amount:') !!}
    <p>{{ $donation->donation_amount }}</p>
</div>

<!-- First Name Field -->
<div class="col-sm-12">
    {!! Form::label('first_name', 'First Name:') !!}
    <p>{{ $donation->first_name }}</p>
</div>

<!-- Last Name Field -->
<div class="col-sm-12">
    {!! Form::label('last_name', 'Last Name:') !!}
    <p>{{ $donation->last_name }}</p>
</div>

<!-- Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $donation->email }}</p>
</div>

<!-- Address Field -->
<div class="col-sm-12">
    {!! Form::label('address', 'Address:') !!}
    <p>{{ $donation->address }}</p>
</div>

<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $donation->user_id }}</p>
</div>

<!-- Donation Category Id Field -->
<div class="col-sm-12">
    {!! Form::label('donation_category_id', 'Donation Category Id:') !!}
    <p>{{ $donation->donation_category_id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $donation->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $donation->updated_at }}</p>
</div>

