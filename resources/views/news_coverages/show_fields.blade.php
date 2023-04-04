<!-- News Coverage Category Id Field -->
<div class="col-sm-12">
    {!! Form::label('news_coverage_category_id', 'News Coverage Category Id:') !!}
    <p>{{ $newsCoverage->news_coverage_category_id }}</p>
</div>

<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $newsCoverage->title }}</p>
</div>

<!-- News Url Field -->
<div class="col-sm-12">
    {!! Form::label('news_url', 'News Url:') !!}
    <p>{{ $newsCoverage->news_url }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $newsCoverage->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $newsCoverage->updated_at }}</p>
</div>

