<!-- Membership Name Field -->
<div class="form-group col-sm-6">

    {!! Form::text('membership_name', null, ['class' => 'form-control', 'required']) !!}
    {!! Form::label('membership_name', 'Membership Name:', ['class' => 'span_required']) !!}

</div>

<!-- Price Field -->
<div class="form-group  numbers-input col-sm-6">

    {!! Form::text('price', null, ['class' => 'form-control', 'required']) !!}
    {!! Form::label('price', 'Price:', ['class' => 'span_required']) !!}

</div>

<div class="form-group col-sm-6">

    <div class="radio">
        <label>
            {!! Form::radio('validity_type', 'lifetime', null, ['required']) !!}
            Life Time
        </label>
        <label>
            {!! Form::radio('validity_type', 'months') !!}
            No. of Months
        </label>
        <label>
            {!! Form::radio('validity_type', 'expirydate') !!}
            Expiry Date
        </label>
    </div>
    {!! Form::label('validity_type', 'Validity Type:', ['class' => 'span_required']) !!}

</div>
<!-- Months Field -->
<div class="form-group col-sm-6 months" style="display:none;">

    {!! Form::select(
        'months',
        [
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
            '5' => '5',
            '6' => '6',
            '7' => '7',
            '8' => '8',
            '9' => '9',
            '10' => '10',
            '11' => '11',
            '12' => '12',
        ],
        null,
        ['class' => 'form-control select2', 'placeholder' => 'Select number of months'],
    ) !!}
    {!! Form::label('months', 'Months:') !!}
</div>

<!-- Expiry Date Field -->
<div class="form-group col-sm-6 expirydate" style="display:none;">

    {!! Form::text('expiry_date', null, ['class' => 'form-control ', 'id' => 'datepicker']) !!}
    {!! Form::label('expiry_date', 'Expiry Date:') !!}
</div>

@push('page_scripts')
    <!-- Bootstrap Datetime Picker -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/6.2.7/js/tempus-dominus.min.js"
        integrity="sha512-mlRnmlg3QB5kUlkHt2TkijTp/aTaXzSufbKrfMD1xfRhyiTKxLVgvNxSTwju35XtSZNxGlQ8G+EgGnAd9zJlWg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        function checkValidity(validity) {
            if (validity == 'lifetime') {
                $(".months").hide();
                $(".expirydate").hide();
                $(".months select").prop('required', false);
                $(".expirydate input").prop('required', false);
            } else if (validity == 'months') {
                $(".months").show();
                $(".months select").prop('required', true);
                $(".expirydate").hide();
                $(".expirydate input").prop('required', false);
            } else if (validity == 'expirydate') {
                $(".months").hide();
                $(".months select").prop('required', false);
                $(".expirydate").show();
                $(".expirydate input").prop('required', true);
            }
        }
        $(document).ready(function() {
            $(".months").hide();
            $(".expirydate").hide();
            var validity = $('input[name="validity_type"]:checked').val();
            checkValidity(validity);
            $('input[type=radio][name=validity_type]').change(function() {
                checkValidity(this.value);
            });
        });
        $('#datepicker').datepicker({
            format: 'YYYY-MM-DD hh:mm A',
            icons: {
                time: 'far fa-clock'
            },
            useCurrent: false
        });
    </script>
@endpush
