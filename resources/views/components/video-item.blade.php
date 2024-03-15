<div>


    <div
        class="d-sm-flex justify-content-sm-between align-items-center">
        <div class="d-flex">
            @if($video->enrolled or $video->is_free )
                <a href="{{$item->href}}"
                   class="btn {{$item->classPlay}} btn-round mb-0 flex-shrink-0"><i
                        class="{{$item->icon}}"></i></a>
            @else
                <span
                    class=" {{$item->classPlay}} btn-round mb-0 flex-shrink-0"><i
                        class="{{$item->icon}}"></i></span>
            @endif

            <div class="ms-2 ms-sm-3 mt-1 mt-sm-0">
                <h6 class="mb-0">{{$video->title}}</h6>
                <p class="mb-2 mb-sm-0 small">{{$video->duration_minute}} </p>

            </div>
        </div>
        <!-- Button -->
        <a
            href="{{$item->href}}"
            class="btn btn-sm {{$item->class}} mb-0">{{$item->label}}</a>


    </div>
    <hr>

</div>
