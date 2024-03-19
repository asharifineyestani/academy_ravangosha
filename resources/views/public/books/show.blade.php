@extends('layouts.edu.master')
@section('main')
    <main>

        <!-- =======================
        Page content START -->
        <section class="pt-5">
            <div class="container" data-sticky-container>
                <div class="row g-4 g-sm-5">

                    <!-- Left sidebar START -->
                    <div class="col-xl-4">
                        <div data-sticky data-margin-top="80" data-sticky-for="992">
                            <div class="row justify-content-center">
                                <div class="col-md-8 col-xl-12">

                                    <!-- Card START -->
                                    <div class="card shadow">
                                        <!-- Image -->
                                        <div class="rounded-3">
                                            <img src="{{$book->book_image_url}}" class="card-img-top" alt="book image">
                                        </div>

                                        <!-- Card body -->
                                        <div class="card-body pb-3">
                                            <!-- Buttons and price -->
                                            <div class="text-center">
                                                <!-- Buttons -->
                                                @if($book->stock)
                                                <p>{{toman($book->stock->price)}} </p>
                                                @endif



                                                @if(isBookAvailable($book->id))
                                                    <a href="/cart/add?book_stock_id={{$book->stock->id}}" class="btn btn-success-soft mb-2 mb-sm-0 me-00 me-sm-3"><i
                                                            class="bi bi-cart3 me-2"></i><span>خرید</span></a>
                                                @else
                                                    <span class="btn btn-danger-soft mb-2 mb-sm-0 me-00 me-sm-3"><span>ناموجود</span></span>
                                                @endif
                                                <a href="#" class="btn btn-light mb-0"><i
                                                        class="bi bi-bookmark me-2"></i><span>اضافه به علاقه مندی ها</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card END -->

                                </div>
                            </div> <!-- Row End -->
                        </div>
                    </div>
                    <!-- Left sidebar END -->

                    <!-- Main content START -->
                    <div class="col-xl-8">

                        <!-- Title -->
                        <h1 class="mb-4">{{$book->title}}</h1>

                        <!-- Rating -->
                        <div class="d-flex align-items-center mb-4">
                            <h2 class="me-3 mb-0">4.5</h2>
                            <div>
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i>
                                    </li>
                                    <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i>
                                    </li>
                                    <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i>
                                    </li>
                                    <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i>
                                    </li>
                                    <li class="list-inline-item me-0 small"><i
                                            class="fas fa-star-half-alt text-warning"></i></li>
                                </ul>
                                <p class="mb-0 small mt-n1">بر اساس نظر خوانندگان کتاب</p>
                            </div>
                        </div>

                        <!-- Price Item START -->

                        <!-- Price Item END -->

                        <!-- Content -->

                        <div class="afc-book-detail mb-6">

                            <div class="row">
                                <div class="col  col-sm-4">
                                    <span>شناسه کتاب</span>
                                </div>
                                <div class="col col-sm-8">
                                    <span>{{$book->id}}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col  col-sm-4">
                                    <span>تاریخ انتشار</span>
                                </div>
                                <div class="col col-sm-8">
                                    <span>{{$book->publish_date}}</span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col col-sm-4">
                                    <span>شابک</span>
                                </div>
                                <div class="col col-sm-8">
                                    <span>{{$book->isbn}}</span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col col-sm-4">
                                    <span>نوع جلد</span>
                                </div>
                                <div class="col col-sm-8">
                                    <span>{{$book->cover_type}}</span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col col-sm-4">
                                    <span>قطع</span>
                                </div>
                                <div class="col col-sm-8">
                                    <span>{{$book->size}}</span>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col col-sm-4">
                                    <span>تعداد صفحه</span>
                                </div>
                                <div class="col col-sm-8">
                                    <span>{{$book->page_count}}</span>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col col-sm-4">
                                    <span>سری چاپ</span>
                                </div>
                                <div class="col col-sm-8">
                                    <span>{{$book->print_number}}</span>
                                </div>
                            </div>

                        </div>


                        <!-- Additional info -->


                        <!-- Book detail START -->
                        <div class="col-12">
                            <!-- Tabs START -->
                            <ul class="nav nav-pills nav-pills-bg-soft px-3" id="book-pills-tab" role="tablist">
                                <!-- Tab item -->
                                <li class="nav-item me-2 me-sm-4" role="presentation">
                                    <button class="nav-link mb-0 active" id="book-pills-tab-1" data-bs-toggle="pill"
                                            data-bs-target="#book-pills-1" type="button" role="tab"
                                            aria-controls="book-pills-1" aria-selected="true">نویسنده
                                    </button>
                                </li>
                                <!-- Tab item -->
                                <li class="nav-item me-2 me-sm-4" role="presentation">
                                    <button class="nav-link mb-0" id="book-pills-tab-2" data-bs-toggle="pill"
                                            data-bs-target="#book-pills-2" type="button" role="tab"
                                            aria-controls="book-pills-2" aria-selected="false">بازخوردها
                                    </button>
                                </li>
                                <!-- Tab item -->
                                <li class="nav-item me-2 me-sm-4" role="presentation">
                                    <button class="nav-link mb-0" id="book-pills-tab-3" data-bs-toggle="pill"
                                            data-bs-target="#book-pills-3" type="button" role="tab"
                                            aria-controls="book-pills-3" aria-selected="false">معرفی کتاب
                                    </button>
                                </li>
                            </ul>
                            <!-- Tabs END -->

                            <!-- Tab contents START -->
                            <div class="tab-content pt-4 px-3" id="book-pills-tabContent">
                                <!-- Content START -->
                                <div class="tab-pane fade show active" id="book-pills-1" role="tabpanel"
                                     aria-labelledby="book-pills-tab-1">
                                    <div class="row g-4">
                                        <div class="col-md-3">
                                            <img src="/{{$book->author->image_url}}" class="rounded-3" alt="">
                                        </div>
                                        <div class="col-md-9">
                                            <div class="d-sm-flex justify-content-sm-between">

                                                <!-- Title -->
                                                <div class="mb-3">
                                                    <h3 class="mb-0">{{$book->author->name}}</h3>
                                                    <span>نویسنده</span>
                                                </div>

                                                <!-- Social icon -->

                                            </div>
                                            <!-- Content -->
                                            <P class="mt-3 mt-sm-0 mb-0">در دیتابیس روانگشا هنوز هیچ اطلاعاتی مبنی بر
                                                بیوگرافی این نویسنده وجود ندارد</P>
                                        </div>
                                    </div>
                                </div>
                                <!-- Content END -->

                                <!-- Content START -->
                                <div class="tab-pane fade" id="book-pills-2" role="tabpanel"
                                     aria-labelledby="book-pills-tab-2">
                                    <!-- Review START -->
                                    <div class="row mb-4">
                                        <h4 class="mb-4">بازخورد خوانندگان کتاب</h4>

                                        <!-- Rating info -->
                                        <div class="col-md-4 mb-3 mb-md-0">
                                            <div class="text-center">
                                                <!-- Info -->
                                                <h2 class="mb-0">4.5</h2>
                                                <!-- Star -->
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item me-0"><i
                                                            class="fas fa-star text-warning"></i></li>
                                                    <li class="list-inline-item me-0"><i
                                                            class="fas fa-star text-warning"></i></li>
                                                    <li class="list-inline-item me-0"><i
                                                            class="fas fa-star text-warning"></i></li>
                                                    <li class="list-inline-item me-0"><i
                                                            class="fas fa-star text-warning"></i></li>
                                                    <li class="list-inline-item me-0"><i
                                                            class="fas fa-star-half-alt text-warning"></i></li>
                                                </ul>
                                                <p class="mb-0">(بر اساس ۱۵۵ بازخورد)</p>
                                            </div>
                                        </div>

                                        <!-- Progress-bar and star -->
                                        <div class="col-md-8">
                                            <div class="row align-items-center text-center">
                                                <!-- Progress bar and Rating -->
                                                <div class="col-6 col-sm-8">
                                                    <!-- Progress item -->
                                                    <div class="progress progress-sm bg-warning bg-opacity-15">
                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                             style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                                                             aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6 col-sm-4">
                                                    <!-- Star item -->
                                                    <ul class="list-inline mb-0">
                                                        <li class="list-inline-item me-0 small"><i
                                                                class="fas fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0 small"><i
                                                                class="fas fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0 small"><i
                                                                class="fas fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0 small"><i
                                                                class="fas fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0 small"><i
                                                                class="fas fa-star text-warning"></i></li>
                                                    </ul>
                                                </div>

                                                <!-- Progress bar and Rating -->
                                                <div class="col-6 col-sm-8">
                                                    <!-- Progress item -->
                                                    <div class="progress progress-sm bg-warning bg-opacity-15">
                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                             style="width: 80%" aria-valuenow="80" aria-valuemin="0"
                                                             aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6 col-sm-4">
                                                    <!-- Star item -->
                                                    <ul class="list-inline mb-0">
                                                        <li class="list-inline-item me-0 small"><i
                                                                class="fas fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0 small"><i
                                                                class="fas fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0 small"><i
                                                                class="fas fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0 small"><i
                                                                class="fas fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0 small"><i
                                                                class="far fa-star text-warning"></i></li>
                                                    </ul>
                                                </div>

                                                <!-- Progress bar and Rating -->
                                                <div class="col-6 col-sm-8">
                                                    <!-- Progress item -->
                                                    <div class="progress progress-sm bg-warning bg-opacity-15">
                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                             style="width: 60%" aria-valuenow="60" aria-valuemin="0"
                                                             aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6 col-sm-4">
                                                    <!-- Star item -->
                                                    <ul class="list-inline mb-0">
                                                        <li class="list-inline-item me-0 small"><i
                                                                class="fas fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0 small"><i
                                                                class="fas fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0 small"><i
                                                                class="fas fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0 small"><i
                                                                class="far fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0 small"><i
                                                                class="far fa-star text-warning"></i></li>
                                                    </ul>
                                                </div>

                                                <!-- Progress bar and Rating -->
                                                <div class="col-6 col-sm-8">
                                                    <!-- Progress item -->
                                                    <div class="progress progress-sm bg-warning bg-opacity-15">
                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                             style="width: 40%" aria-valuenow="40" aria-valuemin="0"
                                                             aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6 col-sm-4">
                                                    <!-- Star item -->
                                                    <ul class="list-inline mb-0">
                                                        <li class="list-inline-item me-0 small"><i
                                                                class="fas fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0 small"><i
                                                                class="fas fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0 small"><i
                                                                class="far fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0 small"><i
                                                                class="far fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0 small"><i
                                                                class="far fa-star text-warning"></i></li>
                                                    </ul>
                                                </div>

                                                <!-- Progress bar and Rating -->
                                                <div class="col-6 col-sm-8">
                                                    <!-- Progress item -->
                                                    <div class="progress progress-sm bg-warning bg-opacity-15">
                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                             style="width: 20%" aria-valuenow="20" aria-valuemin="0"
                                                             aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6 col-sm-4">
                                                    <!-- Star item -->
                                                    <ul class="list-inline mb-0">
                                                        <li class="list-inline-item me-0 small"><i
                                                                class="fas fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0 small"><i
                                                                class="far fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0 small"><i
                                                                class="far fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0 small"><i
                                                                class="far fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0 small"><i
                                                                class="far fa-star text-warning"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Review END -->

                                    <!-- Student review START -->
                                    <div class="row">
                                        <!-- Review item START -->
                                        <div class="d-md-flex my-4">
                                            <!-- Avatar -->
                                            <div class="avatar avatar-xl me-4 flex-shrink-0">
                                                <img class="avatar-img rounded-circle" src="assets/images/avatar/09.jpg"
                                                     alt="avatar">
                                            </div>
                                            <!-- Text -->
                                            <div>
                                                <div class="d-sm-flex mt-1 mt-md-0 align-items-center">
                                                    <h5 class="me-3 mb-0">Jacqueline Miller</h5>
                                                    <!-- Review star -->
                                                    <ul class="list-inline mb-0">
                                                        <li class="list-inline-item me-0"><i
                                                                class="fas fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0"><i
                                                                class="fas fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0"><i
                                                                class="fas fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0"><i
                                                                class="fas fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0"><i
                                                                class="far fa-star text-warning"></i></li>
                                                    </ul>
                                                </div>
                                                <!-- Info -->
                                                <p class="small mb-2">2 days ago</p>
                                                <p class="mb-2">Perceived end knowledge certainly day sweetness why
                                                    cordially. Ask a quick six seven offer see among. Handsome met
                                                    debating sir dwelling age material. As style lived he worse dried.
                                                    Offered related so visitors we private removed. Moderate do subjects
                                                    to distance. </p>

                                                <!-- Reply button -->
                                                <a href="#" class="text-body mb-0"><i class="fas fa-reply me-2"></i>Reply</a>
                                            </div>
                                        </div>
                                        <!-- Divider -->
                                        <hr>
                                        <!-- Review item END -->

                                        <!-- Review item START -->
                                        <div class="d-md-flex my-4">
                                            <!-- Avatar -->
                                            <div class="avatar avatar-xl me-4 flex-shrink-0">
                                                <img class="avatar-img rounded-circle" src="assets/images/avatar/07.jpg"
                                                     alt="avatar">
                                            </div>
                                            <!-- Text -->
                                            <div>
                                                <div class="d-sm-flex mt-1 mt-md-0 align-items-center">
                                                    <h5 class="me-3 mb-0">Dennis Barrett</h5>
                                                    <!-- Review star -->
                                                    <ul class="list-inline mb-0">
                                                        <li class="list-inline-item me-0"><i
                                                                class="fas fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0"><i
                                                                class="fas fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0"><i
                                                                class="fas fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0"><i
                                                                class="fas fa-star text-warning"></i></li>
                                                        <li class="list-inline-item me-0"><i
                                                                class="far fa-star text-warning"></i></li>
                                                    </ul>
                                                </div>
                                                <!-- Info -->
                                                <p class="small mb-2">2 days ago</p>
                                                <p class="mb-2">Handsome met debating sir dwelling age material. As
                                                    style lived he worse dried. Offered related so visitors we private
                                                    removed. Moderate do subjects to distance. </p>
                                                <!-- Reply button -->
                                                <a href="#" class="text-body mb-0"><i class="fas fa-reply me-2"></i>Reply</a>
                                            </div>
                                        </div>
                                        <!-- Review item END -->
                                        <!-- Divider -->
                                        <hr>
                                    </div>
                                    <!-- Student review END -->

                                    <!-- Leave Review START -->
                                    <div class="mt-2">
                                        <h5 class="mb-4">Leave a Review</h5>
                                        <form class="row g-3">
                                            <!-- Name -->
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" id="inputtext"
                                                       placeholder="Name" aria-label="First name">
                                            </div>
                                            <!-- Email -->
                                            <div class="col-md-6">
                                                <input type="email" class="form-control" placeholder="Email"
                                                       id="inputEmail4">
                                            </div>
                                            <!-- Rating -->
                                            <div class="col-12">
                                                <select id="inputState2" class="form-select  js-choice">
                                                    <option selected="">★★★★★ (5/5)</option>
                                                    <option>★★★★☆ (4/5)</option>
                                                    <option>★★★☆☆ (3/5)</option>
                                                    <option>★★☆☆☆ (2/5)</option>
                                                    <option>★☆☆☆☆ (1/5)</option>
                                                </select>
                                            </div>
                                            <!-- Message -->
                                            <div class="col-12">
                                                <textarea class="form-control" id="exampleFormControlTextarea1"
                                                          placeholder="Your review" rows="3"></textarea>
                                            </div>
                                            <!-- Button -->
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary mb-0">Post Review</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- Leave Review END -->

                                </div>
                                <!-- Content END -->

                                <!-- Content START -->
                                <div class="tab-pane fade" id="book-pills-3" role="tabpanel"
                                     aria-labelledby="book-pills-tab-3">

                                    <p>{{$book->body}}</p>

                                    <!-- Process START -->

                                    <!-- Process END -->

                                    <!-- Content -->
                                    <p>{{$book->body}}</p>


                                </div>
                                <!-- Content END -->
                            </div>
                            <!-- Tab contents END -->
                        </div>
                        <!-- Book detail END -->
                    </div>
                    <!-- Main content END -->
                </div> <!-- Row END -->
            </div>
        </section>
        <!-- =======================
        Page content END -->

    </main>
@endsection
