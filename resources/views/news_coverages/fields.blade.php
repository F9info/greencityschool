<!-- News Coverage Category Id Field -->
<div class="form-group col-sm-6 select-area">

    {!! Form::select('news_coverage_category_id', $categories, null, ['class' => 'form-control select2', 'required', 'placeholder' => 'Select News Coverage Category']) !!}
    {!! Form::label('news_coverage_category_id', 'News Coverage Category', ['class' => 'span_required']) !!}

</div>

<!-- Title Field -->
<div class="form-group col-sm-6">

    {!! Form::text('title', null, ['class' => 'form-control', 'required', 'maxlength' => '100', 'numbers-input']) !!}
    {!! Form::label('title', 'Title:', ['class' => 'span_required']) !!}

</div>

<!-- News Url Field -->
<div class="form-group col-sm-6">

    {!! Form::text('news_url', null, ['class' => 'form-control', 'required']) !!}
    {!! Form::label('news_url', 'News Url:', ['class' => 'span_required']) !!}

</div>
