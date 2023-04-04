<script type="text/javascript">
    function getAdditionFieldDetails(index) {
        var field = index == 1 ?
            "{{ isset($event->additional_fields['field_1']) ? $event->additional_fields['field_1']['field_name'] : '' }}" :
            "{{ isset($event->additional_fields['field_2']) ? $event->additional_fields['field_2']['field_name'] : '' }}";
        if (field != '') {
            var field_type = index == 1 ?
                "{{ isset($event->additional_fields['field_1']) ? $event->additional_fields['field_1']['field_type'] : '' }}" :
                "{{ isset($event->additional_fields['field_2']) ? $event->additional_fields['field_2']['field_type'] : '' }}";
            var field_options = index == 1 ?
                "{{ isset($event->additional_fields['field_1']) ? $event->additional_fields['field_1']['field_options'] : '' }}" :
                "{{ isset($event->additional_fields['field_2']) ? $event->additional_fields['field_2']['field_options'] : '' }}";
            var additional_field;
            if (field_type == "textbox") {
                additional_field = `<div class="form-group col">{!! Form::text('additional_field1[]', null, [
                    'class' => 'form-control',
                ]) !!}
                        {!! Form::label('additional_field1', '${field}') !!}</div>`;
            }
            if (field_type == "textarea") {
                additional_field = `<div class="form-group col">{!! Form::textarea('additional_field1[]', null, [
                    'class' => 'form-control',
                ]) !!}
                        {!! Form::label('additional_field1', '${field}') !!}</div>`;
            }
            if (field_type == "select") {
                var field_options_data = field_options.split(',');
                var html_str = "";
                for (var i = 0; i < field_options_data.length; i++) {
                    html_str += '<option value="' + field_options_data[i] + '">' + field_options_data[i] + '</option>';
                }
                additional_field = `<div class="form-group select_area col"><select name="additional_field1[]" class="form-control">
                            <option value="">Select</option>
                            ${html_str}
                        </select>
                        {!! Form::label('additional_field1', '${field}') !!}</div>`;
            }
        } else {
            var additional_field = '';
        }
        return additional_field;
    }
</script>


<!-- Card title -->
<div class="col-sm-12 row form_heading">
    <div class="col-md-6">
        <h2>
            <span class="material-symbols-outlined">
                family_restroom
            </span>
            Guest / Guest Child
        </h2>
    </div>
    <div class="col-md-6 text-right">
        <p>(Add or remove)</p>
    </div>
</div>
<!-- Card title end -->


<div class="card  guest_child_details mobile-table-responsive">
    <div class="card-body ">
        <div id="dynamic_form">
            <div class="dynamic_form_content">
                <div class="form-group col add_del_btn_outer row  table-title-header">

                    <div class="col-md-4">Enter the Guest & Child details</div>

                    <div class="col-md-8 text-right">
                        @if ($event->is_guest_adult)
                            <a href="javascript:void(0)" class="btn btn-primary add_new_frm_field_btn fright mobile-hide"
                                id="guest">
                                <span class="material-symbols-outlined">add</span>
                                Add Guest
                                <em class="mobile-show">Add <span class="material-symbols-outlined">person</span></em>
                            </a>
                        @endif

                        @if ($event->is_guest_child)
                            <a href="javascript:void(0)" class="btn btn-primary add_new_frm_field_btn fright mobile-hide"
                                id="guest_child">
                                <span class="material-symbols-outlined">add</span>
                                Add Guest Child
                                <em class="mobile-show">Add <span class="material-symbols-outlined">
                                    supervisor_account
                                    </span></em>
                            </a>
                        @endif
                        <div class="clear"></div>
                    </div>
                </div>



                <div class=" table_form_row ">
                    <div class=" form_field_outer form_sec_outer_task">


                        <div class="row form_field_outer_row header-row">
                            <div class="form-group col ">
                                <span class="material-symbols-outlined">
                                    help
                                </span>
                            </div>
                            <div class="form-group col ">
                                Name
                            </div>
                            <div class="form-group col">
                                Register Category

                            </div>

                            @if ($event->additional_fields['field_1'] != null)
                                @if ($event->additional_fields['field_1']['field_type'] != null)
                                    <div class="form-group col">
                                        {{ $event->additional_fields['field_1']['field_name'] }}
                                    </div>
                                @endif
                            @endif


                            @if ($event->additional_fields['field_2'] != null)
                                @if ($event->additional_fields['field_2']['field_type'] != null)
                                    <div class="form-group col">
                                        {{ $event->additional_fields['field_2']['field_name'] }}
                                    </div>
                                @endif
                            @endif



                            <div class="form-group col">
                                Action
                            </div>
                            <div class="form-group col ">
                                Price ($)
                            </div>
                        </div>

                        @isset($personal_details)
                            @include('event_form_common.registrar', [
                                'attendeeName' =>
                                    $personal_details->user->first_name . ' ' . $personal_details->user->last_name,
                                'category' => 'Member',
                                'price' => userExpiryStatus(Auth::user()->expiry_date)
                                    ? $event->adult_amount
                                    : $event->guest_adult_amount,
                                'id1' => 'member1',
                                'id2' => 'member2',
                            ])
                            @if ($personal_details->spouse_first_name != '' && $personal_details->spouse_last_name != '')
                                @include('event_form_common.registrar', [
                                    'attendeeName' =>
                                        $personal_details->spouse_first_name .
                                        ' ' .
                                        $personal_details->spouse_last_name,
                                    'category' => 'Spouse',
                                    'price' => userExpiryStatus(Auth::user()->expiry_date)
                                        ? $event->adult_amount
                                        : $event->guest_adult_amount,
                                    'id1' => 'spouse1',
                                    'id2' => 'spouse2',
                                ])
                            @endif
                        @endisset
                        @isset($child_details)
                            @php($i = 1)
                            @foreach ($child_details as $child_detail)
                                @include('event_form_common.registrar', [
                                    'attendeeName' => $child_detail->child_name,
                                    'category' => 'Child',
                                    'price' => userExpiryStatus(Auth::user()->expiry_date)
                                        ? $event->child_amount
                                        : $event->guest_child_amount,
                                    'id1' => 'child1_' . $i,
                                    'id2' => 'child2_' . $i,
                                ])
                                @php($i++)
                            @endforeach
                        @endisset
                    </div>
                </div>
            </div>

            <input type="hidden" name="original_amount" class="original_amount" value="" required />
            <input type="hidden" name="amount" class="amount" value="" required />
            <div class="grand-total" id="grand-total"></div>
        </div>
    </div>

