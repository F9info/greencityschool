
    <div align="center" class="form-search">
        <form class="form-inline form-search" method="GET" action="">

                <div class="item">
                    <label class="sr-only" for="inputSearch">Search</label>
                    <input type="text" class="form-control " id="inputSearch" name="search"
                        placeholder="Field Name, Slug" value="{{ request()->get('search') }}">
                </div>
                <div class="item">
                    <label class="sr-only" for="inputInputType">Select Input Type</label>
                    <select class="form-control mb-2 mr-sm-2  select2" id="inputInputType" name="input_type">
                        <option value="">Select Input Type</option>
                        <option value="textbox" {{ request()->get('input_type') == 'textbox' ? 'selected' : '' }}>
                            textbox
                        </option>
                        <option value="textarea" {{ request()->get('input_type') == 'textarea' ? 'selected' : '' }}>
                            textarea
                        </option>
                        <option value="file" {{ request()->get('input_type') == 'file' ? 'selected' : '' }}>file
                        </option>
                        <option value="heading" {{ request()->get('input_type') == 'heading' ? 'selected' : '' }}>
                            heading
                        </option>
                    </select>
                </div>
                <div class="item">
                    <label class="sr-only" for="inputType">Select Type</label>
                    <select class="form-control mb-2 mr-sm-2  select2" id="inputType" name="type">
                        <option value="">Select Type</option>
                        <option value="application-settings" {{ request()->get('type') == 'application-settings' ? 'selected' : '' }}>
                            Application Settings
                        </option>
                        <option value="developer-settings" {{ request()->get('type') == 'developer-settings' ? 'selected' : '' }}>
                            Developer Settings
                        </option>
                        <option value="home-page-blocks" {{ request()->get('type') == 'home-page-blocks' ? 'selected' : '' }}>
                            Home Page Blocks
                        </option>
                        <option value="general-settings" {{ request()->get('type') == 'general-settings' ? 'selected' : '' }}>
                            General Settings
                        </option>
                    </select>
                </div>
                <div class="item">
                    <label class="sr-only" for="inputCategory">Select Category</label>
                    <select class="form-control mb-2 mr-sm-2 select2" id="inputCategory" name="category">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ request()->get('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="item"> <button type="submit" class="btn btn-primary mb-2 mr-2">Search</button>
                    <a href="{!! route('applicationSettings.index') !!}" class="btn btn-info mb-2">Reset</a>
                </div>

        </form>
    </div>

    <p class="record_count">{{ $applicationSettings->total() }} Records Found</p>

    <div class="table-responsive copyTextTable" id="application-settings-sortable">
        <table class="table" id="application-settings-table">
            <thead>
                <tr>
                    <th>Sl.no</th>
                    <th>Field Name</th>
                    <th>Slug</th>
                    <th>Input Type</th>
                    <th>Category</th>
                    <th style="text-align:center">Action</th>
                </tr>
            </thead>
            <tbody id="tablecontents">
                @foreach($applicationSettings as $key => $applicationSetting)
                <tr class="row1" data-id="{{ $applicationSetting->id }}">
                    <td>{{ $applicationSettings->firstItem() + $key }}</td>
                    <td>{{ $applicationSetting->field_name }} </td>
                    <td class="slugTd"><span data-type="slug">{{ $applicationSetting->slug }}</span> <button
                            data-type="copy">Click to Copy</button></td>
                    <td>{{ $applicationSetting->input_type }}</td>
                    <td>{{ $applicationSetting->category_id != '' ? $applicationSetting->category->name : '' }}</td>
                    <td style="text-align:center">
                        {!! Form::open(['route' => ['applicationSettings.destroy', $applicationSetting->id], 'method' =>
                        'delete', 'id' => 'application-setting-delete-form'.$applicationSetting->id]) !!}
                        <div class='btn-group'>
                            <a href="{{ route('applicationSettings.show', [$applicationSetting->id]) }}"
                                class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            @if(auth()->guard('admin')->user()->hasPermissionTo('edit-developer-settings-list'))
                            <a href="{{ route('applicationSettings.edit', [$applicationSetting->id]) }}"
                                class='btn btn-default btn-xs'>
                                <span class="material-symbols-outlined">
                                    edit
                                </span>
                            </a>
                            @endif

                            @if(auth()->guard('admin')->user()->hasPermissionTo('delete-developer-settings-list'))
                            {!! Form::button('<span class="material-symbols-outlined">
                                delete
                            </span>', ['type' => 'submit', 'class' => 'btn
                            btn-danger btn-xs', 'onclick' => "deleteRecord(event, ".$applicationSetting->id.")"]) !!}
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
            @include('adminlte-templates::common.paginate', ['records' =>
            $applicationSettings->appends(request()->query())])
        </div>
    </div>
</div>

@include('common.sweet-alert-before-delete', ['formName' => 'application-setting-delete-form'])
@include('common.sortable', ['url' => 'application-settings-sortable'])
