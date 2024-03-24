@extends('layouts.edu.master')
@section('main')

    <main>

        <!-- =======================
        Page content START -->
        <section class="pt-3 pt-xl-5">
            <div class="container" data-sticky-container>
                <div class="row g-4">
                    <!-- Main content START -->
                    <div class="col-xl-12">

                        <div class="row g-4">
                            <!-- Title START -->
                            <div class="col-12">
                                <!-- Title -->
                                <h2>{{$video->title}}</h2>

                                <!-- Content -->
                                <ul class="list-inline mb-0">

                                    <li class="list-inline-item fw-light h6 me-3 mb-1 mb-sm-0"><i
                                            class="fas fa-user-graduate me-2"></i>۲۴۰۰۰ بازدید
                                    </li>
                                    <li class="list-inline-item fw-light h6 me-3 mb-1 mb-sm-0"><i
                                            class="fas fa-signal me-2"></i>توسعه فردی
                                    </li>
                                    <li class="list-inline-item fw-light h6 me-3 mb-1 mb-sm-0"><i
                                            class="bi bi-patch-exclamation-fill me-2"></i>تاریخ ساخت 1403/02/03
                                    </li>
                                    <li class="list-inline-item fw-light h6"><i class="fas fa-globe me-2"></i>فارسی
                                    </li>
                                </ul>
                            </div>
                            <!-- Title END -->

                            <!-- Image and video -->
                            <div class="col-12 position-relative">
                                <div class="video-player rounded-3">
                                    <video controls crossorigin="anonymous" playsinline
                                           poster="{{$video->image_url}}">
                                        <source src="{{$video->link}}" type="video/mp4" size="360">
                                        <source src="{{$video->link}}" type="video/mp4" size="720">
                                        <source src="{{$video->link}}" type="video/mp4" size="1080">
                                        <!-- Caption files -->
                                        <track kind="captions" label="English" srclang="en"
                                               src="assets/images/videos/en.vtt" default>
                                        <track kind="captions" label="French" srclang="fr"
                                               src="assets/images/videos/fr.vtt">
                                    </video>
                                </div>
                            </div>

                            <!-- About course START -->
                            <div class="col-12">
                                <div class="card border">
                                    <!-- Card header START -->
                                    <div class="card-header border-bottom">
                                        <h3 class="mb-0">معرفی ویدیو</h3>
                                    </div>
                                    <!-- Card header END -->

                                    <!-- Card body START -->
                                   <div class="card-body">
                                       <p>{{$video->description}}</p>
                                   </div>
                                    <!-- Card body START -->
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Main content END -->

                    <!-- Right sidebar START -->

                    <!-- Right sidebar END -->

                </div><!-- Row END -->
            </div>
        </section>
        <!-- =======================
        Page content END -->

    </main>
@endsection