</div>



@push('page_scripts')
    <script>
        function calculateAmount() {
            var amount = 0;
            var i = 0;
            var attend_event_status = $('input[name="attend_event_status[]"]');
            var price_input = $('input[name="price[]"]');
            $('input[name="attend_event[]"]').each(function() {
                if (this.checked) {
                    attend_event_status[i].value = 1;
                    var price = price_input[i].value;
                    amount += parseInt(price);
                } else {
                    attend_event_status[i].value = 0;
                }
                if (amount == 0) {
                    $('input[name=payment_method]').prop('checked', false);
                    $('input[name=payment_method]').prop('required', false);
                    $('.paymentMethods ').hide();
                } else {
                    $('input[name=payment_method]').prop('required', true);
                    $('.paymentMethods ').show();
                }
                i++;
            });
            document.getElementById("grand-total").innerHTML = "<h3><span>Grand Total :</span> $" + amount + "</h3>";
            $('input.original_amount').val(amount);
            $('input.amount').val(amount);
            $('input.cheque_amount').val(amount);
        }
        calculateAmount();

        function updateLength(index) {
            if (index >= 20) {
                $('.add_new_frm_field_btn').addClass('disabled').prop("disabled", true);
            } else {
                $('.add_new_frm_field_btn').removeClass('disabled').prop("disabled", false);
            }
            return index;
        }

        $(document).ready(function() {
            $(document).on("click", '.attend_event input[type="checkbox"]', function() {
                calculateAmount();
                setFinalAmount();
            });
        });

        function addChild(index, type) {
            var category = type == 'guest_child' ? 'Guest Child' : 'Guest';
            var price = type == 'guest_child' ? '{{ $event->guest_child_amount }}' : '{{ $event->guest_adult_amount }}';

            $(".form_field_outer").append(`
            <div class="row form_field_outer_row child_row${index}">
                <div class="form-group col attend_event"> <span class="mobile-show">Select</span>
                    {!! Form::checkbox('attend_event[]', null, ['checked']) !!}
                    <input type="hidden" name="attend_event_status[]" />
                </div>
                <div class="form-group col">
                    <span class="mobile-show">Name</span>
                    {!! Form::text('attendee_name[]', '`+category+`', [
                        'class' => 'form-control',
                    ]) !!}

                </div>
                <div class="form-group col">
                    <span class="mobile-show">Register Category</span>
                    <p>${category}</p>
                    <input type="hidden" name="category[]" value="${category}" />
                </div>
                ${getAdditionFieldDetails(1)}
                ${getAdditionFieldDetails(2)}
                <div class="form-group col add_del_btn_outer">
                    <span class="mobile-show">Action</span>
                    <button class="btn btn-danger remove_node_btn_frm_field">
                        <span class="material-symbols-outlined">delete</span>

                    </button>
                </div>
                <div class="form-group col">
                    <span class="mobile-show">Price ($)</span>
                    {!! Form::text('price[]', '`+price+`', [
                        'class' => 'form-control',
                        'readonly',
                    ]) !!}

                </div>
            </div>
            `);
        }
        $(document).ready(function() {
            // add child row
            $("body").on("click", ".add_new_frm_field_btn", function() {
                var type = $(this).attr('id');
                var index = updateLength($(".form_field_outer").find(".form_field_outer_row").length + 1);
                addChild(index, type);
                calculateAmount();
                setFinalAmount();
            });
            // delete child row
            $("body").on("click", ".remove_node_btn_frm_field", function() {
                $("body").find(".dynamic_form_content").removeClass("no_adding");
                $(this).closest(".form_field_outer_row").remove();
                $(this).parents(".dynamic_form_content").removeClass("no_adding");
                updateLength($(".form_field_outer").find(".form_field_outer_row").length);
                calculateAmount();
                setFinalAmount();
            });
        });
        $(".select2").select2({
            allowClear: true,
        });
    </script>
@endpush
