<div align="center" class="form-search">
    <form class="form-inline form-search" method="GET" action="">

        <div class="item">
            <label class="sr-only" for="inputSearch">Search</label>
            <input type="text" class="form-control " id="inputSearch" name="search" placeholder="Title"
                value="{{ request()->get('search') }}">
        </div>

        <div class="item"> <button type="submit" class="btn btn-primary mb-2 mr-2">Search</button>
            <a href="{!! route('news.index') !!}" class="btn btn-info mb-2">Reset</a>
        </div>

    </form>
</div>

<p class="record_count">{{ $news->total() }} Records Found</p>

<div class="card-body p-0">
    <div class="table-responsive" id="news-sortable">
        <table class="table" id="news-table">
            <thead>
                <tr>
                    <th>Sl no.</th>
                    <th class="sortablelink">@sortablelink('title', 'Title')</th>
                    <th class="sortablelink">@sortablelink('created_at', 'Posted Date')</th>
                    <th>Image</th>
                    <th class="sortablelink">@sortablelink('description', 'Description')</th>
                    @if (auth()->guard('admin')->user()->hasPermissionTo('publish-news'))
                        <th>Publish</th>
                    @endif
                    <th style="text-align: center">Action</th>
                </tr>
            </thead>
            <tbody id="tablecontents">
                @foreach ($news as $key => $new)
                    <tr class="row1" data-id="{{ $new->id }}">
                        <td>{{ $news->firstItem() + $key }}</td>
                        <td>{{ $new->title }}</td>
                        <td>{{ formatDate($new->created_at) }}</td>
                        <td><img src="{{ asset('images/news/' . $new->image) }}" height="50" /></td>
                        <td class="no_image"> {!! $new->description !!}</td>
                        @if (auth()->guard('admin')->user()->hasPermissionTo('publish-news'))
                            @include('common.make-publish', [
                                'id' => $new->id,
                                'publish' => $new->publish,
                                'type' => 'new',
                            ])
                        @endif
                        <td style="text-align: center">
                            {!! Form::open([
                                'route' => ['news.destroy', $new->id],
                                'method' => 'delete',
                                'id' => 'news-delete-form' . $new->id,
                            ]) !!}
                            <div class='btn-group'>
                                {{-- @if (auth()->user()->hasPermissionTo('view-news')) --}}
                                <a href="{{ route('news.show', [$new->id]) }}" class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>
                                {{-- @endif --}}

                                @if (auth()->guard('admin')->user()->hasPermissionTo('edit-news'))
                                    <a href="{{ route('news.edit', [$new->id]) }}" class='btn btn-default btn-xs'>
                                        <i class="far fa-edit"></i>
                                    </a>
                                @endif

                                @if (auth()->guard('admin')->user()->hasPermissionTo('delete-news'))
                                    {!! Form::button('<i class="far fa-trash-alt"></i>', [
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-xs',
                                        'onclick' => 'deleteRecord(event, ' . $new->id . ')',
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
                'records' => $news->appends(request()->query()),
            ])
        </div>
    </div>
</div>
@include('common.sweet-alert-before-delete', ['formName' => 'news-delete-form'])



@include('common.sortable', ['url' => 'news-sortable'])
