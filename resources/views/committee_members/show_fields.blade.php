<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $committeeMember->name }}</p>
</div>

<!-- Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $committeeMember->email }}</p>
</div>

<!-- Phone Field -->
<div class="col-sm-12">
    {!! Form::label('phone', 'Phone:') !!}
    <p>{{ $committeeMember->phone }}</p>
</div>

<!-- Gender Field -->
<div class="col-sm-12">
    {!! Form::label('gender', 'Gender:') !!}
    <p>{{ $committeeMember->gender }}</p>
</div>

<!-- Member Type Field -->
<div class="col-sm-12">
    {!! Form::label('member_type', 'Member Type:') !!}
    <p>{{ $committeeMember->member_type }}</p>
</div>

<!-- Member Photo Field -->
<div class="col-sm-12">
    {!! Form::label('member_photo', 'Member Photo:') !!}
    <p><img src="{{ asset('images/committee-members/'.$committeeMember->member_photo) }}" height="100" /></p>
</div>

<!-- City Field -->
<div class="col-sm-12">
    {!! Form::label('city', 'City:') !!}
    <p>{{ $committeeMember->city }}</p>
</div>

<!-- State Field -->
<div class="col-sm-12">
    {!! Form::label('state', 'State:') !!}
    <p>{{ $committeeMember->state }}</p>
</div>

<!-- Address Field -->
<div class="col-sm-12">
    {!! Form::label('address', 'Address:') !!}
    <p>{{ $committeeMember->address }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $committeeMember->description }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $committeeMember->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $committeeMember->updated_at }}</p>
</div>

