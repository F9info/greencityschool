<!-- Category Name Field -->
<div class="form-group col-sm-12 popup_input">

    {!! Form::text('category_name', null, ['class' => 'form-control', 'required', 'maxlength' => '100']) !!}
    {!! Form::label('category_name', 'Category Name:', ['class' => 'span_required']) !!}

</div>

@include('common.ajax-popup')
