<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $cms->title }}</p>
</div>

<!-- Slug Field -->
<div class="col-sm-12">
    {!! Form::label('slug', 'Slug:') !!}
    <p>{{ $cms->slug }}</p>
</div>

<!-- Parent Field -->
<div class="col-sm-12">
    {!! Form::label('parent', 'Parent:') !!}
    <p>{{ $cms->parent }}</p>
</div>

<!-- Custom Url Field -->
<div class="col-sm-12">
    {!! Form::label('custom_url', 'Custom Url:') !!}
    <p>{{ $cms->custom_url }}</p>
</div>

<!-- Banner Image Field -->
<div class="col-sm-12">
    {!! Form::label('banner_image', 'Banner Image:') !!}
    <p>{{ $cms->banner_image }}</p>
</div>

<!-- Banner Title Field -->
<div class="col-sm-12">
    {!! Form::label('banner_title', 'Title:') !!}
    <p>{{ $cms->banner_title }}</p>
</div>

<!-- Banner Tagline Field -->
<div class="col-sm-12">
    {!! Form::label('banner_tagline', 'Banner Tagline:') !!}
    <p>{{ $cms->banner_tagline }}</p>
</div>

<!-- Short Description Field -->
<div class="col-sm-12">
    {!! Form::label('short_description', 'Short Description:') !!}
    <p>{{ $cms->short_description }}</p>
</div>

<!-- Content Field -->
<div class="col-sm-12">
    {!! Form::label('content', 'Content:') !!}
    <p>{{ $cms->content }}</p>
</div>

<!-- Gallery Field -->
<div class="col-sm-12">
    {!! Form::label('gallery', 'Gallery:') !!}
    <p>{{ $cms->gallery }}</p>
</div>

<!-- Seo Title Field -->
<div class="col-sm-12">
    {!! Form::label('seo_title', 'Seo Title:') !!}
    <p>{{ $cms->seo_title }}</p>
</div>

<!-- Seo Keywords Field -->
<div class="col-sm-12">
    {!! Form::label('seo_keywords', 'Seo Keywords:') !!}
    <p>{{ $cms->seo_keywords }}</p>
</div>

<!-- Seo Description Field -->
<div class="col-sm-12">
    {!! Form::label('seo_description', 'Seo Description:') !!}
    <p>{{ $cms->seo_description }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $cms->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $cms->updated_at }}</p>
</div>