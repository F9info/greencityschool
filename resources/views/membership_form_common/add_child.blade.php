<div id="dynamic_form">
    <div class="dynamic_form_content">
        <div class="form-group col add_del_btn_outer row ">

            <p class="col-md-6">Enter the child details</p>
            <div class="col-md-6 pr-0 mobile_absolute_btn"> <a href="javascript:void(0)"
                    class="btn  btn-primary add_new_frm_field_btn fright ">
                    <span class="material-symbols-outlined">add</span>
                    Add More Child
                </a>


                <div class="clear"></div>
            </div>
        </div>

        <div class="row table_form_row ">
            <div class="col-md-12 form_field_outer form_sec_outer_task ">
                @isset($child_details)
                    @foreach ($child_details as $child_detail)
                        <div class="row form_field_outer_row">
                            <div class="form-group col-md-3 input_value${index}">
                                {!! Form::text('child_name[]', $child_detail->child_name, [
                                    'class' => 'form-control letters-input1 ',
                                    'required',
                                    'data-parsley-pattern' => '[a-zA-Z .]*',
                                    'minlength' => '2',
                                    'maxlength' => '50',
                                ]) !!}
                                {!! Form::label('child_name', 'Child Name:') !!}
                            </div>
                            <div class="form-group col input_value${index}">
                                {!! Form::text('child_age[]', $child_detail->age, [
                                    'class' => 'form-control numbers-input1 ',
                                    'required',
                                    'maxlength' => '2',
                                    'max' => '26',
                                    'data-parsley-pattern' => '[0-9]*',
                                ]) !!}
                                {!! Form::label('child_age', 'Child Age:') !!}
                            </div>
                            <div class="form-group select-area  col">
                                {!! Form::select('child_gender[]', ['male' => 'MALE', 'female' => 'FEMALE'], $child_detail->gender, [
                                    'class' => 'form-control select_only select2',
                                    'placeholder' => 'Select Gender',
                                ]) !!}
                                {!! Form::label('child_gender', 'Gender:') !!}
                            </div>
                            <div class="form-group col input_value${index}">
                                {!! Form::text('child_birth[]', $child_detail->date_of_birth, [
                                    'class' => 'form-control child_datepicker1',
                                    'readonly',
                                    'id' => 'child_date_of_birth',
                                ]) !!}
                                {!! Form::label('child_birth', 'Child DOB:') !!}
                            </div>
                            <div class="form-group col add_del_btn_outer">
                                <button class="btn btn-secondary remove_node_btn_frm_field">
                                    <span class="material-symbols-outlined">remove</span>
                                    Remove
                                </button>
                            </div>
                        </div>
                    @endforeach
                @endisset
            </div>
        </div>
    </div>
