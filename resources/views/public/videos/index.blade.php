@extends('layouts.edu.master')
@section('main')
    <main>

        <!-- =======================
        Page Banner START -->

        <!-- =======================
        Page Banner END -->

        <!-- =======================
        Page content START -->
        <section class="pb-0 py-sm-5">
            <div class="container">
                <!-- Title and select START -->
                <div class="row g-3 align-items-center mb-4">
                    <!-- Content -->
                    <div class="col-md-4">
                        <h4 class="mb-0">محتوای ویدیویی</h4>
                    </div>

                    <!-- Select option -->
{{--                    @include('public.videos.sections.header_options')--}}

                </div>
                <!-- Title and select END -->

                <div class="row">
                    <!-- Main content START -->
                    <div class="col-xl-12 col-xxl-12">

                        <!-- Course list START -->
                        <div class="row g-4">
                            <!-- Card list START -->

                            @foreach($items as $item)
                               @include('public.videos.sections.video_post')
                            @endforeach
                            <!-- Card list END -->

                            <!-- Card list END -->
                        </div>
                        <!-- Course list END -->

                        <!-- Pagination START -->
                        <div class="col-12">
                            <nav class="mt-4 d-flex justify-content-center" aria-label="navigation">
                                <ul class="pagination pagination-primary-soft d-inline-block d-md-flex rounded mb-0">
                                    <li class="page-item mb-0"><a class="page-link" href="#" tabindex="-1"><i
                                                class="fas fa-angle-double-left"></i></a></li>
                                    <li class="page-item mb-0"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item mb-0 active"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item mb-0"><a class="page-link" href="#">..</a></li>
                                    <li class="page-item mb-0"><a class="page-link" href="#">6</a></li>
                                    <li class="page-item mb-0"><a class="page-link" href="#"><i
                                                class="fas fa-angle-double-right"></i></a></li>
                                </ul>
                            </nav>
                        </div>
                        <!-- Pagination END -->
                    </div>
                    <!-- Main content END -->

                    <!-- Right sidebar START -->
{{--                   @include('public.videos.sections.sidebar')--}}
                    <!-- Right sidebar END -->

                </div><!-- Row END -->
            </div>
        </section>
        <!-- =======================
        Page content END -->

        <!-- =======================
        Newsletter START -->
        @include('public.videos.sections.subscribe')
        <!-- =======================
        Newsletter END -->

    </main>
@endsection
