<!-- Name Field -->
<div class="letters-input form-group col-sm-6">

    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
    {!! Form::label('name', 'Name:', ['class' => 'span_required']) !!}

</div>

<!-- Designation Field -->
<div class="letters-input form-group col-sm-6">

    {!! Form::text('designation', null, ['class' => 'form-control']) !!}
    {!! Form::label('designation', 'Designation:', ['class' => '1']) !!}

</div>

<!-- CAF Designation Field -->
<div class="letters-input form-group col-sm-6">

    {!! Form::text('caf_designation', null, ['class' => 'form-control']) !!}
    {!! Form::label('caf_designation', 'CAF Designation:', ['class' => '1']) !!}

</div>

<!-- Email Field -->
<div class="form-group col-sm-6">

    {!! Form::email('email', null, ['class' => 'form-control', 'required']) !!}
    {!! Form::label('email', 'Email:', ['class' => 'span_required']) !!}

</div>

<!-- Phone Field -->
<div class="form-group  col-sm-6">

    {!! Form::text('phone', null, ['class' => 'form-control mask_number', 'required']) !!}
    {!! Form::label('phone', 'Phone:', ['class' => 'span_required']) !!}

</div>

<!-- Gender Field -->
<div class="form-group select-area col-sm-6">

    {!! Form::select('gender', ['Male' => 'Male', 'Female' => 'Female'], null, [
        'class' => 'form-control select2',
        'placeholder' => 'Select Gender',
    ]) !!}
    {!! Form::label('gender', 'Gender:') !!}
</div>

<!-- Member Type Field -->
<div class="form-group  select-area col-sm-6">

    {!! Form::select('member_type', ['Regular' => 'Regular', 'Senior' => 'Senior', 'Youth' => 'Youth'], null, [
        'class' => 'form-control select2',
        'placeholder' => 'Select Member Type',
    ]) !!}
    {!! Form::label('member_type', 'Member Type:') !!}
</div>

<!-- Member Photo Field -->
<div class="form-group image_input image_input_required col-sm-6 ">

    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('member_photo', [
                'class' => 'custom-file-input',
                isset($committeeMember) ? '' : 'required',
                'accept' => '.jpg,.png,.jpeg',
                'data-parsley-max-file-size' => applicationSettings('member-image-size'),
                'data-parsley-fileextension' => 'jpg,png,jpeg',
            ]) !!}
            {!! Form::label('member_photo', 'Choose file', ['class' => 'custom-file-label ']) !!}

        </div>
    </div>
    @isset($committeeMember)
        @if ($committeeMember->member_photo != '')
            <p><img src="{{ asset('images/committee-members/' . $committeeMember->member_photo) }}" alt=""
                    height="50"></p>
        @endif
    @endisset
    <em class="image_span span_required">Member Photo</em>

    <span class="image_note">[ Image size should not be more than {!! applicationSettings('member-image-size') !!} KB ]</span>
</div>
<div class="clearfix"></div>

<!-- City Field -->
<div class="letters-input form-group  col-sm-6">

    {!! Form::text('city', null, ['class' => 'form-control']) !!}
    {!! Form::label('city', 'City:') !!}
</div>

<!-- State Field -->
<div class="letters-input  form-group  col-sm-6">

    {!! Form::text('state', null, ['class' => 'form-control']) !!}
    {!! Form::label('state', 'State:') !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-12 col-lg-12">

    {!! Form::textarea('address', null, ['class' => 'form-control']) !!}
    {!! Form::label('address', 'Address:') !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">

    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    {!! Form::label('description', 'Description:') !!}
</div>

<div class="col-md-12">
    <div class="row checkbox">
        @foreach ($committeeCategories as $committeeCategory)
            <div class="col-md-3">
                <label>
                    {!! Form::checkbox(
                        'committeeCategories[]',
                        $committeeCategory->id,
                        isset($committeeMember) && $committeeMember->activeList->contains('committee_category_id', $committeeCategory->id)
                            ? 'checked'
                            : '',
                    ) !!}
                    {{ $committeeCategory->name }}
                </label>

                @if (isset($committeeMember))
                    @php($status = $committeeMember->activeList->where('committee_category_id', $committeeCategory->id)->first())
                @endif
                <div class="radio">
                    <label>
                        {!! Form::radio('status' . $committeeCategory->id, 1, isset($status) && $status->active == 1 ? 'checked' : '') !!}
                        Active
                    </label>
                    <label>
                        {!! Form::radio('status' . $committeeCategory->id, 0, isset($status) && $status->active === 0 ? 'checked' : '') !!}
                        Inactive
                    </label>
                </div>
            </div>
        @endforeach
    </div>
</div>
@include('membership_form_common.datepicker')