</div>
@push('page_scripts')
    <script>
        function updateLength(index) {
            if (index >= 4) {
                $('.add_new_frm_field_btn').addClass('disabled').prop("disabled", true);
            } else {
                $('.add_new_frm_field_btn').removeClass('disabled').prop("disabled", false);
            }
            return index;
        }

        function addChild(index) {
            $(".form_field_outer").append(`
                <div class="row form_field_outer_row child_row${index}">
                    <div class="form-group col-md-3  input_value${index}">
                        {!! Form::text('child_name[]', null, [
                            'class' => 'form-control letters-input${index}',
                            'data-parsley-pattern' => '[a-zA-Z ]*',
                            'minlength' => '2',
                            'maxlength' => '50',
                        ]) !!}
                        {!! Form::label('child_name', 'Child Name:') !!}
                        </div>
                        <div class="form-group col input_value${index}">
                            {!! Form::text('child_age[]', null, [
                                'class' => 'form-control numbers-input${index}',
                                'maxlength' => '2',
                                'max' => '26',
                                'data-parsley-type'=>'number',
                            ]) !!}
                            {!! Form::label('child_age', 'Child Age:') !!}
                        </div>
                        <div class="form-group select-area col">
                        {!! Form::select('child_gender[]', ['male' => 'MALE', 'female' => 'FEMALE'], null, [
                            'class' => 'form-control select_only select1${index}',
                            'placeholder' => 'Select Gender',
                        ]) !!}
                        {!! Form::label('child_gender', 'Gender:') !!}
                    </div>
                    <div class="form-group col input_value${index}">
                        {!! Form::text('child_birth[]', null, [
                            'class' => 'form-control child_datepicker${index}',

                            'readonly',
                        ]) !!}
                        {!! Form::label('child_birth', 'Child DOB:') !!}
                    </div>
                    <div class="form-group col add_del_btn_outer">
                        <button class="btn btn-secondary remove_node_btn_frm_field disabled" >
                            <span class="material-symbols-outlined">remove</span>
                            Remove
                        </button>
                    </div>
                </div>
            `);
        }
        if ($(".form_field_outer").find(".form_field_outer_row").length == 0) {
            addChild(1);
        }
        $(document).ready(function() {
            $('.input_value1 input, .input_value2 input').blur(function() {
                if ($(this).val()) {
                    $(this).closest('.form-group').addClass('input-has-value');
                } else {
                    $(this).closest('.form-group').removeClass('input-has-value');
                }
            });

            $(".letters-input1").lettersOnly();
            $(".numbers-input1").numbersOnly();
            var setCalsClearButton = function(year, month, elem) {
                var afterShow = function() {
                    var d = new $.Deferred();
                    var cnt = 0;
                    setTimeout(function() {
                        if (elem.dpDiv[0].style.display === "block") {
                            d.resolve();
                        }
                        if (cnt >= 500) {
                            d.reject("datepicker show timeout");
                        }
                        cnt++;
                    }, 10);
                    return d.promise();
                }();
                afterShow.done(function() {
                    $('.ui-datepicker').css('z-index', 2000);
                    var buttonPane = $(elem).datepicker("widget").find(".ui-datepicker-buttonpane");
                    var btn = $(
                        '<button class="ui-datepicker-current ui-state-default ui-priority-primary ui-corner-all" type="button">Clear</button>'
                    );
                    btn.off("click").on("click", function() {
                        $.datepicker._clearDate(elem.input[0]);
                    });
                    btn.appendTo(buttonPane);
                });
            }
            $(".child_datepicker1").datepicker({
                showButtonPanel: true,
                dateFormat: "M-dd",
                beforeShow: function(inst, elem) {
                    setCalsClearButton(null, null, elem);
                },
                onChangeMonthYear: setCalsClearButton
            });
            $(".select11").select2({
                allowClear: true,
            });

            // add child row
            $("body").on("click", ".add_new_frm_field_btn", function() {
                var index = updateLength($(".form_field_outer").find(".form_field_outer_row").length + 1);
                addChild(index);

                $(".letters-input1, .letters-input2, .letters-input3, .letters-input4").lettersOnly();
                $(".numbers-input1, .numbers-input2, .numbers-input3, .numbers-input4").numbersOnly();


                $(".select11, .select12, .select13, .select14").select2({
                    allowClear: true,
                });


                $(".child_row2 .add_del_btn_outer button, .child_row3 .add_del_btn_outer button, .child_row4 .add_del_btn_outer button")
                    .removeClass("disabled");





                var setCalsClearButton = function(year, month, elem) {
                    var afterShow = function() {
                        var d = new $.Deferred();
                        var cnt = 0;
                        setTimeout(function() {
                            if (elem.dpDiv[0].style.display === "block") {
                                d.resolve();
                            }
                            if (cnt >= 500) {
                                d.reject("datepicker show timeout");
                            }
                            cnt++;
                        }, 10);
                        return d.promise();
                    }();
                    afterShow.done(function() {
                        $('.ui-datepicker').css('z-index', 2000);
                        var buttonPane = $(elem).datepicker("widget").find(
                            ".ui-datepicker-buttonpane");
                        var btn = $(
                            '<button class="ui-datepicker-current ui-state-default ui-priority-primary ui-corner-all" type="button">Clear</button>'
                        );
                        btn.off("click").on("click", function() {
                            $.datepicker._clearDate(elem.input[0]);
                        });
                        btn.appendTo(buttonPane);
                    });
                }
                $(".child_datepicker1, .child_datepicker2, .child_datepicker3, .child_datepicker4")
                    .datepicker({
                        showButtonPanel: true,
                        dateFormat: "M-dd",
                        beforeShow: function(inst, elem) {
                            setCalsClearButton(null, null, elem);
                        },
                        onChangeMonthYear: setCalsClearButton
                    });





                $('.input_value2 input, .input_value3 input, .input_value4 input, .input_value5 input')
                    .blur(function() {
                        if ($(this).val()) {
                            $(this).closest('.form-group').addClass('input-has-value');
                        } else {
                            $(this).closest('.form-group').removeClass('input-has-value');
                        }
                    });
            });
            // delete child row
            $("body").on("click", ".remove_node_btn_frm_field", function() {
                $("body").find(".dynamic_form_content").removeClass("no_adding");
                $(this).closest(".form_field_outer_row").remove();
                $(this).parents(".dynamic_form_content").removeClass("no_adding");
                updateLength($(".form_field_outer").find(".form_field_outer_row").length);
            });
        });
        $(".select2").select2({
            allowClear: true,
        });
    </script>
@endpush
