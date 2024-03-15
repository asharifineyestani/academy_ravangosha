<td class="table-hover @if($currentVideoId == $video->id) bg-secondary bg-opacity-15 @endif" >
    <div
        class="d-flex justify-content-between align-items-center mb-2">


        <div
            class="position-relative d-flex align-items-center">

            @if($video->course->enrolled or $video->is_free )
                <a href="{{$item['href']}}"
                   class="btn {{$item['classPlay']}} btn-round mb-0 flex-shrink-0"><i
                        class="{{$item['icon']}}"></i></a>
            @else

                <span title="نیاز به ثبت نام"
                    class=" {{$item['classPlay']}} btn-round mb-0 flex-shrink-0"><i
                        class="{{$item['icon']}}"></i></span>
            @endif


            <span
                class="d-inline-block text-truncate ms-2 mb-0 h6 fw-light w-100px w-sm-200px">{{$video->title}}</span>
        </div>
        <p class="mb-0 text-truncate">{{$video->duration_minute}}</p>
    </div>

    <!-- Add note button -->
{{--    <a class="btn btn-xs btn-warning" data-bs-toggle="collapse"--}}
{{--       href="#addnote-1" role="button" aria-expanded="false"--}}
{{--       aria-controls="addnote-1">--}}
{{--       مشاهده یادداشت ها--}}
{{--    </a>--}}

    <!-- Notes START -->
    <div class="collapse" id="addnote-1">
        <div class="card card-body p-0">

            <!-- Note item -->
            <div
                class="d-flex justify-content-between bg-light rounded-2 p-2 mb-2">
                <!-- Content -->
                <div class="d-flex align-items-center">
                    <span class="badge bg-dark me-2">5:20</span>
                    <h6 class="d-inline-block text-truncate w-40px w-sm-150px mb-0 fw-light">
                        Describe SEO Engine</h6>
                </div>
                <!-- Button -->
                <div class="d-flex">
                    <a href="#"
                       class="btn btn-sm btn-light btn-round me-2 mb-0"><i
                            class="bi fa-fw bi-play-fill"></i></a>
                    <a href="#"
                       class="btn btn-sm btn-light btn-round mb-0"><i
                            class="bi fa-fw bi-trash-fill"></i></a>
                </div>
            </div>



        </div>
    </div>
    <!-- Notes END -->

</td>
