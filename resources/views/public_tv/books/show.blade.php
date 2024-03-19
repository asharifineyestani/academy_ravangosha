@extends('layouts.tv.master')
@section('content')
    <section class="section section--head section--head-fixed section--gradient section--details-bg"
             style="margin-top: -40px;">
        <div class="section__bg" data-bg="/assets/img/details.jpg"></div>
        <div class="container">
            <!-- article -->
            <div class="article">
                <div class="row">
                    <div class="col-12 col-xl-8">

                        <!-- trailer -->
                        <a href="https://www.youtube.com/watch?v=5nme2JpcQi4" class="article__trailer open-video">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                 xmlns="../../www.w3.org/2000/svg.html">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M11 1C16.5228 1 21 5.47716 21 11C21 16.5228 16.5228 21 11 21C5.47716 21 1 16.5228 1 11C1 5.47716 5.47716 1 11 1Z"
                                      stroke-linecap="round" stroke-linejoin="round"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M14.0501 11.4669C13.3211 12.2529 11.3371 13.5829 10.3221 14.0099C10.1601 14.0779 9.74711 14.2219 9.65811 14.2239C9.46911 14.2299 9.28711 14.1239 9.19911 13.9539C9.16511 13.8879 9.06511 13.4569 9.03311 13.2649C8.93811 12.6809 8.88911 11.7739 8.89011 10.8619C8.88911 9.90489 8.94211 8.95489 9.04811 8.37689C9.07611 8.22089 9.15811 7.86189 9.18211 7.80389C9.22711 7.69589 9.30911 7.61089 9.40811 7.55789C9.48411 7.51689 9.57111 7.49489 9.65811 7.49789C9.74711 7.49989 10.1091 7.62689 10.2331 7.67589C11.2111 8.05589 13.2801 9.43389 14.0401 10.2439C14.1081 10.3169 14.2951 10.5129 14.3261 10.5529C14.3971 10.6429 14.4321 10.7519 14.4321 10.8619C14.4321 10.9639 14.4011 11.0679 14.3371 11.1549C14.3041 11.1999 14.1131 11.3999 14.0501 11.4669Z"
                                      stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                            معرفی ویدیویی
                        </a>
                        <!-- end trailer -->

                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-sm-4 col-xl-3">

                        <div class="card">
                            <a  class="card__cover">
                                <img src="{{$book->book_image_url}}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-8 col-xl-4">
                        <div class="card">
                            <h1>{{$book->title}}</h1>
                        </div>
                        <div class="card">
                            <ul class="text-md">
                                <li>
                                    <span>نویسنده:</span>
                                    <span class="text-primary">{{$book->author->name}}</span>
                                </li>
                                <li>
                                    <span>مترجم:</span>
                                    <span class="text-primary">{{$book->translator}}</span>
                                </li>
                                <li>
                                    <span>ناشر:</span>
                                    <span class="text-primary">{{$book->publication}}</span>
                                </li>
                            </ul>
                        </div>

                        <div class="card">
                            <!-- categories -->
                            <div class="categories">
                                <h3 class="categories__title">برچسب ها:</h3>
                                <a href="/tags" class="categories__item">توسعه فردی</a>
                                <a href="/tags" class="categories__item">موفقیت</a>
                            </div>
                            <!-- end categories -->
                        </div>
                    </div>
                    <div class="col-12 col-xl-5">
                        <div class="dashbox">
                            <div class="dashbox__title">
                                <h3>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path
                                                d="M21,2a1,1,0,0,0-1,1V5H18V3a1,1,0,0,0-2,0V4H8V3A1,1,0,0,0,6,3V5H4V3A1,1,0,0,0,2,3V21a1,1,0,0,0,2,0V19H6v2a1,1,0,0,0,2,0V20h8v1a1,1,0,0,0,2,0V19h2v2a1,1,0,0,0,2,0V3A1,1,0,0,0,21,2ZM6,17H4V15H6Zm0-4H4V11H6ZM6,9H4V7H6Zm10,9H8V13h8Zm0-7H8V6h8Zm4,6H18V15h2Zm0-4H18V11h2Zm0-4H18V7h2Z"></path>
                                    </svg>
                                    اطلاعات کتاب چاپ شده
                                </h3>


                            </div>

                            <div class="dashbox__table-wrap dashbox__table-wrap--1" data-scrollbar="true" tabindex="-1"
                                 style="overflow: hidden; outline: none;">

                                <div class="afc-book-detail">
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

                                <div class="scrollbar-track scrollbar-track-x show" style="display: none;">
                                    <div class="scrollbar-thumb scrollbar-thumb-x"
                                         style="width: 540px; transform: translate3d(0px, 0px, 0px);"></div>
                                </div>
                                <div class="scrollbar-track scrollbar-track-y show" style="display: none;">
                                    <div class="scrollbar-thumb scrollbar-thumb-y"
                                         style="height: 268px; transform: translate3d(0px, 0px, 0px);"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-xl-8">
                        <!-- comments and reviews -->
                        <div class="comments">
                            <!-- tabs nav -->
                            <ul class="nav nav-tabs comments__title comments__title--tabs" id="comments__tabs"
                                role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tab-description" role="tab"
                                       aria-controls="tab-description" aria-selected="true">
                                        <h4>معرفی کوتاه</h4>

                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1"
                                       aria-selected="true">
                                        <h4>دیدگاه ها</h4>
                                        <span>0</span>
                                    </a>
                                </li>


                            </ul>
                            <!-- end tabs nav -->

                            <!-- tabs -->
                            <div class="tab-content">
                                <!-- description -->
                                <div class="tab-pane fade show active" id="tab-description" role="tabpanel">
                                    <div class="card">
                                        <p>این کتاب فاقد متن معرفی می باشد</p>
                                    </div>
                                </div>
                                <!-- end description -->

                                <!-- comments -->
                                <div class="tab-pane fade show" id="tab-1" role="tabpanel">
{{--                                    @include('sections.comments')--}}


                                    <form action="#" class="comments__form">
                                        <div class="sign__group">
                                            <textarea id="text" name="text" class="sign__textarea"
                                                      placeholder="اگر قبلا این کتاب را خوانده اید دیدگاه خود را بیان کنید"></textarea>
                                        </div>
                                        <button type="button" class="sign__btn">ارسال دیدگاه</button>
                                    </form>
                                </div>
                                <!-- end comments -->

                                <!-- reviews -->

                                <!-- end reviews -->
                            </div>
                            <!-- end tabs -->
                        </div>
                        <!-- end comments and reviews -->
                    </div>

                    <div class="col-12 col-xl-4">
                        <div class="sidebar sidebar--mt">
                            <!-- subscribe -->

{{--                                                        @include('widgets.newsletter')--}}
                            <!-- end subscribe -->
                            {{--                            @include('widgets.similar_books')--}}
                            <!-- new items -->

                            <!-- end new items -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- end article -->
        </div>
    </section>
    <!-- end details -->

    <!-- similar -->
{{--    @include('sections.random_books')--}}
@endsection
