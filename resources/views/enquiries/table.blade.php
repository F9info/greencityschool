
    <div align="center" class="form-search">
        <form class="form-inline form-search" method="GET" action="">

                <div class="item">
                    <label class="sr-only" for="inputSearch">Search</label>
                    <input type="text" class="form-control " id="inputSearch" name="search"
                        placeholder="Name, Email, Phone, Subject, Message" value="{{ request()->get('search') }}">
                </div>

                <div class="item"> <button type="submit" class="btn btn-primary mb-2 mr-2">Search</button>
                    <a href="{!! route('enquiries.index') !!}" class="btn btn-info mb-2">Reset</a>
                </div>

        </form>
    </div>

    <p class="record_count">{{ $enquiries->total() }} Records Found</p>

<div class="card-body p-0">
    <div class="table-responsive" id="slider-sortable">
        <table class="table" id="enquiries-table">
            <thead>
            <tr>
                <th>Sl no.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Enquiry Date</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($enquiries as $key => $enquiry)
                <tr>
                    <td>{{ $enquiries->firstItem() + $key }}</td>
                    <td>{{ $enquiry->name }}</td>
                    <td>{{ $enquiry->email }}</td>
                    <td>{{ $enquiry->phone }}</td>
                    <td>{{ $enquiry->subject }}</td>
                    <td>{{ $enquiry->message }}</td>
                    <td>{{ formatDate($enquiry->created_at) }}</td>
                    <td>
                        {!! Form::open(['route' => ['enquiries.destroy', $enquiry->id], 'method' => 'delete', 'id' => 'enquiry-delete-form'.$enquiry->id]) !!}
                        <div class='btn-group'>
                            <a href="{{ route('enquiries.show', [$enquiry->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            {{-- @if(auth()->user()->hasPermissionTo('edit-enquiries')) --}}
                            <a href="{{ route('enquiries.edit', [$enquiry->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {{-- @endif --}}

                            {{-- @if(auth()->user()->hasPermissionTo('delete-enquiries')) --}}
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "deleteRecord(event, ".$enquiry->id.")"]) !!}
                            {{-- @endif --}}
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
            @include('adminlte-templates::common.paginate', ['records' => $enquiries->appends(request()->query())])
        </div>
    </div>
</div>
@include('common.sweet-alert-before-delete', ['formName' => 'enquiry-delete-form'])
