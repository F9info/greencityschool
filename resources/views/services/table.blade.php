<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="services-table">
            <thead>
            <tr>
                <th>Sl no.</th>
                {{-- <th>Service Category Id</th> --}}
                <th>Image</th>
                <th>Title</th>
                {{-- <th>Slug</th>
                <th>Sub Title</th>
                <th>Icon</th>
          
                <th>Image Alt Text</th> --}}
                <th>Short Description</th>
                <th>Description</th>
                <th>Custom Url</th>
                <th>New Window</th>
                {{-- <th>Gallery</th> --}}
                {{-- <th>Video Url</th>
                <th>Video Iframe</th>
                <th>Page Title</th>
                <th>Seo Title</th>
                <th>Seo Keywords</th>
                <th>Seo Description</th> --}}
                <th >Action</th>
            </tr>
            </thead>
            <tbody>
            

            @foreach ($services as $key => $service)
            <tr class="row1" data-id="{{ $service->id }}">
                <tr>
                    <td>{{ $services->firstItem() + $key }}</td>
                    {{-- <td>{{ $service->service_category_id }}</td> --}}
                    <td><img src="{{ asset('images/services/' . $service->image) }}" height="50" /></td>
                    <td>{{ $service->title }}</td>
                    {{-- <td>{{ $service->slug }}</td>
                    <td>{{ $service->sub_title }}</td>
                    <td>{{ $service->icon }}</td>
                    <td>{{ $service->image }}</td>
                    <td>{{ $service->image_alt_text }}</td> --}}
                    <td>{!! $service->short_description !!}</td>
                    <td>{!! $service->description !!}</td>
                    <td>{{ $service->custom_url }}</td>
                    <td>{{ $service->new_window }}</td>
                    {{-- <td>{{ $service->gallery }}</td> --}}
                    {{-- <td>{{ $service->video_url }}</td>
                    <td>{{ $service->video_iframe }}</td>
                    <td>{{ $service->page_title }}</td>
                    <td>{{ $service->seo_title }}</td>
                    <td>{{ $service->seo_keywords }}</td>
                    <td>{{ $service->seo_description }}</td> --}}
                    <td  >
                        {!! Form::open(['route' => ['services.destroy', $service->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('services.show', [$service->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('services.edit', [$service->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $services])
        </div>
    </div>
</div>
