<div class="card-body p-0">
    <div align="center" class="form-search">
        <form class="form-inline form-search" method="GET" action="">
            <input type="hidden" name="type" value={{ request()->get('type') }} />
            <div class="item">
                <label class="sr-only" for="inputSearch">Search</label>
                <input type="text" class="form-control " id="inputSearch" name="search" placeholder="Event Name"
                    value="{{ request()->get('search') }}">
            </div>
            <div class="item">
                <label class="sr-only" for="inputCategory">Select Event Category</label>
                {!! Form::select('event_category_id', $eventCategories, request()->get('event_category_id'), [
                    'class' => 'form-control select2',
                    'placeholder' => 'Select Event Category',
                ]) !!}
            </div>

            <div class="item"> <button type="submit" class="btn btn-primary mb-2 mr-2">Search</button>
                <a href="{!! route('events.index', ['type' => request()->get('type')]) !!}" class="btn btn-info mb-2">Reset</a>
            </div>
        </form>
    </div>

    <p class="record_count">{{ $events->total() }} Records Found</p>

    <div class="table-responsive">
        <table class="table" id="events-table">
            <thead>
                <tr>
                    <th>Sl no.</th>
                    <th class="sortablelink">@sortablelink('event_name', 'Event Name')</th>
                    <th class="sortablelink">@sortablelink('eventCategory.name', 'Event Category')</th>
                    <th class="sortablelink">@sortablelink('start_date', 'Start Date')</th>
                    <th class="sortablelink">@sortablelink('end_date', 'End Date')</th>
                    <th>Registrations</th>
                    <th>View Event</th>
                    @if (auth()->guard('admin')->user()->hasPermissionTo('publish-events'))
                        <th>Publish</th>
                    @endif
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id='tablecontents'>
                @foreach ($events as $key => $event)
                    <tr>
                        <td>{{ $events->firstItem() + $key }}</td>
                        <td>
                            {{ $event->event_name }}
                        </td>
                        <td>
                            {{ $event->eventCategory->name }}
                        </td>
                        <td>
                            {{ formatDateTime($event->start_date) }}
                        </td>
                        <td>
                            {{ formatDateTime($event->end_date) }}
                        </td>
                        <td>
                            @if ($event->eventRegistrations->count() > 0)
                                <a href="{{ route('eventRegistrations.index', ['event' => $event->id]) }}"
                                    class="btn btn-primary btn-xs">{{ $event->eventRegistrations->count() }}
                                    Registrations</a>
                            @else
                                No Registrations Found
                            @endif
                        </td>
                        <td><a href="{{ url('event/' . $event->slug) }}" target="_blank"
                                class="btn btn-warning btn-xs">View Event</a></td>
                        @if (auth()->guard('admin')->user()->hasPermissionTo('publish-events'))
                            @include('common.make-publish', [
                                'id' => $event->id,
                                'publish' => $event->publish,
                                'type' => 'event',
                            ])
                        @endif
                        <td style="width: 120px">
                            {!! Form::open([
                                'route' => ['events.destroy', $event->id],
                                'method' => 'delete',
                                'id' => 'event-delete-form' . $event->id,
                            ]) !!}
                            <div class='btn-group'>
                                <a href="{{ route('events.show', [$event->id]) }}" class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>
                                {{-- @endif --}}

                                @if (auth()->guard('admin')->user()->hasPermissionTo('edit-events'))
                                    <a href="{{ route('events.edit', [$event->id]) }}" class='btn btn-default btn-xs'>
                                        <i class="far fa-edit"></i>
                                    </a>
                                @endif

                                @if (auth()->guard('admin')->user()->hasPermissionTo('delete-events'))
                                    {!! Form::button('<i class="far fa-trash-alt"></i>', [
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-xs',
                                        'onclick' => 'deleteRecord(event, ' . $event->id . ')',
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
                'records' => $events->appends(request()->query()),
            ])
        </div>
    </div>
</div>
@include('common.sweet-alert-before-delete', ['formName' => 'event-delete-form'])
