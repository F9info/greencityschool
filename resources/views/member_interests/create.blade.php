
        @include('adminlte-templates::common.errors')



            {!! Form::open(['route' => 'memberInterests.store']) !!}

            <div class="card-body">

                <div class="row animation-form">
                    @include('member_interests.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary  rgbtn']) !!}
                <a href="{{ route('memberInterests.index') }}" class="btn btn-default  rgbtn"> Cancel </a>
            </div>

            {!! Form::close() !!}
