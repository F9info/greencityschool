<div align="center" class="form-search">
    <form class="form-inline form-search" method="GET" action="">

        <div class="item">
            <label class="sr-only" for="inputSearch">Search</label>
            <input type="text" class="form-control " id="inputSearch" name="search" placeholder="Name, Year"
                value="{{ request()->get('search') }}">
        </div>

        <div class="item"> <button type="submit" class="btn btn-primary mb-2 mr-2">Search</button>
            <a href="{!! route('newsCoverageCategories.index') !!}" class="btn btn-info mb-2">Reset</a>
        </div>

    </form>
</div>

<p class="record_count">{{ $newsCoverageCategories->total() }} Records Found</p>

<div class="card-body p-0">
    <div class="table-responsive" id="newsCoverageCategories-sortable">
        <table class="table" id="news-coverage-categories-table">
            <thead>
                <tr>
                    <th>Sl no.</th>
                    <th class="sortablelink">@sortablelink('name', 'Category Name')</th>
                    <th class="sortablelink">@sortablelink('year', 'Year')</th>
                    <th>Posted Date</th>
                    @if (auth()->guard('admin')->user()->hasPermissionTo('publish-news-coverage-categories'))
                        <th>Publish</th>
                    @endif
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="tablecontents">
                @foreach ($newsCoverageCategories as $key => $newsCoverageCategory)
                    <tr class="row1" data-id="{{ $newsCoverageCategory->id }}">
                        <td>{{ $newsCoverageCategories->firstItem() + $key }}</td>
                        <td>{{ $newsCoverageCategory->name }}</td>
                        <td>{{ $newsCoverageCategory->year }}</td>
                        <td>{{ formatDate($newsCoverageCategory->created_at) }}</td>
                        @if (auth()->guard('admin')->user()->hasPermissionTo('publish-news-coverage-categories'))
                            @include('common.make-publish', [
                                'id' => $newsCoverageCategory->id,
                                'publish' => $newsCoverageCategory->publish,
                                'type' => 'newsCoverageCategory',
                            ])
                        @endif
                        <td>
                            {!! Form::open([
                                'route' => ['newsCoverageCategories.destroy', $newsCoverageCategory->id],
                                'method' => 'delete',
                                'id' => 'newsCoverageCategory-delete-form' . $newsCoverageCategory->id,
                            ]) !!}
                            <div class='btn-group'>
                                {{-- @if (auth()->user()->hasPermissionTo('view-newsCoverageCategories')) --}}
                                <a href="{{ route('newsCoverageCategories.show', [$newsCoverageCategory->id]) }}"
                                    class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>
                                {{-- @endif --}}

                                @if (auth()->guard('admin')->user()->hasPermissionTo('edit-news-coverage-categories'))
                                    <a href="{{ route('newsCoverageCategories.edit', [$newsCoverageCategory->id]) }}"
                                        class='btn btn-default btn-xs ajax-popup-link'>
                                        <i class="far fa-edit"></i>
                                    </a>
                                @endif

                                @if (auth()->guard('admin')->user()->hasPermissionTo('delete-news-coverage-categories'))
                                    {!! Form::button('<i class="far fa-trash-alt"></i>', [
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-xs',
                                        'onclick' => 'deleteRecord(event, ' . $newsCoverageCategory->id . ')',
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
                'records' => $newsCoverageCategories->appends(request()->query()),
            ])
        </div>
    </div>
</div>
@include('common.sweet-alert-before-delete', ['formName' => 'newsCoverageCategory-delete-form'])
