@extends('layouts.eduport.master')
@section('main')

    <x-breadcrumb :title="__('word.posts')"/>

    <section class="position-relative pt-0 pt-lg-5 " style="min-height: 100vh">
        <div class="container">
            <div class="row g-4">

                @foreach($items as $item)
                    <div class="col-sm-6 col-lg-4 col-xl-3">
                        <div class="card bg-transparent">
                            <div class="overflow-hidden rounded-3">
                                @if($item->thumbnail_path)
                                <img src="{{$item->thumbnail_path}}" class="card-img" alt="course image">
                                @endif
                                <!-- Overlay -->
                                <div class="bg-overlay bg-dark opacity-4"></div>
                                <div class="card-img-overlay d-flex align-items-start p-3">
                                    <!-- badge -->
                                    @if($item->category)
                                        <a href="#" class="badge bg-danger text-white">{{$item->category->title}}</a>
                                    @endif
                                </div>
                            </div>

                            <!-- Card body -->
                            <div class="card-body">
                                <!-- Title -->
                                <h5 class="card-title"><a href="/posts/{{$item->id}}">{{$item->title}}</a></h5>
                                <p class="text-truncate-2">{{excerpt(strip_tags($item->body))}}</p>
                                <!-- Info -->
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-0"><a href="#">{{$item->user->name}}</a></h6>
                                    <span class="small">{{$item->created_at}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div> <!-- Row end -->

            <!-- Pagination START -->
        {{$items->links()}}
        <!-- Pagination END -->

        </div>
    </section>
@endsection
