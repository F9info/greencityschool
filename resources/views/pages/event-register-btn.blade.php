@if ($event->registration_enabled)
    @if ($event->members_only && Auth::guest())
        <p class="reg_na red">
            <span class="material-symbols-outlined">
                Cancel
            </span>

            Registrations for members only, Login to register.
        </p>
    @else
        @if ($event->reg_start_date <= date('Y-m-d h:i:s') && $event->reg_end_date >= date('Y-m-d h:i:s'))
            @if (checkUserEventRegistration($event->id))
                <a href="{{ url('/event-registration/' . $event->slug) }}" class="btn btn-primary fleft" id="register"
                    tabindex="0"><span>Register</span></a>
            @else
                <p class="reg_na reg_yes green">
                    <span class="material-symbols-outlined">
                        check_circle
                    </span>

                    You have already registered for this event
                </p>
            @endif
        @elseif($event->reg_end_date < date('Y-m-d h:i:s'))
            <p class="reg_na red"> <span class="material-symbols-outlined">
                    Cancel
                </span> Registration closed</p>
        @elseif($event->reg_start_date > date('Y-m-d h:i:s'))
            <p class="reg_na green"> Registrations start on
                {{ Carbon\Carbon::parse($event->reg_start_date)->diffForHumans() }}</p>
        @endif
    @endif
@else
    <p class="reg_na red"><span class="material-symbols-outlined">
            info
        </span>
        Registrations not yet started</p>
@endif
