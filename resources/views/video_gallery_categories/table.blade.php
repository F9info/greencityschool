<div align="center" class="form-search">
    <form class="form-inline form-search" method="GET" action="">

        <div class="item">
            <label class="sr-only" for="inputSearch">Search</label>
            <input type="text" class="form-control " id="inputSearch" name="search" placeholder="Name, Year"
                value="{{ request()->get('search') }}">
        </div>

        <div class="item"> <button type="submit" class="btn btn-primary mb-2 mr-2">Search</button>
            <a href="{!! route('videoGalleryCategories.index') !!}" class="btn btn-info mb-2">Reset</a>
        </div>

    </form>
</div>

<p class="record_count">{{ $videoGalleryCategories->total() }} Records Found</p>

<div class="card-body p-0">
    <div class="table-responsive" id="videoGalleryCategories-sortable">
        <table class="table" id="video-gallery-categories-table">
            <thead>
                <tr>
                    <th>Sl no.</th>
                    <th class="sortablelink">@sortablelink('name', 'Category Name')</th>
                    <th class="sortablelink">@sortablelink('year', 'Year')</th>
                    <th class="sortablelink">@sortablelink('created_at', 'Posted Date')</th>
                    <th>Videos</th>
                    @if(auth()->guard('admin')->user()->hasPermissionTo('publish-video-categories'))<th>Publish</th>@endif
                    <th style="text-align:center">Action</th>
                </tr>
            </thead>
            <tbody id="tablecontents">
                @foreach ($videoGalleryCategories as $key => $videoGalleryCategory)
                    <tr class="row1" data-id="{{ $videoGalleryCategory->id }}">
                        <td>{{ $videoGalleryCategories->firstItem() + $key }}</td>
                        <td>{{ $videoGalleryCategory->name }}</td>
                        <td>{{ $videoGalleryCategory->year }}</td>
                        <td>{{ formatDate($videoGalleryCategory->created_at) }}</td>
                        <td><a href="{{ url('videoGalleries?category=' . $videoGalleryCategory->id) }}"
                                class="btn btn-primary btn-xs mb-2 mr-2">Videos</a></td>
                        @if(auth()->guard('admin')->user()->hasPermissionTo('publish-video-categories'))
                            @include('common.make-publish', [
                                'id' => $videoGalleryCategory->id,
                                'publish' => $videoGalleryCategory->publish,
                                'type' => 'videoGalleryCategory',
                            ])
                        @endif
                        <td>
                            {!! Form::open([
                                'route' => ['videoGalleryCategories.destroy', $videoGalleryCategory->id],
                                'method' => 'delete',
                                'id' => 'videoGalleryCategory-delete-form' . $videoGalleryCategory->id,
                            ]) !!}
                            <div class='btn-group'>
                                {{-- @if (auth()->user()->hasPermissionTo('view-videoGalleryCategories')) --}}
                                <a href="{{ route('videoGalleryCategories.show', [$videoGalleryCategory->id]) }}"
                                    class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>
                                {{-- @endif --}}

                                @if(auth()->guard('admin')->user()->hasPermissionTo('edit-video-categories'))
                                <a href="{{ route('videoGalleryCategories.edit', [$videoGalleryCategory->id]) }}"
                                    class='btn btn-default btn-xs ajax-popup-link'>
                                    <i class="far fa-edit"></i>
                                </a>
                                @endif

                                @if(auth()->guard('admin')->user()->hasPermissionTo('delete-video-categories'))
                                {!! Form::button('<i class="far fa-trash-alt"></i>', [
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'onclick' => 'deleteRecord(event, ' . $videoGalleryCategory->id . ')',
                                ]) !!}
                                @endif
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', [
                'records' => $videoGalleryCategories->appends(request()->query()),
            ])
        </div>
    </div>
</div>
@include('common.sweet-alert-before-delete', ['formName' => 'videoGalleryCategory-delete-form'])
@include('common.sortable', ['url' => 'videoGalleryCategories-sortable'])
