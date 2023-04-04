<!-- Payment Method Name Field -->
<div class="col-sm-12">
    {!! Form::label('payment_method_name', 'Payment Method Name:') !!}
    <p>{{ $paymentMethod->payment_method_name }}</p>
</div>

<!-- Sandbox Key Field -->
<div class="col-sm-12">
    {!! Form::label('sandbox_key', 'Sandbox Key:') !!}
    <p>{{ $paymentMethod->sandbox_key }}</p>
</div>

<!-- Sandbox Secret Field -->
<div class="col-sm-12">
    {!! Form::label('sandbox_secret', 'Sandbox Secret:') !!}
    <p>{{ $paymentMethod->sandbox_secret }}</p>
</div>

<!-- Live Key Field -->
<div class="col-sm-12">
    {!! Form::label('live_key', 'Live Key:') !!}
    <p>{{ $paymentMethod->live_key }}</p>
</div>

<!-- Live Secret Field -->
<div class="col-sm-12">
    {!! Form::label('live_secret', 'Live Secret:') !!}
    <p>{{ $paymentMethod->live_secret }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $paymentMethod->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $paymentMethod->updated_at }}</p>
</div>

