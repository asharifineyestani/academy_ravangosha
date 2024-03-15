<div>


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

    <div class="row g-4 mb-4">
        <!-- Box item -->


        <!-- Box item -->
        <div class="col-sm-6 col-md-6">

            <form wire:submit.prevent="deposit">
                @csrf
                <div class="card bg-warning bg-opacity-10 border rounded-3">

                    <div class="card-header bg-transparent border-bottom">
                        <h3 class="mb-0">واریز به کیف پول</h3>
                    </div>
                    <div class="card-body p-4">
                        <div class="mb-4 mt-2">
                            <div class="position-relative">
                                <label for="">متا واریز:</label>
                                <textarea wire:model.defer="deposit.meta" class="form-control" rows="2"
                                          placeholder="این واریز بابت چه چیزی انجام خواهد شد؟"></textarea>
                                @if ($errors->has('deposit.meta'))
                                    <div class="form-text text-danger">
                                        {{ $errors->first('deposit.meta') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="mb-4 mt-2">
                            <div class="position-relative">
                                <label for="">مبلغ واریزی:</label>
                                <input wire:model.defer="deposit.amount" type="number" class="form-control"
                                       placeholder="مبلغ به تومان"
                                       step="10000"
                                >
                                @if ($errors->has('deposit.amount'))
                                    <div class="form-text text-danger">
                                        {{ $errors->first('deposit.amount') }}
                                    </div>
                                @endif
                            </div>

                        </div>
                        <button class="btn btn-sm btn-warning mb-0 w-100" type="submit">واریز</button>

                    </div>
                </div>
            </form>


        </div>
        <div class="col-sm-6 col-md-6">

            <form wire:submit.prevent="withdraw">
                @csrf
                <div class="card bg-danger bg-opacity-10 border rounded-3">

                    <div class="card-header bg-transparent border-bottom">
                        <h3 class="mb-0">برداشت از کیف پول</h3>
                    </div>
                    <div class="card-body p-4">
                        <div class="mb-4 mt-2">
                            <div class="position-relative">
                                <label for="">متا برداشت:</label>
                                <textarea wire:model.defer="withdraw.meta" class="form-control" rows="2"
                                          placeholder="این برداشت بابت چه چیزی انجام خواهد شد؟"></textarea>
                                @if ($errors->has('withdraw.meta'))
                                    <div class="form-text text-danger">
                                        {{ $errors->first('withdraw.meta') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="mb-4 mt-2">
                            <div class="position-relative">
                                <label for="">مبلغ برداشتی:</label>
                                <input wire:model.defer="withdraw.amount" type="number" class="form-control"
                                       placeholder="مبلغ به تومان"
                                       step="10000"
                                >
                                @if ($errors->has('withdraw.amount'))
                                    <div class="form-text text-danger">
                                        {{ $errors->first('withdraw.amount') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <button class="btn btn-sm btn-danger mb-0 w-100" type="submit">برداشت</button>
                    </div>
                </div>
            </form>


        </div>
    </div>


    <div class="card bg-transparent border rounded-3">
        <!-- Card header START -->
        <div class="card-header bg-transparent border-bottom">
            <h3 class="mb-0">تراکنش ها</h3>
        </div>
        <!-- Card header END -->

        <!-- Card body START -->
        <div class="card-body">

            <!-- Title and select START -->
            <div class="row g-3 align-items-center justify-content-between mb-4">
                <!-- Content -->
                <div class="col-md-8">

                    <input class="form-control pe-5 bg-transparent" type="search" placeholder="جستجو"
                           aria-label="Search">
                    <button class="btn bg-transparent px-2 py-0 position-absolute top-50 end-0 translate-middle-y"
                            type="submit"><i class="fas fa-search fs-6 "></i></button>

                </div>

                <!-- Select option -->
                <div class="col-md-3">
                    <!-- Short by filter -->

                    <select class="form-select js-choice border-0 z-index-9 bg-transparent"
                            aria-label=".form-select-sm">
                        <option value="">فیلتر بر اساس</option>
                        <option>برداشت</option>
                        <option>واریز</option>
                    </select>

                </div>
            </div>
            <!-- Title and select END -->

            <!-- Payout list table START -->
            <div class="table-responsive border-0" id="gotoTable">
                <table class="table table-dark-gray align-middle p-4 mb-0 table-hover ">
                    <!-- Table head -->
                    <thead>
                    <tr>
                        <th scope="col" class="border-0 rounded-start">شماره سند</th>
                        <th scope="col" class="border-0">شرح</th>
                        <th scope="col" class="border-0">مقدار</th>
                        <th scope="col" class="border-0">نوع تراکنش</th>
                        <th scope="col" class="border-0 rounded-end">تاریخ</th>
                    </tr>
                    </thead>
                    <!-- Table body START -->
                    <tbody>


                    @foreach($user->transactions()->orderBy('id' , 'Desc')->get() as $transaction)
                        <tr>
                            <td>{{$transaction->id}}</td>
                            <!-- Table data -->
                            <td>
                                <h6 class="mt-2 mt-lg-0 mb-0"><a href="#">{{$transaction->meta[0]}}</a></h6>
                            </td>

                            <!-- Table data -->
                            <td>
                            <span class="@if($transaction->type == 'deposit') text-success @else text-danger @endif">
                                {{number_format($transaction->amount)}}
                            </span>
                            </td>

                            <!-- Table data -->
                            <td class="text-center text-sm-start">

                                @if($transaction->type == 'deposit')
                                    <span class="badge bg-success bg-opacity-10 text-success ">واریز</span>
                                @else
                                    <span class="badge bg-danger bg-opacity-10 text-danger ">برداشت</span>
                                @endif

                            </td>

                            <!-- Table data -->
                            <td>
                                {{verta($transaction->created_at)}}
                            </td>
                        </tr>
                    @endforeach


                    </tbody>
                    <!-- Table body END -->
                </table>
            </div>
            <!-- Payout list table END -->

            <!-- Pagination START -->
            <div class="d-sm-flex justify-content-sm-between align-items-sm-center mt-4 mt-sm-3">
                <!-- Content -->
                <p class="mb-0 text-center text-sm-start">Showing 1 to 8 of 20 entries</p>
                <!-- Pagination -->
                <nav class="d-flex justify-content-center mb-0" aria-label="navigation">
                    <ul class="pagination pagination-sm pagination-primary-soft d-inline-block d-md-flex rounded mb-0">
                        <li class="page-item mb-0"><a class="page-link" href="#" tabindex="-1"><i
                                    class="fas fa-angle-left"></i></a></li>
                        <li class="page-item mb-0"><a class="page-link" href="#">1</a></li>
                        <li class="page-item mb-0 active"><a class="page-link" href="#">2</a></li>
                        <li class="page-item mb-0"><a class="page-link" href="#">3</a></li>
                        <li class="page-item mb-0"><a class="page-link" href="#"><i class="fas fa-angle-right"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- Pagination END -->


        </div>
        <!-- Card body START -->
    </div>
</div>


<script>

    document.addEventListener('livewire:load', function () {


        Livewire.on('gotoTable', () => {

            setTimeout(function () {
                document.querySelector('#gotoTable').scrollIntoView({
                    behavior: 'smooth'
                });

                Livewire.emit('getUsers')


            }, 1500);





        })


    })


</script>
