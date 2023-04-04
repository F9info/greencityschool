<div class="row form_field_outer_row">
    <div class="form-group col attend_event">
        {!! Form::checkbox('attend_event[]', null, ['checked']) !!}
        <input type="hidden" name="attend_event_status[]" />
    </div>
    <div class="form-group col disbaled_input">
        {!! Form::text('attendee_name[]', $attendeeName, [
            'class' => 'form-control',
            'readonly',
        ]) !!}
        {{-- {!! Form::label('attendee_name', 'Name') !!} --}}
    </div>
    <div class="form-group col">
        <p>{{ $category }}</p>
        <input type="hidden" name="category[]" value="{{ $category }}" />
    </div>

    @if ($event->additional_fields['field_1'] != null)
        @if ($event->additional_fields['field_1']['field_type'] != null)
            <div class="form-group" id="{{ $id1 }}" style="padding: 0px !important">
                <script type="text/javascript">
                    document.getElementById("{{ $id1 }}").innerHTML = getAdditionFieldDetails(1);
                </script>
            </div>
        @endif
    @endif


    @if ($event->additional_fields['field_2'] != null)
        @if ($event->additional_fields['field_2']['field_type'] != null)
            <div class="form-group" id="{{ $id2 }}" style="padding: 0px !important">
                <script type="text/javascript">
                    document.getElementById("{{ $id2 }}").innerHTML = getAdditionFieldDetails(2);
                </script>
            </div>
        @endif
    @endif


    <div class="form-group col">
        <button class="btn btn-danger disabled">
            <span class="material-symbols-outlined">Delete</span>
        </button>
    </div>
    <div class="form-group col">
        {!! Form::text('price[]', $price, [
            'class' => 'form-control',
            'readonly',
        ]) !!}
        {{-- {!! Form::label('price', 'Price') !!} --}}
    </div>
</div>
