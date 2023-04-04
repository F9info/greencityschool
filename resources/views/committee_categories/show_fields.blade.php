<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $committeeCategory->name }}</p>
</div>

<!-- Committee Category Type Id Field -->
<div class="col-sm-12">
    {!! Form::label('committee_category_type_id', 'Type:') !!}
    <p>{{ $committeeCategory->committee_category_type_id != null ? $committeeCategory->committeeCategoryType->type : '' }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $committeeCategory->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $committeeCategory->updated_at }}</p>
</div>

