<!-- Donation Cause Field -->
<div class="form-group col-sm-12 popup_input">
    {!! Form::text('donation_cause', null, ['class' => 'form-control', 'required']) !!}
    {!! Form::label('donation_cause', 'Donation Cause:', ['class' => 'span_required']) !!}

</div>

@include('common.ajax-popup')
