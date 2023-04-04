<!-- Name Field -->
<div class="form-group col-sm-6">

    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
    {!! Form::label('name', 'Committee Category Name:', ['class' => 'span_required']) !!}

</div>

<!-- Committee Category Type Id Field -->
<div class="form-group select-area col-sm-6">

    {!! Form::select('committee_category_type_id', $types, null, ['class' => 'form-control select2', 'placeholder' => 'Select Committee Category Type', 'required' ]) !!}
    {!! Form::label('committee_category_type_id', 'Committee Category Type:', ['class' => 'span_required']) !!}

</div>
