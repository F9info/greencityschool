            {!! Form::open(['route' => 'committeeCategoryTypes.store']) !!}

            <div class="card-body">

                <div class="row animation-form">
                    @include('committee_category_types.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary rgbtn']) !!}
                <a href="{{ route('committeeCategoryTypes.index') }}" class="btn btn-default rgbtn"> Cancel </a>
            </div>

            {!! Form::close() !!}
