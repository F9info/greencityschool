<div class="card-body">
    <div align="center" class="form-search">
        <form class="form-inline form-search" method="GET" action="">
            <div class="item">
                <label class="sr-only" for="inputSearch">Search</label>
                <input type="text" class="form-control " id="inputSearch" name="search"
                    placeholder="Heading, Subject" value="{{ request()->get('search') }}">
            </div>

            <div class="item"> <button type="submit" class="btn btn-primary mb-2 mr-2">Search</button>
                <a href="{!! route('mailTemplates.index') !!}" class="btn btn-info mb-2">Reset</a>
            </div>
        </form>
    </div>

    <p class="record_count">{{ $mailTemplates->total() }} Records Found</p>

    <div class="table-responsive">
        <table class="table" id="mail-templates-table">
            <thead>
                <tr>
                    <th>Sl no.</th>
                    <th>Heading</th>
                    <th>Subject</th>
                    <th>Mail Type</th>
                    {{-- <th>Description</th> --}}
                    <th>View</th>
                    @if(auth()->guard('admin')->user()->hasPermissionTo('publish-mail-templates'))<th>Publish</th>@endif
                    <th style="text-align:center">Action</th>
                </tr>
            </thead>
            <tbody id="tablecontents">
                @foreach ($mailTemplates as $key => $mailTemplate)
                    <tr class="row1" data-id="{{ $mailTemplate->id }}">
                        <td>{{ $mailTemplates->firstItem() + $key }}</td>
                        <td>{{ $mailTemplate->heading }}</td>
                        <td>{{ $mailTemplate->subject }}</td>
                        <td>{{ $mailTemplate->mail_type }}</td>
                        {{-- <td>{{ $mailTemplate->description }}</td> --}}
                        <td>



                            <a href="{{ route('mailTemplates.show', [$mailTemplate->id]) }}"
                                class='btn btn-default btn-xs ajax-popup-link'>
                                <i class="far fa-eye"></i>
                            </a>





                        </td>
                        @if(auth()->guard('admin')->user()->hasPermissionTo('publish-mail-templates'))
                            @include('common.make-publish', [
                                'id' => $mailTemplate->id,
                                'publish' => $mailTemplate->publish,
                                'type' => 'mailTemplate',
                            ])
                        @endif
                        <td style="text-align:center">
                            {!! Form::open([
                                'route' => ['mailTemplates.destroy', $mailTemplate->id],
                                'method' => 'delete',
                                'id' => 'mailTemplate-delete-form' . $mailTemplate->id,
                            ]) !!}
                            <div class='btn-group'>

                                @if(auth()->guard('admin')->user()->hasPermissionTo('edit-mail-templates'))
                                <a href="{{ route('mailTemplates.edit', [$mailTemplate->id]) }}"
                                    class='btn btn-default btn-xs'>
                                    <i class="far fa-edit"></i>
                                </a>
                                @endif

                                @if(auth()->guard('admin')->user()->hasPermissionTo('delete-mail-templates'))
                                {!! Form::button('<i class="far fa-trash-alt"></i>', [
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'onclick' => 'deleteRecord(event, ' . $mailTemplate->id . ')',
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
                'records' => $mailTemplates->appends(request()->query()),
            ])
        </div>
    </div>
</div>
@include('common.sweet-alert-before-delete', ['formName' => 'mailTemplate-delete-form'])
