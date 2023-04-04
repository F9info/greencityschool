@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="pull-left">Role</h1>
            </div>
            <div class="col-sm-6">
                @if(auth()->guard('admin')->user()->hasPermissionTo('add-roles'))
                <a class="btn btn-primary float-right" href="{{ route('roles.create') }}">
                    <span class="material-symbols-outlined">
                        add
                    </span> Add New
                </a>
                @endif
            </div>
        </div>
    </div>
</section>

<div class="content px-3">

    @include('flash::message')

    <div class="clearfix"></div>

    <div class="card">
        <div class="card-body p-0">
            @include('roles.table')

            <div class="card-footer clearfix">
                <div class="float-right">
                    @include('adminlte-templates::common.paginate', ['records' => $roles])
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
