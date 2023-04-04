<div class="card-body">
    <div align="center" class="form-search">
        <form class="form-inline form-search" method="GET" action="">

                <div class="item">
                    <label class="sr-only" for="inputSearch">Search</label>
                    <input type="text" class="form-control " id="inputSearch" name="search"
                        placeholder="Title, Tagline, Button Name, Button URL" value="{{ request()->get('search') }}">
                </div>

                <div class="item"> <button type="submit" class="btn btn-primary mb-2 mr-2">Search</button>
                    <a href="{!! route('sliders.index') !!}" class="btn btn-info mb-2">Reset</a>
                </div>

        </form>
    </div>

    <p class="record_count">{{ $sliders->total() }} Records Found</p>

    <div class="table-responsive">
        <table class="table" id="sliders-table">
            <thead>
                <tr>
                    <th>Sl no.</th>
                    <th>Image</th>
                    <th class="sortablelink">@sortablelink('title', 'Title')</th>
                    <th class="sortablelink">@sortablelink('tagline', 'Tagline')</th>
                    <th>Button Name</th>
                    <th>Button Url</th>
                    @if(auth()->guard('admin')->user()->hasPermissionTo('publish-home-page-slider'))<th>Publish</th>@endif
                    <th style="text-align:center">Action</th>
                </tr>
            </thead>
            <tbody id="tablecontents">
                @foreach($sliders as $key => $slider)
                <tr class="row1" data-id="{{ $slider->id }}">
                    <td>{{ $sliders->firstItem() + $key }}</td>
                    <td><img src="{{ asset('images/slider/'.$slider->image) }}" height="50" /></td>
                    <td>{{ $slider->title }}</td>
                    <td>{{ $slider->tagline }}</td>
                    <td>{{ $slider->button_name }}</td>
                    <td>{{ $slider->button_url }} </td>
                    @if(auth()->guard('admin')->user()->hasPermissionTo('publish-home-page-slider'))
                        @include('common.make-publish', ['id' => $slider->id, 'publish' => $slider->publish, 'type' => 'slider'])
                    @endif
                    <td style="text-align:center">
                        {!! Form::open(['route' => ['sliders.destroy', $slider->id], 'method' => 'delete', 'id' =>
                        'slider-delete-form'.$slider->id]) !!}
                        <div class='btn-group'>
                            <!-- <a href="{{ route('sliders.show', [$slider->id]) }}" class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a> -->
                            @if(auth()->guard('admin')->user()->hasPermissionTo('edit-home-page-slider'))
                            <a href="{{ route('sliders.edit', [$slider->id]) }}" class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            @endif

                            @if(auth()->guard('admin')->user()->hasPermissionTo('delete-home-page-slider'))
                            {!! Form::button('<span class="material-symbols-outlined">
                                delete
                            </span>', ['type' => 'submit', 'class' => 'btn
                            btn-danger btn-xs', 'onclick' => "deleteRecord(event, ".$slider->id.")"]) !!}
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
            @include('adminlte-templates::common.paginate', ['records' => $sliders->appends(request()->query())])
        </div>
    </div>
</div>

@include('common.sweet-alert-before-delete', ['formName' => 'slider-delete-form'])
@include('common.sortable', ['url' => 'slider-sortable'])