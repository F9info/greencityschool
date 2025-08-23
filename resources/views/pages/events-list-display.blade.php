<div class="col-md-4 event_block event_lists event_list_page">
    <div class="card events_lists">
        <div class="inner-block">
            <figure>
                <a href="{{ url('event/' . $event->slug) }}"><img alt=""
                        src="{{ URL::asset('images/events/' . $event->image) }}"></a>
 
                <span class="cat no-need-remove">{{ $event->eventCategory->name }}</span>
            </figure>
            <div class="description-events">
                <h2><a href="{{ url('event/' . $event->slug) }}">{{ $event->event_name }}</a></h2>
                <div class="disc">
                    {!! \Illuminate\Support\Str::limit(strip_tags($event->event_description), $limit = 300, $end = '...') !!}
                </div>
                <div class="date_event no-need-remove">
                    <span class="material-symbols-outlined">
                        event
                    </span>
                    {{ date('D d M Y', strtotime($event->start_date)) . ' to ' . date('D d M Y', strtotime($event->end_date)) }}
                </div>
                <div class="buttons">
                    <div class="no-need-remove">
                    @include('pages.event-register-btn', ['event', $event])
                    </div>
                    <a href="{{ url('event/' . $event->slug) }}" class="readmore" tabindex="0">Read More</a>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
</div>
