<div align="center" class="form-search">
    <form class="form-inline form-search" method="GET" action="">

        <div class="item">
            <label class="sr-only" for="inputSearch">Search</label>
            <input type="text" class="form-control " id="inputSearch" name="search" placeholder="Title"
                value="{{ request()->get('search') }}">
        </div>
        <div class="item">
            <label class="sr-only" for="inputCategory">Select Category</label>
            <select class="form-control mb-2 mr-sm-2 select2" id="inputCategory" name="category">
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ request()->get('category') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="item"> <button type="submit" class="btn btn-primary mb-2 mr-2">Search</button>
            <a href="{!! route('photoGalleries.index') !!}" class="btn btn-info mb-2">Reset</a>
        </div>

    </form>
</div>

<p class="record_count">{{ $photoGalleries->total() }} Records Found</p>

<div class="card-body p-0">
    <div class="table-responsive" id="photoGalleries-sortable">
        <table class="table" id="photo-galleries-table">
            <thead>
                <tr>
                    <th>Sl no.</th>
                    <th class="sortablelink">@sortablelink('title', 'Title')</th>
                    <th class="sortablelink">@sortablelink('photoGalleryCategory.name', 'Category Name')</th>
                    <th>Category Name</th>
                    @if (auth()->guard('admin')->user()->hasPermissionTo('publish-photo-gallery'))
                        <th>Publish</th>
                    @endif
                    <th style="text-align:center">Action</th>
                </tr>
            </thead>
            <tbody id="tablecontents">
                @foreach ($photoGalleries as $key => $photoGallery)
                    <tr class="row1" data-id="{{ $photoGallery->id }}">
                        <td>{{ $photoGalleries->firstItem() + $key }}</td>
                        <td><img src="{{ asset('images/gallery/' . $photoGallery->image) }}" height="50" /></td>
                        <td>{{ $photoGallery->title }}</td>
                        <td>{{ $photoGallery->photo_gallery_category_id != '' ? $photoGallery->photoGalleryCategory->name : '' }}
                        </td>
                        @if (auth()->guard('admin')->user()->hasPermissionTo('publish-photo-gallery'))
                            @include('common.make-publish', [
                                'id' => $photoGallery->id,
                                'publish' => $photoGallery->publish,
                                'type' => 'photoGallery',
                            ])
                        @endif
                        <td style="text-align:center">
                            {!! Form::open([
                                'route' => ['photoGalleries.destroy', $photoGallery->id],
                                'method' => 'delete',
                                'id' => 'photoGallery-delete-form' . $photoGallery->id,
                            ]) !!}
                            <div class='btn-group'>
                                {{-- @if (auth()->user()->hasPermissionTo('view-photoGalleries')) --}}
                                <a href="{{ route('photoGalleries.show', [$photoGallery->id]) }}"
                                    class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>
                                {{-- @endif --}}

                                @if (auth()->guard('admin')->user()->hasPermissionTo('edit-photo-gallery'))
                                    <a href="{{ route('photoGalleries.edit', [$photoGallery->id]) }}"
                                        class='btn btn-default btn-xs'>
                                        <i class="far fa-edit"></i>
                                    </a>
                                @endif

                                @if (auth()->guard('admin')->user()->hasPermissionTo('delete-photo-gallery'))
                                    {!! Form::button('<i class="far fa-trash-alt"></i>', [
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-xs',
                                        'onclick' => 'deleteRecord(event, ' . $photoGallery->id . ')',
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
                'records' => $photoGalleries->appends(request()->query()),
            ])
        </div>
    </div>
</div>
@include('common.sweet-alert-before-delete', ['formName' => 'photoGallery-delete-form'])
@include('common.sortable', ['url' => 'photoGalleries-sortable'])
