<div class="row ">
    <div class="col-md-9">
        <div class="row animation-form">
            <!-- Title Field -->
            <div class="form-group col-sm-6">

                {!! Form::text('title', null, [
                    'class' => 'form-control',
                    'required',
                    'id' => 'title',
                    'onkeyup' => 'convertToSlug()',
                ]) !!}
                {!! Form::label('title', 'Title:', ['class' => 'span_required']) !!}

            </div>

            <!-- Slug Field -->
            <div class="form-group col-sm-6 disbaled_input">

                {!! Form::text('slug', null, ['class' => 'form-control', 'required', 'id' => 'slug', 'readonly']) !!}
                {!! Form::label('slug', 'Slug:', ['class' => 'span_required']) !!}

            </div>

            <!-- Parent Field -->
            <div class="form-group col-sm-6 select-area">

                {!! Form::select('parent', ['root' => 'root', $pages], null, [
                    'class' => 'form-control select2',
                    'placeholder' => 'Select Parent',
                    'required',
                ]) !!}
                {!! Form::label('parent', 'Parent:', ['class' => 'span_required']) !!}

            </div>

            <div class="col-sm-12 customurlblock" style="display: none;">
                <div class="row">
                    <!-- Custom Url Field -->
                    <div class="form-group col-sm-6">

                        {!! Form::text('custom_url', null, ['class' => 'form-control']) !!}
                        {!! Form::label('custom_url', 'Custom Url:') !!}
                    </div>
                </div>
            </div>

            <div class="col-sm-12 pageviewblock" style="display: none;">
                <div class="row">
                    <!-- Banner Image Field -->
                    <div class="form-group image_input col-sm-6">

                        <div class="input-group">
                            <div class="custom-file">
                                {!! Form::file('banner_image', ['class' => 'custom-file-input']) !!}
                                {!! Form::label('banner_image', 'Choose file', ['class' => 'custom-file-label']) !!}
                            </div>
                        </div>
                        {!! Form::label('banner_image', 'Banner Image:') !!}
                        <span class="image_note">[ Image size should not be more than {!! applicationSettings('banner-image-size') !!} KB
                            ]</span>
                        @isset($cms)
                            @if ($cms->banner_image != '')
                                <div class="pic-img-block"><img
                                        src="{{ asset('images/inner-pages/' . $cms->banner_image) }}" alt=""
                                        height="50"></div>
                            @endif
                        @endisset
                    </div>


                    <!-- Gallery Field -->
                    <div class="form-group image_input col-sm-6">

                        <div class="input-group">
                            <div class="custom-file">
                                {!! Form::file('gallery[]', ['class' => 'custom-file-input', 'multiple' => true]) !!}
                                {!! Form::label('gallery', 'Choose file', ['class' => 'custom-file-label']) !!}
                            </div>
                        </div>
                        {!! Form::label('gallery', 'CMS Gallery:') !!}
                        <span class="image_note">[ Upload multiple images ]</span>
                        @isset($cms)
                            @if ($cms->gallery != '')
                                <p class="welcome-image">
                                    @foreach ($cms->gallery as $gal)
                                        @if ($gal != null)
                                            <span>
                                                <a href="{{ url('delete-cms-image/' . $cms->id . '/' . $gal) }}"
                                                    class="remove_field">X</a>
                                                <img src="{{ asset('images/inner-pages/' . $gal) }}" alt=""
                                                    height="50">
                                            </span>
                                        @endif
                                    @endforeach
                                </p>
                            @endif
                        @endisset
                    </div>

                    <div class="clearfix"></div>

                    <!-- Banner Title Field -->
                    <div class="form-group col-sm-6">

                        {!! Form::text('banner_title', null, ['class' => 'form-control']) !!}
                        {!! Form::label('banner_title', 'Banner Title:') !!}
                    </div>

                    <!-- Banner Tagline Field -->
                    <div class="form-group col-sm-6">

                        {!! Form::text('banner_tagline', null, ['class' => 'form-control']) !!}
                        {!! Form::label('banner_tagline', 'Banner Tagline:') !!}
                    </div>



                    <!-- Short Description Field -->
                    <div class="form-group col-sm-6">

                        {!! Form::text('short_description', null, ['class' => 'form-control']) !!}
                        {!! Form::label('short_description', 'Short Description:') !!}
                    </div>

                    <!-- Content Field -->
                    <div class="form-group textarea-section col-sm-12 col-lg-12">

                        {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
                        {!! Form::label('content', 'Content:') !!}
                    </div>
                </div>
            </div>

            <div class="col-12 section-title">
                <h4 class="cat-title">Seo Details</h4>
            </div>

            <!-- Seo Title Field -->
            <div class="form-group col-sm-12 col-lg-12">

                {!! Form::textarea('seo_title', null, ['class' => 'form-control']) !!}
                {!! Form::label('seo_title', 'Seo Title:') !!}
            </div>

            <!-- Seo Keywords Field -->
            <div class="form-group col-sm-12 col-lg-12">
                {!! Form::label('seo_keywords', 'Seo Keywords:') !!}
                {!! Form::textarea('seo_keywords', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Seo Description Field -->
            <div class="form-group col-sm-12 col-lg-12">

                {!! Form::textarea('seo_description', null, ['class' => 'form-control']) !!}
                {!! Form::label('seo_description', 'Seo Description:') !!}
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="right-side-page">
            <!-- Type Field -->
            <div class="form-group ">
                <h4>Page Types <span class="required-span" style="color: red">*</span></h4>
                <div class="radio">
                    <label>
                        {!! Form::radio('type', 'pageview', null, ['required']) !!}
                        Page View
                    </label>
                    <label>
                        {!! Form::radio('type', 'customurl') !!}
                        Custom URL
                    </label>
                    <label>
                        {!! Form::radio('type', 'nopage') !!}
                        No Page
                    </label>
                </div>
            </div>

            <!-- Menu Position Field -->
            <div class="form-group ">
                <h4>Menu Positions</h4>
                <div class="checkbox">
                    <label>
                        {!! Form::checkbox('main_menu') !!}

                        Main Menu
                    </label>
                    <label>
                        {!! Form::checkbox('top_menu') !!}
                        Top Menu
                    </label>
                    <label>
                        {!! Form::checkbox('side_menu') !!}
                        Side Menu
                    </label>
                    <label>
                        {!! Form::checkbox('footer_menu') !!}
                        Footer Menu
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>

@include('common.string-to-slug', ['fieldName' => 'title'])

@include('common.editor', ['variable' => 'editor1', 'field' => 'content'])

@push('page_scripts')
    <script type="text/javascript">
        function pagetype(type) {
            if (type == 'pageview') {
                $(".pageviewblock").show();
                $(".customurlblock").hide();
                $("#custom_url").val('');
            } else if (type == 'customurl') {
                $(".customurlblock").show();
                $(".pageviewblock").hide();
            } else if (type == 'nopage') {
                $(".customurlblock").hide();
                $(".pageviewblock").hide();
                $("#custom_url").val('');
            }
        }
        $(document).ready(function() {
            $(".customurlblock").hide();
            $(".pageviewblock").hide();
            var type = $('input[name="type"]:checked').val();
            pagetype(type);
            $('input[type=radio][name=type]').change(function() {
                pagetype(this.value);
            });
        });
    </script>
@endpush
