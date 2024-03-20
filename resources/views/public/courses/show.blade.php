@extends('layouts.edu.master')
@section('main')
    <section class="pt-3 pt-xl-5">
        <div class="container" data-sticky-container>
            <div class="row g-4">


                <div class="col-xl-8">

                    <div class="row g-4">
                        <!-- Title START -->
                        <div class="col-12">
                            <!-- Title -->
                            <h2>{{$course->title}}</h2>
                            <p>{{$course->excerpt}}</p>
                            <!-- Content -->
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item fw-light h6 me-3 mb-1 mb-sm-0"><i
                                        class="fas fa-star me-2"></i>{{$course->comments->avg('star')}}
                                </li>
                                <li class="list-inline-item fw-light h6 me-3 mb-1 mb-sm-0"><i
                                        class="fas fa-user-graduate me-2"></i>دانشجویان: {{$course->users->count()}}
                                </li>
                                @if($course->prerequisites)
                                    <li class="list-inline-item fw-light h6 me-3 mb-1 mb-sm-0"><i
                                            class="fas fa-signal me-2"></i>پیش نیاز:{{$course->prerequisites}}
                                    </li>
                                @endif

                                <li class="list-inline-item fw-light h6 me-3 mb-1 mb-sm-0"><i
                                        class="bi bi-patch-exclamation-fill me-2"></i>
                                    <span>آخرین به روزرسانی:

                                        {{\Hekmatinasser\Verta\Verta::instance($course->updated_at)->format('%d %B ساعت H:i')}}
                                    </span>

                                </li>
                                <li class="list-inline-item fw-light h6"><i class="fas fa-globe me-2"></i>فارسی</li>
                            </ul>
                        </div>
                        <!-- Title END -->

                        <!-- Image and video -->

                        @if($course->intro_path)
                            <div class="col-12 position-relative">
                                <div class="video-player rounded-3">
                                    <video controls crossorigin="anonymous" playsinline
                                           poster="{{$course->thumbnail_path}}">
                                        {{--                                    <source src="assets/images/videos/360p.mp4" type="video/mp4" size="360">--}}
                                        {{--                                    <source src="assets/images/videos/720p.mp4" type="video/mp4" size="720">--}}
                                        <source src="{{$course->intro_path}}" type="video/mp4" size="1080">
                                        <!-- Caption files -->
                                        <track kind="captions" label="English" srclang="en"
                                               src="assets/images/videos/en.vtt" default>
                                        <track kind="captions" label="French" srclang="fr"
                                               src="assets/images/videos/fr.vtt">
                                    </video>
                                </div>
                            </div>
                        @endif

                        <div class="col-12">
                            <!-- Tabs START -->
                            <ul class="nav nav-pills nav-pills-bg-soft px-3" id="course-pills-tab" role="tablist">
                                <!-- Tab item -->

                                <li class="nav-item me-2 me-sm-4" role="presentation">
                                    <button class="nav-link mb-0 active" id="course-pills-tab-4" data-bs-toggle="pill"
                                            data-bs-target="#course-pills-4" type="button" role="tab"
                                            aria-controls="course-pills-4" aria-selected="false">محتوای دوره
                                    </button>
                                </li>

                                <li class="nav-item me-2 me-sm-4" role="presentation">
                                    <button class="nav-link mb-0 " id="course-pills-tab-1" data-bs-toggle="pill"
                                            data-bs-target="#course-pills-1" type="button" role="tab"
                                            aria-controls="course-pills-1" aria-selected="true">{{__('word.overview')}}
                                    </button>
                                </li>
                                <!-- Tab item -->
                                <li class="nav-item me-2 me-sm-4" role="presentation">
                                    <button class="nav-link mb-0" id="course-pills-tab-2" data-bs-toggle="pill"
                                            data-bs-target="#course-pills-2" type="button" role="tab"
                                            aria-controls="course-pills-2" aria-selected="false">{{__('word.reviews')}}
                                    </button>
                                </li>
                                <!-- Tab item -->
                                <li class="nav-item me-2 me-sm-4" role="presentation">
                                    <button class="nav-link mb-0" id="course-pills-tab-3" data-bs-toggle="pill"
                                            data-bs-target="#course-pills-3" type="button" role="tab"
                                            aria-controls="course-pills-3" aria-selected="false">{{__('word.faqs')}}
                                    </button>
                                </li>


                                <!-- Tab item -->

                            </ul>
                            <!-- Tabs END -->

                            <!-- Tab contents START -->
                            <div class="tab-content pt-4 px-3" id="course-pills-tabContent">

                                <div class="tab-pane fade show active" id="course-pills-4" role="tabpanel"
                                     aria-labelledby="course-pills-tab-4">
                                    <!-- Title -->
                                    <!-- FAQ item -->

                                    <div class="card-body">
                                        <div class="row g-5">
                                            <!-- Lecture item START -->

                                            <!-- Lecture item END -->


                                            <!-- Lecture item START -->
                                            <div class="col-12">
                                                <!-- Curriculum item -->
                                                <h5 class="mb-4">topic</h5>
                                                {{--                                                    @foreach($topic->videos as $video)--}}
                                                {{--                                                        <x-video-item :video="$video"/>--}}
                                                {{--                                                    @endforeach--}}
                                                @foreach($course->arvanVideos()->orderBy('sort_number','asc')->get() as $video)
                                                    <x-video-item :video="$video"/>
                                                @endforeach
                                            </div>
                                            <!-- Lecture item END -->


                                        </div>
                                    </div>


                                </div>


                                <!-- Content START -->
                                <div class="tab-pane fade " id="course-pills-1" role="tabpanel"
                                     aria-labelledby="course-pills-tab-1">
                                    <!-- Course detail START -->


                                    <p class="mb-0">{{$course->body}}</p>
                                    <!-- Course detail END -->

                                </div>
                                <!-- Content END -->

                                <!-- Content START -->
                                <div class="tab-pane fade" id="course-pills-2" role="tabpanel"
                                     aria-labelledby="course-pills-tab-2">
                                    <!-- Review START -->
                                    <div class="row mb-4">
                                        <h5 class="mb-4">{{__('word.studentReviews')}}</h5>

                                        <!-- Rating info -->
                                        <div class="col-md-4 mb-3 mb-md-0">
                                            <div class="text-center">
                                                <!-- Info -->
                                                <h2 class="mb-0">{{$course->comments->avg('star')}}</h2>
                                                <!-- Star -->
                                                <ul class="list-inline mb-0">
                                                    <x-star :star="$course->comments->avg('star')"/>
                                                </ul>
                                                <p class="mb-0">
                                                    بر اساس
                                                    <span>{{$course->comments->count()}}</span>
                                                    نظر
                                                </p>
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
                                                             style="width: {{$course->comments()->percent(5)}}%"
                                                             aria-valuenow="100" aria-valuemin="0"
                                                             aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6 col-sm-4">
                                                    <!-- Star item -->
                                                    <ul class="list-inline mb-0">
                                                        <x-star :Star="5"/>
                                                    </ul>
                                                </div>

                                                <!-- Progress bar and Rating -->
                                                <div class="col-6 col-sm-8">
                                                    <!-- Progress item -->
                                                    <div class="progress progress-sm bg-warning bg-opacity-15">
                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                             style="width: {{$course->comments()->percent(4)}}%"
                                                             aria-valuenow="80" aria-valuemin="0"
                                                             aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6 col-sm-4">
                                                    <!-- Star item -->
                                                    <ul class="list-inline mb-0">
                                                        <x-star :Star="4"/>
                                                    </ul>
                                                </div>

                                                <!-- Progress bar and Rating -->
                                                <div class="col-6 col-sm-8">
                                                    <!-- Progress item -->
                                                    <div class="progress progress-sm bg-warning bg-opacity-15">
                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                             style="width: {{$course->comments()->percent(3)}}%"
                                                             aria-valuenow="60" aria-valuemin="0"
                                                             aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6 col-sm-4">
                                                    <!-- Star item -->
                                                    <ul class="list-inline mb-0">
                                                        <x-star :Star="3"/>
                                                    </ul>
                                                </div>

                                                <!-- Progress bar and Rating -->
                                                <div class="col-6 col-sm-8">
                                                    <!-- Progress item -->
                                                    <div class="progress progress-sm bg-warning bg-opacity-15">
                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                             style="width: {{$course->comments()->percent(2)}}%"
                                                             aria-valuenow="40" aria-valuemin="0"
                                                             aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6 col-sm-4">
                                                    <!-- Star item -->
                                                    <ul class="list-inline mb-0">
                                                        <x-star :Star="2"/>
                                                    </ul>
                                                </div>

                                                <!-- Progress bar and Rating -->
                                                <div class="col-6 col-sm-8">
                                                    <!-- Progress item -->
                                                    <div class="progress progress-sm bg-warning bg-opacity-15">
                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                             style="width: {{$course->comments()->percent(1)}}%"
                                                             aria-valuenow="20" aria-valuemin="0"
                                                             aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6 col-sm-4">
                                                    <!-- Star item -->
                                                    <ul class="list-inline mb-0">
                                                        <x-star :Star="1"/>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Review END -->

                                    <!-- Student review START -->
                                    <div class="row">
                                        <!-- Review item START -->
                                        @foreach($course->comments as $comment)
                                            <div class="d-md-flex my-4">
                                                <!-- Avatar -->
                                                <div class="avatar avatar-xl me-4 flex-shrink-0">
                                                    <img class="avatar-img rounded-circle"
                                                         src="{{$comment->user->avatar_path}}"
                                                         alt="avatar">
                                                </div>
                                                <!-- Text -->
                                                <div>
                                                    <div class="d-sm-flex mt-1 mt-md-0 align-items-center">
                                                        <h5 class="me-3 mb-0">{{$comment->user->name}}</h5>
                                                        <!-- Review star -->
                                                        <ul class="list-inline mb-0">
                                                            <x-star :star="$comment->star"/>

                                                        </ul>
                                                    </div>
                                                    <!-- Info -->
                                                    <p class="small mb-2">2 days ago</p>
                                                    <p class="mb-2">{{$comment->body}}</p>

                                                    <!-- Reply button -->
                                                    {{--                                                    <a href="#" class="text-body mb-0"><i class="fas fa-reply me-2"></i>Reply</a>--}}
                                                </div>
                                            </div>
                                    @endforeach
                                    <!-- Divider -->
                                        <hr>
                                        <!-- Review item END -->

                                        <!-- Review item START -->

                                        <!-- Review item END -->
                                        <!-- Divider -->
                                        <hr>
                                    </div>
                                    <!-- Student review END -->

                                    <!-- Leave Review START -->
                                    <div class="mt-2">
                                        <h5 class="mb-4">{{__('word.LeaveAReview')}}</h5>
                                        <form class="row g-3">
                                            <!-- Name -->
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" id="inputtext"
                                                       placeholder="نام و نام خانوادگی" aria-label="First name">
                                            </div>
                                            <!-- Email -->
                                            <div class="col-md-6">
                                                <input type="email" class="form-control" placeholder="ایمیل"
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
                                                          placeholder="بازخورد شما" rows="3"></textarea>
                                            </div>
                                            <!-- Button -->
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary mb-0">ثبت بازخورد</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- Leave Review END -->

                                </div>
                                <!-- Content END -->

                                <!-- Content START -->
                                <div class="tab-pane fade" id="course-pills-3" role="tabpanel"
                                     aria-labelledby="course-pills-tab-3">
                                    <!-- Title -->
                                    <!-- FAQ item -->


                                    @foreach($course->faqs as $faq)
                                        <div class="mt-4">
                                            <h6>{{$faq->question}}</h6>
                                            <p class="mb-0">{{$faq->answer}}</p>
                                        </div>
                                    @endforeach


                                </div>

                            </div>
                            <!-- Tab contents END -->
                        </div>

                    </div>


                </div>


                <div class="col-xl-4">
                    <div data-sticky data-margin-top="80" data-sticky-for="768">
                        <div class="row g-4">
                            <div class="col-md-6 col-xl-12">
                                <!-- Course info START -->
                                <div class="card card-body border p-4">

                                    <livewire:course.price :course="$course"/>

                                    <!-- Price and share button -->
                                {{--                                    <div class="d-flex justify-content-between align-items-center">--}}
                                <!-- Price -->




                                {{--                                        <!-- Share button with dropdown -->--}}



                                {{--                                        <div class="dropdown">--}}
                                {{--                                            <a href="#" class="btn btn-sm btn-light rounded mb-0 small" role="button"--}}
                                {{--                                               id="dropdownShare" data-bs-toggle="dropdown" aria-expanded="false">--}}
                                {{--                                                <i class="fas fa-fw fa-share-alt"></i>--}}
                                {{--                                            </a>--}}
                                {{--                                            <!-- dropdown button -->--}}
                                {{--                                            <ul class="dropdown-menu dropdown-w-sm dropdown-menu-end min-w-auto shadow rounded"--}}
                                {{--                                                aria-labelledby="dropdownShare">--}}
                                {{--                                                <li><a class="dropdown-item" href="#"><i--}}
                                {{--                                                            class="fab fa-twitter-square me-2"></i>Twitter</a></li>--}}
                                {{--                                                <li><a class="dropdown-item" href="#"><i--}}
                                {{--                                                            class="fab fa-facebook-square me-2"></i>Facebook</a></li>--}}
                                {{--                                                <li><a class="dropdown-item" href="#"><i--}}
                                {{--                                                            class="fab fa-linkedin me-2"></i>LinkedIn</a></li>--}}
                                {{--                                                <li><a class="dropdown-item" href="#"><i class="fas fa-copy me-2"></i>Copy--}}
                                {{--                                                        link</a></li>--}}
                                {{--                                            </ul>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}

                                {{--                                    <div style="display: block !important;">--}}
                                {{--                                        <div class="form-check radio-bg-light me-4">--}}
                                {{--                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked="">--}}
                                {{--                                            <label class="form-check-label" for="flexRadioDefault1">--}}
                                {{--                                                فقط ویدیو--}}
                                {{--                                            </label>--}}
                                {{--                                        </div>--}}
                                {{--                                        <div class="form-check radio-bg-light">--}}
                                {{--                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">--}}
                                {{--                                            <label class="form-check-label" for="flexRadioDefault2">--}}
                                {{--                                                همراه با پشتیبانی--}}
                                {{--                                            </label>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}



                                <!-- Buttons -->

                                    <!-- Divider -->
                                    <hr>

                                    <!-- Title -->
                                    <h5 class="mb-3">{{__('word.details')}}</h5>
                                    <ul class="list-group list-group-borderless border-0">
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span class="h6 fw-light mb-0"><i
                                                    class="fas fa-fw fa-book-open text-primary"></i> درس های کامل شده:</span>
                                            <span>{{$course->arvanVideos->count()}}</span>
                                        </li>
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span class="h6 fw-light mb-0"><i
                                                    class="fas fa-fw fa-clock text-primary"></i>


                                                جمع رکوردینگ:
                                                </span>
                                            <span>{{calculateDurationCourse($course) }}</span>
                                        </li>
{{--                                        <li class="list-group-item px-0 d-flex justify-content-between">--}}
{{--                                            <span class="h6 fw-light mb-0"><i--}}
{{--                                                    class="fas fa-fw fa-signal text-primary"></i>{{__('word.star')}}</span>--}}
{{--                                            <span>{{$course->comments->avg('star')}}</span>--}}
{{--                                        </li>--}}
                                    </ul>
                                    <!-- Divider -->
                                    <hr>

                                    <!-- Instructor info -->

                                    <div class="d-sm-flex align-items-center">

                                        <div class="avatar avatar-xl">
                                            <img class="avatar-img rounded-circle"
                                                 src="{{$course->author->avatar_path}}"
                                                 alt="avatar">
                                        </div>
                                        <div class="ms-sm-3 mt-2 mt-sm-0">
                                            <h6 class="mb-1"><a href="#">{{$course->author->name}}</a></h6>
                                            <p class="mb-0 small">{{$course->author->headline}}</p>
                                        </div>
                                    </div>
                                    <!-- Avatar image -->


                                    <!-- Rating and follow -->

                                </div>
                                <!-- Course info END -->
                            </div>

                            <!-- Tags START -->
                            <div class="col-md-6 col-xl-12">
                                <div class="card card-body border p-4">
                                    <h4 class="mb-3">{{__('word.tags')}}</h4>
                                    <ul class="list-inline mb-0">
                                        @foreach($course->tags as $tag)
                                            <li class="list-inline-item"><a class="btn btn-outline-light btn-sm"
                                                                            href="#">{{$tag->title}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!-- Tags END -->
                        </div><!-- Row End -->
                    </div>
                </div>


            </div><!-- Row END -->
        </div>
    </section>


@endsection
