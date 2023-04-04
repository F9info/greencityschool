<!-- Category Name Field -->
<div class="col-sm-12">
    {!! Form::label('category_name', 'Category Name:') !!}
    <p>{{ $sponsorCategory->category_name }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $sponsorCategory->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $sponsorCategory->updated_at }}</p>
</div>

