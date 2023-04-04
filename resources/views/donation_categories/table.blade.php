    <div align="center" class="form-search">
        <form class="form-inline form-search" method="GET" action="">
            <div class="item">
                <label class="sr-only" for="inputSearch">Search</label>
                <input type="text" class="form-control " id="inputSearch" name="search" placeholder="Donation Cause"
                    value="{{ request()->get('search') }}">
            </div>

            <div class="item"> <button type="submit" class="btn btn-primary mb-2 mr-2">Search</button>
                <a href="{!! route('donationCategories.index') !!}" class="btn btn-info mb-2">Reset</a>
            </div>

        </form>
    </div>

    <p class="record_count">{{ $donationCategories->total() }} Records Found</p>


    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table" id="donation-categories-table">
                <thead>
                    <tr>
                        <th>Sl no.</th>
                        <th class="sortablelink">@sortablelink('donation_cause', 'Donation Cause')</th>
                        @if(auth()->guard('admin')->user()->hasPermissionTo('publish-donation-categories'))<th>Publish</th>@endif
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="tablecontents">
                    @foreach ($donationCategories as $key => $donationCategory)
                        <tr>
                            <td>{{ $donationCategories->firstItem() + $key }}</td>
                            <td>{{ $donationCategory->donation_cause }}</td>
                            @if(auth()->guard('admin')->user()->hasPermissionTo('publish-donation-categories'))
                                @include('common.make-publish', [
                                    'id' => $donationCategory->id,
                                    'publish' => $donationCategory->publish,
                                    'type' => 'donationCategory',
                                ])
                            @endif
                            <td>
                                {!! Form::open([
                                    'route' => ['donationCategories.destroy', $donationCategory->id],
                                    'method' => 'delete',
                                    'id' => 'donationCategory-delete-form' . $donationCategory->id,
                                ]) !!}
                                <div class='btn-group'>
                                    {{-- @if (auth()->user()->hasPermissionTo('view-donationCategories')) --}}
                                    <a href="{{ route('donationCategories.show', [$donationCategory->id]) }}"
                                        class='btn btn-default btn-xs'>
                                        <i class="far fa-eye"></i>
                                    </a>
                                    {{-- @endif --}}

                                    @if(auth()->guard('admin')->user()->hasPermissionTo('edit-donation-categories'))
                                    <a href="{{ route('donationCategories.edit', [$donationCategory->id]) }}"
                                        class='btn btn-default btn-xs ajax-popup-link'>
                                        <i class="far fa-edit"></i>
                                    </a>
                                    @endif

                                    @if(auth()->guard('admin')->user()->hasPermissionTo('delete-donation-categories'))
                                    {!! Form::button('<i class="far fa-trash-alt"></i>', [
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-xs',
                                        'onclick' => 'deleteRecord(event, ' . $donationCategory->id . ')',
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
                    'records' => $donationCategories->appends(request()->query()),
                ])
            </div>
        </div>
    </div>
    @include('common.sweet-alert-before-delete', ['formName' => 'donationCategory-delete-form'])
