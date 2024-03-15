<div class="card bg-transparent border rounded-3">
    <div class="card-body">
        <div class="card-header bg-transparent border-bottom">
            <h3 class="mb-0">لیست کاربران</h3>
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
                    <th scope="col" class="border-0">بالانس</th>
                    <th scope="col" class="border-0">خرید ماه جاری</th>
                    <th scope="col" class="border-0">تعداد درس</th>
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
                                    <img src="{{$item->avatar_path}}" class="rounded"
                                         alt="">
                                </div>
                                <div class="mb-0 ms-2" style="width: 50%">
                                    <!-- Title -->
                                    <h6>{{$item->name}}</h6>
                                    <div>{{$item->mobile}}</div>
                                    <!-- Info -->
                                </div>
                            </div>
                        </td>

                        <!-- Table data -->
                        <td>{{number_format($item->balance)}}</td>
                        <td>{{number_format($item->lastMonthDeposit())}}</td>

                        <!-- Table data -->
                        <td>{{$item->courses->count()}}</td>

                        <!-- Table data -->



                        <td>
                            <a href="/admin/users/{{$item->id}}/login" class="btn btn-success-soft btn-round me-1 mb-0" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Message">

                                {{--                                    <i class="far fa-envelope-open"></i>--}}
                                {{--                                    <i class="fa-solid fa-asterisk"></i>--}}

                                {{--                                    <i class="fa fa-right-to-bracket"></i>--}}
                                <i class="fas fa-sign-in-alt"></i>
                                {{--                                    <i class="fa-regular fa-asterisk"></i>--}}
                            </a>
                            <a href="#" class="btn btn-secondary-soft btn-round me-1 mb-0" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Message">
                                {{--                                    <i class="fas fa-wallet"></i>--}}
                                <i class="far fa-envelope"></i>
                            </a>
                            <a href="/admin/users/{{$item->id}}/wallet"
                               class="btn btn-danger-soft btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Block">
                                {{--                                    <i class="fas fa-ban"></i>--}}
                                <i class="fas fa-wallet"></i>
                            </a>

                            <a href="/admin/statistics?user_id={{$item->id}}"

                                class="btn btn-primary-soft btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Block">
                                {{--                                    <i class="fas fa-ban"></i>--}}
                                <i class="fas fa-user-secret"></i>
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
