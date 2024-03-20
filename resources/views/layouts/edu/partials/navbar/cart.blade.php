<li class="nav-item ms-2 dropdown position-relative overflow-visible">
    <!-- Cart button -->
    <a class="nav-link mb-0 stretched-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
        <i class="bi bi-cart2 fs-4"></i>
    </a>
    <!-- badge -->
    <span class="position-absolute top-0 start-100 translate-middle badge rounded-circle text-bg-success mt-2 mt-xl-3 ms-n3 smaller">{{getTotalQuantity()}}
								<span class="visually-hidden">unread messages</span>
							</span>

    <!-- Cart dropdown menu START -->
    <div class="dropdown-menu dropdown-animation dropdown-menu-end dropdown-menu-size-md p-0 shadow-lg border-0">
        <div class="card bg-transparent">
            <div class="card-header bg-transparent border-bottom py-4">
                <h5 class="m-0">سبد خرید</h5>
            </div>
            <div class="card-body p-0">

                <!-- Cart item START -->

                @foreach(carts() as $item)
                    <div class="row p-3 g-2">
                        <!-- Image -->
                        <div class="col-3">
                            <img class="rounded-2" src="{{$item->stock->book->book_image_url}}" alt="avatar">
                        </div>

                        <div class="col-9">
                            <!-- Title -->
                            <div class="d-flex justify-content-between">
                                <h6 class="m-0">کتاب اثر مرکب</h6>


                            </div>

                            <div>
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

                            </div>
                            <!-- Select item -->
                        </div>
                    </div>
                @endforeach

                <!-- Cart item END -->

            </div>
            <!-- Button -->
            <div class="card-footer bg-transparent border-top py-3 text-center d-flex justify-content-between position-relative">
                <span href="#" class=" mb-0">قابل پرداخت: <span>{{toman(getTotalPrice())}}</span></span>
                <a href="/checkout/cart" class="btn btn-sm btn-success mb-0">ثبت سفارش</a>
            </div>
        </div>
    </div>
    <!-- Cart dropdown menu END -->
</li>
