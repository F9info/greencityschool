@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Reset Password</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        @include('adminlte-templates::common.errors')
        <div class="card">
            <form method="POST" action="{{ url('users/reset') }}">
                <div class="card-body">
                    <div class="row">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $id }}">

                        <div class="form-group col-lg-6">
                            <label for="name">New Password</label>
                            <input type="password" class="form-control password_input_eye" id="password" name="password"
                                placeholder="New Password" required data-parsley-required-message=""
                                data-parsley-group="first"
                                data-parsley-pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z\d]).{8,}"
                                data-parsley-error-message="" autocomplete="off" readonly
                                onfocus="this.removeAttribute('readonly');">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="name">Confirm Password</label>
                            <input type="password" class="form-control" id="cpassword" name="cpassword"
                                placeholder="Confirm Password" required data-parsley-equalto="#password"required
                                data-parsley-group="first" data-parsley-required-message="" data-parsley-error-message="Password and confirm passeord should match"
                                autocomplete="off" readonly onfocus="this.removeAttribute('readonly');">
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                    <a href="{{ route('users.index') }}" class="btn btn-default">Cancel</a>
                </div>
                <!-- /.box-body -->
            </form>
        </div>
    </div>
@endsection
