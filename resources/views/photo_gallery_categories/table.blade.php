<div align="center" class="form-search">
    <form class="form-inline form-search" method="GET" action="">

        <div class="item">
            <label class="sr-only" for="inputSearch">Search</label>
            <input type="text" class="form-control " id="inputSearch" name="search" placeholder="Name, Year"
                value="{{ request()->get('search') }}">
        </div>

        <div class="item"> <button type="submit" class="btn btn-primary mb-2 mr-2">Search</button>
            <a href="{!! route('photoGalleryCategories.index') !!}" class="btn btn-info mb-2">Reset</a>
        </div>

    </form>
</div>

<p class="record_count">{{ $photoGalleryCategories->total() }} Records Found</p>

<div class="card-body p-0">
    <div class="table-responsive" id="photoGalleryCategories-sortable">
        <table class="table" id="photo-gallery-categories-table">
            <thead>
                <tr>
                    <th>Sl no.</th>
                    <th class="sortablelink">@sortablelink('name', 'Category Name')</th>
                    <th class="sortablelink">@sortablelink('year', 'Year')</th>
                    <th class="sortablelink">@sortablelink('created_at', 'Posted Date')</th>
                    <th>Photos</th>
                    @if (auth()->guard('admin')->user()->hasPermissionTo('publish-photo-categories'))
                        <th>Publish</th>
                    @endif
                    <th style="text-align:center">Action</th>
                </tr>
            </thead>
            <tbody id="tablecontents">
                @foreach ($photoGalleryCategories as $key => $photoGalleryCategory)
                    <tr class="row1" data-id="{{ $photoGalleryCategory->id }}">
                        <td>{{ $photoGalleryCategories->firstItem() + $key }}</td>
                        <td>{{ $photoGalleryCategory->name }}</td>
                        <td>{{ $photoGalleryCategory->year }}</td>
                        <td>{{ formatDate($photoGalleryCategory->created_at) }}</td>
                        <td><a href="{{ url('photoGalleries?category=' . $photoGalleryCategory->id) }}"
                                class="btn btn-xs btn-primary mb-2 mr-2">Photos</a></td>
                        @if (auth()->guard('admin')->user()->hasPermissionTo('publish-photo-categories'))
                            @include('common.make-publish', [
                                'id' => $photoGalleryCategory->id,
                                'publish' => $photoGalleryCategory->publish,
                                'type' => 'photoGalleryCategory',
                            ])
                        @endif
                        <td style="text-align:center">
                            {!! Form::open([
                                'route' => ['photoGalleryCategories.destroy', $photoGalleryCategory->id],
                                'method' => 'delete',
                                'id' => 'photoGalleryCategory-delete-form' . $photoGalleryCategory->id,
                            ]) !!}
                            <div class='btn-group'>
                                {{-- @if (auth()->user()->hasPermissionTo('view-photoGalleryCategories')) --}}
                                <a href="{{ route('photoGalleryCategories.show', [$photoGalleryCategory->id]) }}"
                                    class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>
                                {{-- @endif --}}

                                @if (auth()->guard('admin')->user()->hasPermissionTo('edit-photo-categories'))
                                    <a href="{{ route('photoGalleryCategories.edit', [$photoGalleryCategory->id]) }}"
                                        class='btn btn-default btn-xs ajax-popup-link'>
                                        <i class="far fa-edit"></i>
                                    </a>
                                @endif

                                @if (auth()->guard('admin')->user()->hasPermissionTo('delete-photo-categories'))
                                    {!! Form::button('<span class="material-symbols-outlined">delete</span>', [
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-xs',
                                        'onclick' => 'deleteRecord(event, ' . $photoGalleryCategory->id . ')',
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
                'records' => $photoGalleryCategories->appends(request()->query()),
            ])
        </div>
    </div>
</div>
@include('common.sweet-alert-before-delete', ['formName' => 'photoGalleryCategory-delete-form'])
@include('common.sortable', ['url' => 'photoGalleryCategories-sortable'])
