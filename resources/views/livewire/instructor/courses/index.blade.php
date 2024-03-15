<div>
    <div class="card bg-transparent border rounded-3">
        <div class="card-body">
            <div class="card-header bg-transparent border-bottom">
                <h3 class="mb-0">لیست دوره های من</h3>
            </div>

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

            <div class="table-responsive border-0">
                <table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
                    <!-- Table head -->
                    <thead>
                    <tr>
                        <th scope="col" class="border-0 rounded-start">عنوان دوره</th>
                        <th scope="col" class="border-0">تعداد دروس</th>
                        <th scope="col" class="border-0">تعداد دانشجویان</th>
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
                                    </div>
                                </div>
                            </td>

                            <!-- Table data -->

                            <td>{{$item->arvanVideos->count()}}</td>

                            <!-- Table data -->
                            <td>{{$item->users->count()}}</td>

                            <!-- Table data -->
                            <td>
                                <a href="/instructor/courses/{{$item->id}}/videos"
                                   title="مدیریت ویدیوها"
                                        class="btn btn-sm btn-primary-soft me-1 mb-1 mb-md-0">
                                    <i class="fas fa-video"></i>
                                </a>

                                <a href="/instructor/courses/{{$item->id}}/edit"
                                   title="ویرایش دوره"
                                   class="btn btn-sm btn-primary-soft me-1 mb-1 mb-md-0">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                    <!-- Table body END -->
                </table>
            </div>
        </div>
    </div>

</div>



