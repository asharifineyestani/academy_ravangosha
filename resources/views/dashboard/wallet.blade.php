@extends('layouts.eduport.master_dashboard')
@section('main')

    <div class="row g-4 mb-4">
        <!-- Box item -->
        <div class="col-sm-6 col-md-4">
            <div class="border p-3 rounded-3 h-100">
                <div class="d-flex mb-1 justify-content-between align-items-center">
                    <h6 class="mb-0">موجودی کیف پول</h6>
                    <span class="badge bg-success bg-opacity-10 text-success ms-2 mb-0">تومان</span>
                </div>
                <div style="direction: ltr">
                    <h2 class="mb-2 mt-2">{{number_format(Auth::user()->balance)}}</h2>
                </div>

                <p class="mb-0"> به روز شده:
                    امروز
                    {{\Hekmatinasser\Verta\Verta::now()->format(' H:i')}}
                </p>
            </div>
        </div>

        <!-- Box item -->
        <div class="col-sm-6 col-md-4">
            <div class="border p-3 rounded-3 h-100">
                <div class="d-flex mb-1 justify-content-between align-items-center">
                    <h6 class="mb-0">خرید ماه جاری</h6>
                    <span class="badge bg-success bg-opacity-10 text-success ms-2 mb-0">تومان</span>
                </div>
                <div style="direction: ltr">
                    <h2 class="mb-2 mt-2 ">{{number_format(Auth::user()->lastMonthDeposit())}}</h2>
                </div>

                <a href="/student/transactions">مشاهده تاریخچه کیف پول</a>
            </div>
        </div>

        <!-- Box item -->
        <div class="col-sm-6 col-md-4">
            <form method="get" action="/payment">
                @csrf
                <div class="bg-primary bg-opacity-10 h-100 p-3 rounded-3">
                    <h6 class="mb-0">افزایش کیف پول</h6>
                    <div class="mb-2 mt-2">
                        <div class="position-relative">
                            <input type="number" name="amount" class="form-control" placeholder="مبلغ به تومان" step="10000"
                                   value="{{$amount}}">
                            <input type="hidden" name="backUrl" value="{{$backUrl}}" >
                            <img src="assets/images/client/visa.svg"
                                 class="w-40px position-absolute top-50 end-0 translate-middle-y me-2 d-none d-sm-block"
                                 alt="">
                        </div>
                    </div>
                    <button class="btn btn-sm btn-primary mb-0 w-100" type="submit">پرداخت</button>
                </div>
            </form>
        </div>
    </div>


@endsection
