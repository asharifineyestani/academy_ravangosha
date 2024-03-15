@extends('layouts.eduport.master')
@section('main')
    <!-- =======================
Main Content START -->
    <section class="pb-0 pt-4 pb-md-5">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <!-- Title and Info START -->
                    <div class="row">
                        <!-- Avatar and Share -->
                        <div class="col-lg-3 align-items-center mt-4 mt-lg-5 order-2 order-lg-1">
                            <div class="text-lg-center">
                                <!-- Author info -->
                                <div class="position-relative">
                                    <!-- Avatar -->
                                    <div class="avatar avatar-xxl">
                                        <img class="avatar-img rounded-circle" src="{{$item->user->avatar_path}}"
                                             alt="avatar">
                                    </div>
                                    <a href="#" class="h5 stretched-link mt-2 mb-0 d-block">{{$item->user->name}}</a>
                                    <p class="mb-2">{{$item->user->headline}}</p>
                                </div>
                                <!-- Info -->
                                <ul class="list-inline list-unstyled">
                                    <li class="list-inline-item d-lg-block my-lg-2">{{$item->created_at}}</li>
                                    <li class="list-inline-item d-lg-block my-lg-2">
                                        <span>{{__('word.studyTime')}}</span>{{$item->study_time}}</li>
                                    <li class="list-inline-item badge bg-orange text-white"><i
                                            class="far text-white fa-heart me-1"></i>{{$item->count_like}}
                                    </li>
                                    <li class="list-inline-item badge bg-info text-white"><i
                                            class="far fa-eye me-1"></i>{{$item->count_visit}}
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="col-lg-9 order-1">
                            <!-- Pre title -->
                            @if($item->category)
                                <div class="badge bg-success text-white">{{$item->category->title}}</div>
                            @endif
                        <!-- Title -->
                            <h1 class="mt-2 mb-0 display-5">{{$item->title}}</h1>
                            <!-- Info -->
                            <p>{!! $item->body !!}</p>
                        </div>
                    </div>

                </div>
            </div> <!-- Row END -->
        </div>
    </section>



@endsection
