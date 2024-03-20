<div class="col-6">
    <div class="card shadow overflow-hidden p-2">
        <div class="row g-0">
            <div class="col-md-5 overflow-hidden rounded-3">
                <img src="/storage/{{$item->image_url}}" class="card-img" alt="course image">
                <!-- Overlay -->
                <div class="bg-overlay bg-dark opacity-6"></div>
                <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                    <!-- Video button and link -->
                    <div class="m-auto">
                        <a href="{{$item->link}}" class="btn btn-lg text-danger btn-round btn-white-shadow mb-0" data-glightbox="" data-gallery="course-video">
                            <i class="fas fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>


            <div class="col-md-7">
                <div class="card-body">
                    <!-- Badge and rating -->
{{--                    <div class="d-flex justify-content-between align-items-center mb-2">--}}
{{--                        <!-- Badge -->--}}
{{--                        <a href="#" class="badge text-bg-primary mb-2 mb-sm-0">توسعه فردی</a>--}}
{{--                        <!-- Rating and wishlist -->--}}
{{--                        <div>--}}
{{--                                                        <span class="h6 fw-light me-3"><i--}}
{{--                                                                class="fas fa-star text-warning me-1"></i>4.5</span>--}}
{{--                            <a href="#" class="text-danger"><i class="fas fa-heart"></i></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <!-- Title -->
                    <h5 class="card-title"><a href="#">{{$item->title}}</a>
                    </h5>
                    <p class="text-truncate-2 d-none d-lg-block"> {{ Str::limit($item->description, 100, '...') }}</p>

                    <!-- Info -->
{{--                    <ul class="list-inline">--}}
{{--                        <li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i--}}
{{--                                class="far fa-clock text-danger me-2"></i>21h 56m--}}
{{--                        </li>--}}
{{--                        <li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i--}}
{{--                                class="fas fa-table text-orange me-2"></i>52 lectures--}}
{{--                        </li>--}}
{{--                        <li class="list-inline-item h6 fw-light"><i--}}
{{--                                class="fas fa-signal text-success me-2"></i>Intermediate--}}
{{--                        </li>--}}
{{--                    </ul>--}}

                    <!-- Price and avatar -->
                    <div
                        class="d-sm-flex justify-content-sm-between align-items-center">
                        <!-- Avatar -->

                        <!-- Price -->
                        <div class="mt-3 mt-sm-0">
                            <a href="/youtube/videos/{{$item->id}}" class="btn btn-dark">اطلاعات بیشتر</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
