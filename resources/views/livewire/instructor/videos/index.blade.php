<div class="card bg-transparent border rounded-3">
    <div class="card-body">
        <div class="card-header bg-transparent border-bottom">
            <div
                class="card-header bg-transparent border-bottom col d-sm-flex justify-content-between align-items-center">
                <h3 class="mb-0">لیست ویدیو ها</h3>
                <livewire:dashboard.partials.curl-video :courseId="1"/>
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
                        <th scope="col" class="border-0 rounded-start">ترتیب</th>
                        <th scope="col" class="border-0 ">عنوان درس</th>
                        <th scope="col" class="border-0">مرتب سازی</th>
                        <th scope="col" class="border-0 rounded-end">عملیات</th>
                    </tr>
                    </thead>

                    <!-- Table body START -->
                    <tbody>
                    <!-- Table item -->
                    @foreach($items as $item)
                        <tr wire:key="'{{$item->id}}'">
                            <!-- Table data -->


                            <td>
                                <h6>{{$item->sort_number}}</h6>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!-- Image -->
                                    <div class="w-100px">
                                        <img src="{{$item->thumbnail_path}}" class="rounded"
                                             alt="">
                                    </div>
                                    <div class="mb-0 ms-2" style="width: 50%">
                                        <!-- Title -->
                                        <h6>{{$item->title}}</h6>
                                        <!-- Info -->
                                    </div>
                                </div>
                            </td>

                            <!-- Table data -->

                            <td>

                                <div>
                                    <form class="position-relative"
                                          wire:submit.prevent='updateSortNumber("{{$item->id}}")'
                                          style="width: 120px">
                                        @csrf
                                        <input wire:model.defer="sortNumber"
                                               class="form-control pe-5 bg-transparent" type="number">
                                        <button
                                            class="btn bg-transparent px-2 py-0 position-absolute top-50 end-0 translate-middle-y"
                                            type="submit">
                                            <i class="fas fa-sort-amount-down fs-6"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>


                            <td>
                                <a
                                    href="/cloud/videos/{{$item->id}}"
                                    title="مشاهده ویدیو"
                                    class="btn btn-sm btn-primary-soft me-1 mb-1 mb-md-0">
                                    <i class="bi bi-play-circle me-1"></i>
                                </a>

                                <a
                                    href="/curl/channels/{{$item->channel_id}}/videos/{{$item->id}}"
                                    title="خزنده ویدیو"
                                    class="btn btn-sm btn-primary-soft me-1 mb-1 mb-md-0">
                                    <i class="fas fa-spider"></i>
                                </a>

                                <a
                                    href="/instructor/videos/{{$item->id}}/tasks/create"
                                    title="ثبت تکلیف"
                                    class="btn btn-sm btn-primary-soft me-1 mb-1 mb-md-0">
                                    <i class="fas fa-layer-group"></i>
                                </a>

                                <button
                                    wire:click="deleteVideo('{{$item->id}}')"
                                    type="button"
                                    title="حذف  ویدیو"
                                    class="btn btn-sm btn-danger-soft me-1 mb-1 mb-md-0">
                                    <i class="fas fa-trash"></i>
                                </button>
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
