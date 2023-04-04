<div class="card-body">
    <div align="center" class="form-search">
        <form class="form-inline form-search" method="GET" action="">

                <div class="item">
                    <label class="sr-only" for="inputSearch">Search</label>
                    <input type="text" class="form-control " id="inputSearch" name="search"
                        placeholder="Name, Email, Mobile, Address" value="{{ request()->get('search') }}">
                </div>

                <div class="item">
                    <label class="sr-only" for="inputRole">Select Role</label>
                    <select class="form-control mb-2 mr-sm-2 select2" id="inputRole" name="role">
                        <option value="">Select Role</option>
                        @foreach ($roles as $role)
                            <option {{ request()->get('role') == $role->name ? 'selected' : '' }}>{{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="item"> <button type="submit" class="btn btn-primary mb-2 mr-2">Search</button>
                    <a href="{!! route('users.index') !!}" class="btn btn-info mb-2">Reset</a>
                </div>

        </form>
    </div>
    
    @php($count = 0)
    @foreach ($users as $key => $user)
        @php($role = getUserRole($user->id))
        @if (request()->get('role') == '' || (request()->get('role') != '' && request()->get('role') == $role))
            @php($count++)
        @endif
    @endforeach
    <p class="record_count">{{ $count }} Records Found</p>

    <div class="table-responsive">
        <table class="table" id="users-table">
            <thead>
                <tr>
                    <th>Sl no.</th>
                    <th class="sortablelink">@sortablelink('name', 'Name')</th>
                    <th class="sortablelink">@sortablelink('email', 'Email')</th>
                    <th>Mobile</th>
                    <th class="sortablelink">@sortablelink('designation', 'Designation')</th>
                    <th>Role</th>
                    <th>Address</th>
                    <th>Reset Password</th>
                    @if (auth()->guard('admin')->user()->hasPermissionTo('publish-admin-management'))
                        <th>Status</th>
                    @endif
                    <th style="text-align:center">Action</th>
                </tr>
            </thead>
            <tbody>
                @php($i = 1)
                @foreach ($users as $key => $user)
                    @php($role = getUserRole($user->id))
                    @if (request()->get('role') == '' || (request()->get('role') != '' && request()->get('role') == $role))
                        @if (auth()->guard('admin')->user()->roles->first()->name == 'Developer Admin' ||
                                (auth()->guard('admin')->user()->roles->first()->name != 'Developer Admin' &&
                                    getUserRole($user->id) != 'Developer Admin'))
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{!! $user->name !!}</td>
                                <td>{!! $user->email !!}</td>
                                <td>{!! $user->mobile !!}</td>
                                <td>{!! $user->designation !!}</td>
                                <td>{!! getUserRole($user->id) !!}</td>
                                <td>{!! $user->address !!}</td>
                                <td><a href="{{ url('users/reset/' . $user->id) }}" class="btn btn-primary btn-xs ">Reset
                                        Password</a></td>
                                @if (auth()->guard('admin')->user()->hasPermissionTo('publish-admin-management'))
                                    @if (Auth::guard('admin')->user()->id != $user->id)
                                        @include('common.make-publish', [
                                            'id' => $user->id,
                                            'publish' => $user->publish,
                                            'type' => 'admin',
                                        ])
                                    @else
                                        <td></td>
                                    @endif
                                @endif
                                <td style="text-align: center">
                                    {!! Form::open([
                                        'route' => ['users.destroy', $user->id],
                                        'method' => 'delete',
                                        'id' => 'user-delete-form' . $user->id,
                                    ]) !!}
                                    <div class='btn-group'>
                                        <a href="{!! route('users.show', [$user->id]) !!}" class='btn btn-default btn-xs'>
                                            <span class="material-symbols-outlined">visibility</span>
                                        </a>
                                        @if (auth()->guard('admin')->user()->hasPermissionTo('edit-admin-management'))
                                            <a href="{!! route('users.edit', [$user->id]) !!}" class='btn btn-default btn-xs'>
                                                <span class="material-symbols-outlined">edit</span>
                                            </a>
                                        @endif

                                        @if (auth()->guard('admin')->user()->hasPermissionTo('delete-admin-management'))
                                            @if (Auth::guard('admin')->user()->id != $user->id)
                                                {!! Form::button('<i class="fa fa-trash"></i>', [
                                                    'type' => 'submit',
                                                    'class' => 'btn btn-danger btn-xs',
                                                    'onclick' => 'deleteRecord(event, ' . $user->id . ')',
                                                ]) !!}
                                            @endif
                                        @endif
                                    </div>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endif
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('common.sweet-alert-before-delete', ['formName' => 'user-delete-form'])
