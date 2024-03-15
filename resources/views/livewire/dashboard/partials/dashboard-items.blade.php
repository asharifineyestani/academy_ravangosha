
<div class="row mb-4">
    @foreach($links as $link)

        <div class="col-sm-6 col-lg-4 mb-2">
            <a href="{{$link['href']}}" class="d-inline">
                <div
                    class="d-flex justify-content-center align-items-center p-4 bg-primary bg-opacity-15 rounded-3">
                <span class="display-6 lh-1 text-primary mb-0">
                    <i class="{{$link['icon']}}"></i>
                </span>
                    <div class="ms-4">
                        <div class="d-flex">

                        </div>
                        <p class="mb-0 h6 fw-light">{{$link['title']}}</p>
                    </div>
                </div>
            </a>
        </div>


    @endforeach
</div>
