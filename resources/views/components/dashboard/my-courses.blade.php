<div class="card-body">

    <!-- Search and select START -->
    <div class="row g-3 align-items-center justify-content-between mb-4">
        <!-- Content -->
        <div class="col-md-12">
            <form class="rounded position-relative">
                <input class="form-control pe-5 bg-transparent" type="search"
                       placeholder="جستجو" aria-label="Search">
                <button
                    class="btn bg-transparent px-2 py-0 position-absolute top-50 end-0 translate-middle-y"
                    type="submit"><i class="fas fa-search fs-6 "></i></button>
            </form>
        </div>

        <!-- Select option -->

    </div>
    <!-- Search and select END -->

    <!-- Course list table START -->
    <div class="table-responsive border-0">
        <table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
            <!-- Table head -->
            <thead>
            <tr>
                <th scope="col" class="border-0 rounded-start">عنوان دوره</th>
                <th scope="col" class="border-0">تعداد درس ها</th>
                <th scope="col" class="border-0">درس های کامل شده</th>
                <th scope="col" class="border-0 rounded-end">عملیات</th>
            </tr>
            </thead>

            <!-- Table body START -->
            <tbody>
            <!-- Table item -->
            @foreach($items as $item)
                <tr>
                    <!-- Table data -->
                    <td>
                        <div class="d-flex align-items-center">
                            <!-- Image -->
                            <div class="w-100px">
                                <img src="{{$item->thumbnail_path}}" class="rounded"
                                     alt="">
                            </div>
                            <div class="mb-0 ms-2" style="width: 50%">
                                <!-- Title -->
                                <h6><a href="/courses/{{$item->id}}">{{$item->title}}</a></h6>
                                <!-- Info -->
{{--                                <div class="overflow-hidden">--}}
{{--                                    <h6 class="mb-0 text-end">{{ (int) $item->videos->avg('watched_percentage')}}--}}
{{--                                        %</h6>--}}
{{--                                    <div class="progress progress-sm bg-primary bg-opacity-10">--}}
{{--                                        <div class="progress-bar bg-primary aos"--}}
{{--                                             role="progressbar"--}}
{{--                                             data-aos="slide-right" data-aos-delay="200"--}}
{{--                                             data-aos-duration="1000"--}}
{{--                                             data-aos-easing="ease-in-out"--}}
{{--                                             style="width: {{$item->videos->avg('watched_percentage')}}%"--}}
{{--                                             aria-valuenow="{{$item->videos->avg('watched_percentage')}}"--}}
{{--                                             aria-valuemin="0"--}}
{{--                                             aria-valuemax="100">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </td>

                    <!-- Table data -->
                    <td>{{$item->arvanVideos->count()}}</td>

                    <!-- Table data -->
                    <td>{{$item->arvanVideos->where('watched_percentage' , '>', 1)->count()}}</td>

                    <!-- Table data -->
                    <td>
                        <a href="/courses/{{$item->id}}" class="btn btn-sm btn-primary-soft me-1 mb-1 mb-md-0"><i
                                class="bi bi-play-circle me-1"></i>مشاهده</a>
                    </td>
                </tr>
            @endforeach

            </tbody>
            <!-- Table body END -->
        </table>
    </div>
    <!-- Course list table END -->

    <!-- Pagination START -->

    <!-- Pagination END -->
</div>
