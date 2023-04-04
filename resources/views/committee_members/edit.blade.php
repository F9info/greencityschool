@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>
                        Edit Committee Member
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($committeeMember, [
                'route' => ['committeeMembers.update', $committeeMember->id],
                'method' => 'patch',
                'files' => 'true',
            ]) !!}

            <div class="card-body">
                <div class="row animation-form">
                    @include('committee_members.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary rgbtn']) !!}
                <a href="{{ route('committeeMembers.index') }}" class="btn btn-default rgbtn"> Cancel </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
