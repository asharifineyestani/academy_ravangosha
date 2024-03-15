<section class="pt-0 pt-lg-5">
    <div class="container">
        <!-- Title -->
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="fs-1 fw-bold">
                    <span class="position-relative z-index-9">آخرین دوره های به روز شده</span>
                </h2>
{{--                <p class="mb-0">در </p>--}}
            </div>
        </div>

        <div class="row g-4">

        @foreach($courses as $item)
            <!-- Card START -->
                <div class="col-md-6 col-xl-4">
                    <div class="card shadow-hover overflow-hidden bg-transparent">
                        <div class="position-relative">
                            <!-- Image -->
                            <img class="card-img-top" src="{{$item->thumbnail_path}}" alt="Card image">
                            <!-- Overlay -->
                            <div class="bg-overlay bg-dark opacity-4"></div>
                            <div class="card-img-overlay d-flex align-items-start flex-column">
                                <!-- Card overlay bottom -->
                                <div class="w-100 mt-auto d-inline-flex">
                                    <div class="d-flex align-items-center bg-white p-2 rounded-2">
                                        <!-- Avatar -->
                                        <div class="avatar avatar-sm me-2">
                                            <img class="avatar-img rounded-1" src="{{$item->author->avatar_path}}"
                                                 alt="avatar">
                                        </div>
                                        <!-- Avatar info -->
                                        <div>
                                            <h6 class="mb-0"><a href="#" class="text-dark">{{$item->author->name}}</a></h6>
                                            <span class="small">{{$item->author->headline}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <!-- Badge and icon -->
{{--                            <div class="d-flex justify-content-between mb-3">--}}
{{--                                <div class="hstack gap-2">--}}
{{--                                    <a href="#" class="badge bg-orange bg-opacity-10 text-orange">All level</a>--}}
{{--                                    <a href="#" class="badge bg-dark text-white">6 month</a>--}}
{{--                                </div>--}}
{{--                                <a href="#" class="h6 fw-light mb-0"><i class="far fa-bookmark"></i></a>--}}
{{--                            </div>--}}
                            <!-- Title -->
                            <h5 class="card-title"><a href="/courses/{{$item->id}}">{{$item->title}}</a></h5>
                            <!-- Rating -->
{{--                            <ul class="list-inline">--}}
{{--                                <li class="list-inline-item h6 fw-light mb-0">4.5</li>--}}
{{--                                <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>--}}
{{--                                <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>--}}
{{--                                <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>--}}
{{--                                <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>--}}
{{--                                <li class="list-inline-item me-0 small"><i--}}
{{--                                        class="fas fa-star-half-alt text-warning"></i></li>--}}
{{--                                <li class="list-inline-item ms-2 text-reset">(6,500)</li>--}}
{{--                            </ul>--}}
                            <!-- Divider -->
                            <hr>
                            <!-- Time -->
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h4 class="text-success mb-0">{{$item->price}} <span>تومان</span></h4>
                                <span class="h6 fw-light mb-0 me-3"><i class="far fa-clock text-danger me-2"></i>{{calculateDurationCourse($item)}} دقیقه </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card END -->
            @endforeach


        </div>
    </div>
</section>
