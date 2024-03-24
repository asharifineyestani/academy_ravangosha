@extends('layouts.edu.master')
@section('main')
    <main>

        <section class="bg-light position-relative" style="height: 320px">

            <!-- Svg decoration -->


            <div class="container position-relative">
                <div class="row">
                    <div class="col-12">
                        <div class="row align-items-center">

                            <!-- Image -->
                            <div class="col-6 col-md-3 text-center order-1">
                                <img src="assets/images/element/category-1.svg" alt="">
                            </div>

                            <!-- Content -->
                            <div class="col-md-6  text-center position-relative order-md-2 mb-5 mb-md-0">

                                <!-- Svg decoration -->


                                <!-- Svg decoration -->


                                <!-- Title -->
                                <h1 class="mb-3" style="margin-top: -100px">پژوهش های روانشناسی</h1>
                                <p class="mb-3 h6">در روانگشا همواره می توانید از آخرین پژوهش های معتبر روانشناسی مطلع شوید.</p>

                                <!-- Search -->

                            </div>

                            <!-- Image -->
                            <div class="col-6 col-md-3 text-center order-3" style="margin-top: 40px">
                                <img src="assets/images/element/category-2.svg" alt="">
                            </div>

                        </div> <!-- Row END -->
                    </div>
                </div> <!-- Row END -->
            </div>
        </section>

        <!-- =======================
        Page Banner START -->
        <section class="py-5">
            <div class="container">
                <div class="row position-relative">
                    <!-- SVG decoration -->


                    <!-- Title and breadcrumb -->
                    <div class="col-lg-10 mx-auto text-center position-relative">
                        <!-- SVG decoration -->


                        <!-- SVG decoration -->


                        <!-- Title -->

                    </div>
                </div>
            </div>
        </section>
        <!-- =======================
        Page Banner END -->

        <!-- =======================
        Page content START -->
        <section class="position-relative pt-0 pt-lg-5">
            <div class="container">
                <div class="row g-4">
                    <!-- Card item START -->

                    <!-- Card item END -->


                    @foreach($items as $item)
                    <!-- Card item START -->
                    <div class="col-sm-6 col-lg-4 col-xl-3">
                        <div class="card bg-transparent">
                            <a href="/articles/{{$item->id}}">
                            <div class="overflow-hidden rounded-3">

                                <img src="/storage/{{$item->image_url}}" class="card-img" alt="course image">

                                <div class="bg-overlay bg-dark opacity-4"></div>

                            </div>
                            </a>

                            <!-- Card body -->
                            <div class="card-body">
                                <!-- Title -->
                                <h5 class="card-title"><a href="/articles/{{$item->id}}">{{$item->title}}</a></h5>
                                <p class="text-truncate-2">{{excerpt($item->body , 500)}}</p>
                                <!-- Info -->
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-0"><a href="/articles/{{$item->id}}">بیشتر</a></h6>
{{--                                    <span class="small">12H Ago</span>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card item END -->
                    @endforeach


                </div> <!-- Row end -->

                <!-- Pagination START -->
                <nav class="d-flex justify-content-center mt-5" aria-label="navigation">
                    <ul class="pagination pagination-primary-soft rounded mb-0">
                        <li class="page-item mb-0"><a class="page-link" href="#" tabindex="-1"><i class="fas fa-angle-double-left"></i></a></li>
                        <li class="page-item mb-0"><a class="page-link" href="#">1</a></li>
                        <li class="page-item mb-0 active"><a class="page-link" href="#">2</a></li>
                        <li class="page-item mb-0"><a class="page-link" href="#">..</a></li>
                        <li class="page-item mb-0"><a class="page-link" href="#">6</a></li>
                        <li class="page-item mb-0"><a class="page-link" href="#"><i class="fas fa-angle-double-right"></i></a></li>
                    </ul>
                </nav>
                <!-- Pagination END -->

            </div>
        </section>
        <!-- =======================
        Page content END -->

        @include('public.sections.cta_subscribe')
    </main>
@endsection
