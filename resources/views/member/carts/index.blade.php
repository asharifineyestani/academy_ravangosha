@extends('layouts.edu.master')
@section('main')
    <main>

        <!-- =======================
        Page Banner START -->
        <section class="py-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="bg-light p-4 text-center rounded-3">
                            <h1 class="m-0">سبد خرید</h1>
                            <!-- Breadcrumb -->
                            <div class="d-flex justify-content-center">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb breadcrumb-dots mb-0">
                                        <li class="breadcrumb-item"><a href="/">برگ نخست</a></li>
                                        <li class="breadcrumb-item"><a href="/books">فروشگاه کتاب</a></li>

                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- =======================
        Page Banner END -->

        <!-- =======================
        Page content START -->
        <section class="pt-5">
            <div class="container">

                <div class="row g-4 g-sm-5">
                    <!-- Main content START -->
                    <div class="col-lg-8 mb-4 mb-sm-0">
                        <div class="card card-body p-4 shadow">
                            <!-- Alert -->


                            <div class="table-responsive border-0 rounded-3">
                                <!-- Table START -->
                                <table class="table align-middle p-4 mb-0">
                                    <!-- Table head -->
                                    <!-- Table body START -->
                                    <tbody class="border-top-0">
                                    <!-- Table item -->


                                    @if(count(carts()) < 1)
                                        <div class="alert alert-info alert-dismissible fade show mt-2 mt-4 rounded-3" role="alert">
                                            <!-- Avatar -->

                                            <!-- Info -->
                                           سبد خرید شما خالی است.


                                        </div>
                                    @endif




                                    @foreach(carts() as $item)
                                        <tr>
                                            <!-- Course item -->
                                            <td>
                                                <div class="d-lg-flex align-items-center">
                                                    <!-- Image -->
                                                    <div class="w-100px w-md-80px mb-2 mb-md-0">
                                                        <img src="{{$item->stock->book->book_image_url}}"
                                                             class="rounded" alt="">
                                                    </div>
                                                    <!-- Title -->
                                                    <h6 class="mb-0 ms-lg-3 mt-2 mt-lg-0">
                                                        <a href="#">{{$item->stock->book->title}}</a>
                                                    </h6>
                                                </div>
                                            </td>

                                            <!-- Amount item -->
                                            <td class="text-center">
                                                <h5 class="text-success mb-0">{{toman($item->stock->price * $item->quantity)}}</h5>
                                            </td>
                                            <!-- Action item -->
                                            <td>
                                                <a href="/cart/increase/{{$item->id}}"
                                                   class="btn btn-sm btn-success-soft px-2 me-1 mb-1 mb-md-0">
                                                    <i class="fas fa-fw fa-plus"></i></a>


                                                <span class=" px-2 me-1 mb-1 mb-md-0">
                                                {{$item->quantity}}</span>

                                                @if($item->quantity > 1)

                                                    <a href="/cart/decrease/{{$item->id}}"
                                                       class="btn btn-sm btn-danger-soft px-2 me-1 mb-1 mb-md-0">
                                                        <i class="fas fa-fw fa-minus"></i></a>

                                                @else
                                                    <a title="حذف از سبد خرید" href="/cart/remove/{{$item->id}}"
                                                       class="btn btn-sm btn-danger-soft px-2 mb-0"><i
                                                            class="fas fa-fw fa-times"></i></a>
                                                @endif


                                            </td>
                                        </tr>
                                    @endforeach
                                    <!-- Table item -->

                                    </tbody>
                                </table>
                            </div>

                            <!-- Coupon input and button -->

                        </div>
                    </div>
                    <!-- Main content END -->

                    <!-- Right sidebar START -->
                    <div class="col-lg-4">
                        <!-- Card total START -->
                        <div class="card card-body p-4 shadow">
                            <!-- Title -->
{{--                            <h4 class="mb-3">Cart Total</h4>--}}

                            <!-- Price and detail -->
                            <ul class="list-group list-group-borderless mb-2">
                                <li class="list-group-item px-0 d-flex justify-content-between">
                                    <span class="h6 fw-light mb-0">تعداد کالا ها</span>
                                    <span class="h6 fw-light mb-0 fw-bold">{{getTotalQuantity()}}</span>
                                </li>
{{--                                <li class="list-group-item px-0 d-flex justify-content-between">--}}
{{--                                    <span class="h6 fw-light mb-0">Coupon Discount</span>--}}
{{--                                    <span class="text-danger">-$20</span>--}}
{{--                                </li>--}}
                                <li class="list-group-item px-0 d-flex justify-content-between">
                                    <span class="h5 mb-0">جمع</span>
                                    <span class="h5 mb-0">{{toman(getTotalPrice())}}</span>
                                </li>
                            </ul>

                            <!-- Button -->
                            <div class="d-grid">
                                <a href="checkout.html" class="btn btn-lg btn-success">تایید و تکمیل سفارش</a>
                            </div>

                            <!-- Content -->
{{--                            <p class="small mb-0 mt-2 text-center">By completing your purchase, you agree to these <a--}}
{{--                                    href="#"><strong>Terms of Service</strong></a></p>--}}

                        </div>
                        <!-- Card total END -->
                    </div>
                    <!-- Right sidebar END -->

                </div><!-- Row END -->
            </div>
        </section>
        <!-- =======================
        Page content END -->

    </main>
@endsection
