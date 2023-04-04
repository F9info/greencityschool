<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $user->name !!}</p>
</div>

<!-- Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $user->email !!}</p>
</div>

<!-- Mobile Field -->
<div class="col-sm-12">
    {!! Form::label('email', 'Mobile:') !!}
    <p>{!! $user->mobile !!}</p>
</div>

<!-- Designation Field -->
<div class="col-sm-12">
    {!! Form::label('designation', 'Designation:') !!}
    <p>{!! $user->designation !!}</p>
</div>

<!-- Role Field -->
<div class="col-sm-12">
    {!! Form::label('role', 'Role:') !!}
    <p>{!! getUserRole($user->id) !!}</p>
</div>

<!-- Address Field -->
<div class="col-sm-12">
    {!! Form::label('address', 'Address:') !!}
    <p>{!! $user->address !!}</p>
</div>
