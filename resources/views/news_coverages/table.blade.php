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
            <a href="{!! route('newsCoverages.index') !!}" class="btn btn-info mb-2">Reset</a>
        </div>
    </form>
</div>

<p class="record_count">{{ $newsCoverages->total() }} Records Found</p>

<div class="card-body p-0">
    <div class="table-responsive" id="newsCoverages-sortable">
        <table class="table" id="news-coverages-table">
            <thead>
                <tr>
                    <th>Sl no.</th>
                    <th class="sortablelink">@sortablelink('title', 'Title')</th>
                    <th class="sortablelink">@sortablelink('newsCoverageCategory.name', 'News Coverage Category')</th>
                    <th>News Url</th>
                    @if (auth()->guard('admin')->user()->hasPermissionTo('publish-news-coverage'))
                        <th>Publish</th>
                    @endif
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="tablecontents">
                @foreach ($newsCoverages as $key => $newsCoverage)
                    <tr class="row1" data-id="{{ $newsCoverage->id }}">
                        <td>{{ $newsCoverages->firstItem() + $key }}</td>
                        <td>{{ $newsCoverage->title }}</td>
                        <td>{{ $newsCoverage->news_coverage_category_id != '' ? $newsCoverage->newsCoverageCategory->name : '' }}
                        </td>
                        <td>{{ $newsCoverage->news_url }}</td>
                        @if (auth()->guard('admin')->user()->hasPermissionTo('publish-news-coverage'))
                            @include('common.make-publish', [
                                'id' => $newsCoverage->id,
                                'publish' => $newsCoverage->publish,
                                'type' => 'newsCoverage',
                            ])
                        @endif
                        <td>
                            {!! Form::open([
                                'route' => ['newsCoverages.destroy', $newsCoverage->id],
                                'method' => 'delete',
                                'id' => 'newsCoverage-delete-form' . $newsCoverage->id,
                            ]) !!}
                            <div class='btn-group'>
                                {{-- @if (auth()->user()->hasPermissionTo('view-newsCoverages')) --}}
                                <a href="{{ route('newsCoverages.show', [$newsCoverage->id]) }}"
                                    class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>
                                {{-- @endif --}}

                                @if (auth()->guard('admin')->user()->hasPermissionTo('edit-news-coverage'))
                                    <a href="{{ route('newsCoverages.edit', [$newsCoverage->id]) }}"
                                        class='btn btn-default btn-xs'>
                                        <i class="far fa-edit"></i>
                                    </a>
                                @endif

                                @if (auth()->guard('admin')->user()->hasPermissionTo('delete-news-coverage'))
                                    {!! Form::button('<i class="far fa-trash-alt"></i>', [
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-xs',
                                        'onclick' => 'deleteRecord(event, ' . $newsCoverage->id . ')',
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
                'records' => $newsCoverages->appends(request()->query()),
            ])
        </div>
    </div>
</div>
@include('common.sweet-alert-before-delete', ['formName' => 'newsCoverage-delete-form'])
