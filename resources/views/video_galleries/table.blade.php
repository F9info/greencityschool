
    <div align="center" class="form-search">
        <form class="form-inline form-search" method="GET" action="">

                <div class="item">
                    <label class="sr-only" for="inputSearch">Search</label>
                    <input type="text" class="form-control " id="inputSearch" name="search"
                        placeholder="Title" value="{{ request()->get('search') }}">
                </div>
                <div class="item">
                    <label class="sr-only" for="inputCategory">Select Category</label>
                    <select class="form-control mb-2 mr-sm-2 select2" id="inputCategory" name="category">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ request()->get('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="item"> <button type="submit" class="btn btn-primary mb-2 mr-2">Search</button>
                    <a href="{!! route('photoGalleries.index') !!}" class="btn btn-info mb-2">Reset</a>
                </div>

        </form>
    </div>

    <p class="record_count">{{ $videoGalleries->total() }} Records Found</p>

<div class="card-body p-0">
    <div class="table-responsive" id="videoGalleries-sortable">
        <table class="table" id="video-galleries-table">
            <thead>
            <tr>
                <th>Sl no.</th>
                <th class="sortablelink">@sortablelink('title', 'Title')</th>
                <th>Video Category Name</th>
                <th>Video</th>
                <th>Description</th>
                @if(auth()->guard('admin')->user()->hasPermissionTo('publish-video-gallery'))<th>Publish</th>@endif
                <th style="text-align:center">Action</th>
            </tr>
            </thead>
            <tbody id="tablecontents">
            @php($i=1)
            @foreach($videoGalleries as $key => $videoGallery)
                <tr class="row1" data-id="{{ $videoGallery->id }}">
                    <td>{{ $videoGalleries->firstItem() + $key }}</td>
                    <td>{{ $videoGallery->title }}</td>
                    <td>{{ $videoGallery->video_gallery_category_id != '' ? $videoGallery->videoGalleryCategory->name : '' }}</td>
                    <td>
                        <?php
                            if(!empty($videoGallery->video_url)){
                                preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $videoGallery->video_url, $match);
                                if($match){
                                    $youtubeid = $match[1];
                                }
                            }
                        ?>
                        @isset($youtubeid)
                        <!-- Button trigger modal -->
                        <a href="" data-toggle="modal" data-target="#exampleModal{{ $i }}">
                        <img class="img-fluid z-depth-1 dyimage{{ $videoGallery->id }}" src="http://i1.ytimg.com/vi/{{ $youtubeid }}/mqdefault.jpg" alt="video" width="100">
                        </a>

                        <!-- Modal -->
                        <div class="modal fade bs-example-modal-lg" id="exampleModal{{ $i }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- <iframe class="embed-responsive-item" width="100%" height="500" src="https://www.youtube.com/embed/{{ $videoGallery->video_url }}"
                                    allowfullscreen></iframe> -->

                                <iframe width="100%" src="https://www.youtube.com/embed/{{ $youtubeid }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            </div>
                        </div>
                        </div>
                        @endisset
                    </td>
                    <td>{{ $videoGallery->description }}</td>
                    @if(auth()->guard('admin')->user()->hasPermissionTo('publish-video-gallery'))
                        @include('common.make-publish', ['id' => $videoGallery->id, 'publish' => $videoGallery->publish, 'type' => 'videoGallery'])
                    @endif
                    <td>
                        {!! Form::open(['route' => ['videoGalleries.destroy', $videoGallery->id], 'method' => 'delete' , 'id' => 'videoGallery-delete-form'.$videoGallery->id]) !!}
                        <div class='btn-group'>
                            {{-- @if(auth()->user()->hasPermissionTo('view-videoGalleries')) --}}
                            <a href="{{ route('videoGalleries.show', [$videoGallery->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            {{-- @endif --}}

                            @if(auth()->guard('admin')->user()->hasPermissionTo('edit-video-gallery'))
                            <a href="{{ route('videoGalleries.edit', [$videoGallery->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            @endif

                            @if(auth()->guard('admin')->user()->hasPermissionTo('delete-video-gallery'))
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['d' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "deleteRecord(event, ".$videoGallery->id.")"]) !!}
                            @endif
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
                @php($i++)
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $videoGalleries->appends(request()->query())])
        </div>
    </div>
</div>
@include('common.sweet-alert-before-delete', ['formName' => 'videoGallery-delete-form'])
@include('common.sortable', ['url' => 'videoGalleries-sortable'])
