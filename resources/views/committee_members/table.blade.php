<div class="card-body p-0">
<div align="center" class="form-search">
        <form class="form-inline form-search" method="GET" action="">

                <div class="item">
                    <label class="sr-only" for="inputSearch">Search</label>
                    <input type="text" class="form-control " id="inputSearch" name="search"
                        placeholder="Name, Email, Phone, Gender" value="{{ request()->get('search') }}">
                </div>
                <div class="item">
                    <label class="sr-only" for="inputCommitteeCategory">Select Committee Category</label>
                    <select class="form-control mb-2 mr-sm-2 select2" id="inputCommitteeCategory" name="committee_category">
                        <option value="">Select Committee Category</option>
                        @foreach($committeeCategories as $committeeCategory)
                        <option value="{{ $committeeCategory->id }}"
                            {{ request()->get('committee_category') == $committeeCategory->id ? 'selected' : '' }}>
                            {{ $committeeCategory->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="item"> <button type="submit" class="btn btn-primary mb-2 mr-2">Search</button>
                    <a href="{!! route('committeeMembers.index') !!}" class="btn btn-info mb-2">Reset</a>
                </div>

        </form>
    </div>

    <p class="record_count">{{ $committeeMembers->total() }} Records Found</p>
    <div class="table-responsive" id="committeeMembers-sortable">
        <table class="table" id="committee-members-table">
            <thead>
            <tr>
                <th>Sl no.</th>
                <th>Member Photo</th>
                <th class="sortablelink">@sortablelink('committee_members.name', 'Name')</th>
                <th>Category</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Member Type</th>
                <th class="sortablelink">@sortablelink('committee_members.created_at', 'Created At')</th>
                <th style="text-align:center">Action</th>
            </tr>
            </thead>
            <tbody>
            <tbody id="tablecontents">
            @foreach($committeeMembers as $key => $committeeMember)
                <tr class="row1" data-id="{{ $committeeMember->id }}">
                    <td>{{ $committeeMembers->firstItem() + $key }}</td>
                    <td><img src="{{ asset('images/committee-members/'.$committeeMember->member_photo) }}" height="50" /></td>
                    <td>{{ $committeeMember->name }}</td>
                    <td>
                        @foreach (committeeMemberActiveList($committeeMember->id) as $activeList)
                            {{ $activeList->committeeCategory->name }}<br>
                        @endforeach
                    </td>
                    <td>{{ $committeeMember->email }}</td>
                    <td>{{ $committeeMember->phone }}</td>
                    <td>{{ $committeeMember->gender }}</td>
                    <td>{{ $committeeMember->member_type }}</td>
                    <td>{{ formatDate($committeeMember->created_at) }}</td>
                    <td  style="text-align:center">
                        {!! Form::open(['route' => ['committeeMembers.destroy', $committeeMember->id], 'method' => 'delete', 'id' => 'committeeMember-delete-form'.$committeeMember->id]) !!}
                        <div class='btn-group'>
                        {{-- @if(auth()->user()->hasPermissionTo('view-products')) --}}
                            {{-- <a href="{{ route('committeeMembers.show', [$committeeMember->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a> --}}
                            {{-- @endif --}}

                            @if(auth()->guard('admin')->user()->hasPermissionTo('edit-committee-members'))
                            <a href="{{ route('committeeMembers.edit', [$committeeMember->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            @endif

                            @if(auth()->guard('admin')->user()->hasPermissionTo('delete-committee-members'))
                            {!! Form::button('<span class="material-symbols-outlined">delete</span>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "deleteRecord(event, ".$committeeMember->id.")"]) !!}
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
            @include('adminlte-templates::common.paginate', ['records' => $committeeMembers->appends(request()->query())])
        </div>
    </div>
</div>
@include('common.sweet-alert-before-delete', ['formName' => 'committeeMember-delete-form'])
@include('common.sortable', ['url' => 'committeeMembers-sortable'])
