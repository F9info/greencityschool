<!-- Reference Field -->
<div class="col-sm-12">
    {!! Form::label('reference', 'Reference:') !!}
    <p>{{ $transaction->reference }}</p>
</div>

<!-- Transaction Id Field -->
<div class="col-sm-12">
    {!! Form::label('transaction_id', 'Transaction Id:') !!}
    <p>{{ $transaction->transaction_id }}</p>
</div>

<!-- Amount Field -->
<div class="col-sm-12">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{{ $transaction->amount }}</p>
</div>

<!-- Transaction Date Field -->
<div class="col-sm-12">
    {!! Form::label('transaction_date', 'Transaction Date:') !!}
    <p>{{ $transaction->transaction_date }}</p>
</div>

<!-- Payment Method Id Field -->
<div class="col-sm-12">
    {!! Form::label('payment_method_id', 'Payment Method Id:') !!}
    <p>{{ $transaction->payment_method_id }}</p>
</div>

<!-- Payment Status Field -->
<div class="col-sm-12">
    {!! Form::label('payment_status', 'Payment Status:') !!}
    <p>{{ $transaction->payment_status }}</p>
</div>

<!-- Bank Name Field -->
<div class="col-sm-12">
    {!! Form::label('bank_name', 'Bank Name:') !!}
    <p>{{ $transaction->bank_name }}</p>
</div>

<!-- Cheque No Field -->
<div class="col-sm-12">
    {!! Form::label('cheque_no', 'Cheque No:') !!}
    <p>{{ $transaction->cheque_no }}</p>
</div>

<!-- Cheque Date Field -->
<div class="col-sm-12">
    {!! Form::label('cheque_date', 'Cheque Date:') !!}
    <p>{{ $transaction->cheque_date }}</p>
</div>

<!-- Cheque Amount Field -->
<div class="col-sm-12">
    {!! Form::label('cheque_amount', 'Cheque Amount:') !!}
    <p>{{ $transaction->cheque_amount }}</p>
</div>

<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $transaction->user_id }}</p>
</div>

<!-- Event Id Field -->
<div class="col-sm-12">
    {!! Form::label('event_id', 'Event Id:') !!}
    <p>{{ $transaction->event_id }}</p>
</div>

<!-- Admin Comment Field -->
<div class="col-sm-12">
    {!! Form::label('admin_comment', 'Admin Comment:') !!}
    <p>{{ $transaction->admin_comment }}</p>
</div>

<!-- User Comment Field -->
<div class="col-sm-12">
    {!! Form::label('user_comment', 'User Comment:') !!}
    <p>{{ $transaction->user_comment }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $transaction->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $transaction->updated_at }}</p>
</div>

