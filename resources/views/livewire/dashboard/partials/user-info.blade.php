<div class="row g-4 mb-4">
    <div class="col-lg-12 col-md-12">
        <div class="card shadow p-2">
            <div class="row g-0">
                <!-- Image -->
                <div class="col-md-2">
                    <img src="{{$user->avatar_path}}" class="rounded-3" alt="...">
                </div>

                <!-- Card body -->
                <div class="col-md-4 ">
                    <div class="card-body">
                        <!-- Title -->
                        <div class="d-sm-flex justify-content-sm-between mb-2 mb-sm-3">
                            <div>
                                <h5 class="card-title mb-4"><a href="#">{{$user->name}}</a></h5>

                                <ul class="list-inline mb-2">
                                    <li class=" me-3 mb-2 ">
                                        <span class="text-body fw-light">رول ها:</span>
                                        @foreach($user->roles as $role)
                                            <span class="h6 ">{{$role->name}}</span>
                                        @endforeach
                                    </li>

                                    <li class=" me-3 mb-2 ">
                                        <span class="text-body fw-light">تلفن همراه: </span>
                                        <span class="h6 ">{{$user->mobile}}</span>
                                    </li>

                                    <li class=" me-3 ">
                                        <span class="text-body fw-light">ایمیل:</span>
                                        <span class="h6">{{$user->email}}</span>
                                    </li>

                                </ul>


                            </div>
                            {{--                                <span class="h6 fw-light">--}}
                            {{--                                        <i class="fas fa-star text-warning ms-1"></i>--}}
                            {{--                                    {{$user->courses->count()}}--}}

                            {{--                                </span>--}}
                        </div>
                        <!-- Content -->

                        <!-- Info -->
                        <div class="d-sm-flex justify-content-sm-between align-items-center">
                            <!-- Title -->


                            <!-- Social button -->
                            {{--                                <ul class="list-inline mb-0 mt-3 mt-sm-0">--}}
                            {{--                                    <li class="list-inline-item">--}}
                            {{--                                        <a class="mb-0 me-1 text-facebook" href="#"><i--}}
                            {{--                                                class="fab fa-fw fa-facebook-f"></i></a>--}}
                            {{--                                    </li>--}}
                            {{--                                    <li class="list-inline-item">--}}
                            {{--                                        <a class="mb-0 me-1 text-instagram-gradient" href="#"><i--}}
                            {{--                                                class="fab fa-fw fa-instagram"></i></a>--}}
                            {{--                                    </li>--}}
                            {{--                                    <li class="list-inline-item">--}}
                            {{--                                        <a class="mb-0 me-1 text-twitter" href="#"><i class="fab fa-fw fa-twitter"></i></a>--}}
                            {{--                                    </li>--}}
                            {{--                                    <li class="list-inline-item">--}}
                            {{--                                        <a class="mb-0 text-linkedin" href="#"><i class="fab fa-fw fa-linkedin-in"></i></a>--}}
                            {{--                                    </li>--}}
                            {{--                                </ul>--}}
                        </div>
                    </div>
                </div>
                <div class="col-md-3 p-2">
                    <div
                        class="border p-3 rounded-3 h-100    @if (session()->has('withdraw'))bg-danger  @elseif(session()->has('deposit')) bg-success  @endif  bg-opacity-15">
                        <div class="d-flex mb-1 justify-content-between align-items-center">
                            <h6 class="mb-0">موجودی کیف پول</h6>
                            <span class="badge bg-success bg-opacity-10 text-success ms-2 mb-0">تومان</span>
                        </div>
                        <div style="direction: ltr">
                            <h2 class="mb-2 mt-2">{{number_format($user->balance)}}</h2>
                        </div>

                        <p class="mb-0"> به روز شده:
                            امروز
                            {{\Hekmatinasser\Verta\Verta::now()->format(' H:i')}}
                        </p>
                    </div>
                </div>
                <div class="col-md-3 p-2">
                    <div class="border p-3 rounded-3 h-100">
                        <div class="d-flex mb-1 justify-content-between align-items-center">
                            <h6 class="mb-0">خرید ماه جاری</h6>
                            <span class="badge bg-success bg-opacity-10 text-success ms-2 mb-0">تومان</span>
                        </div>
                        <div style="direction: ltr">
                            <h2 class="mb-2 mt-2 ">{{number_format($user->lastMonthDeposit())}}</h2>
                        </div>

                        <a href="/student/transactions">مشاهده تاریخچه کیف پول</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
