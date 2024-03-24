@extends('layouts.edu.master', ['line' => true])
@section('main')
    <main>

        <!-- =======================
        Main Banner START -->

        <!-- =======================
        Main Banner END -->

        <!-- =======================
        Detail START -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Content -->
                        <h1 class="mb-6">{{$item->title}}</h1>
                        <div class="afc_article__body">
                            {!! $item->body !!}
                        </div>


                        <!-- List -->


                        <!-- Buttons -->


                        <!-- Buttons -->
                        <div class="row mt-4">
                            <!-- Title -->
                            <div class="col-12">
                                <h5 class="mb-3">تگ ها</h5>
                                <!-- Button list -->
                                <ul class="list-inline hstack gap-3 flex-wrap">
                                    <li class="list-inline-item"><a class="btn btn-light btn-sm mb-0" href="#">تگ ۱</a>
                                    </li>
                                    <li class="list-inline-item"><a class="btn btn-light btn-sm mb-0" href="#">تگ ۲</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Table -->
                        {{--                        @include('public.articles.sections.article_table')--}}

                        <!-- University -->

                        <div class="row g-4 mt-4">

                            <h5>پژوهش های مشابه</h5>
                            @foreach($related_articles as $related)
                                <div class="col-md-6 col-xl-4">
                                    <!-- Card START -->
                                    <div class="card card-body shadow p-4 align-items-start">
                                        <!-- Image -->
                                        <a href="/articles/{{$related->id}}"> <img class="rounded-1 h-60px" src="/storage/{{$related->image_url}}"
                                                                                   alt="university logo"></a>


                                        <!-- Title -->
                                        <a href="/articles/{{$related->id}}">  <h5 class="card-title mt-3 mb-0" style="height: 65px">{{$related->title}}</h5></a>

                                        <span>{{excerpt($related->body , 240)}}</span>

                                        <!-- Button -->
                                        <a href="/articles/{{$related->id}}"
                                           class="btn btn-lg btn-link p-0 mt-3 stretched-link"><u>مشاهده</u></a>
                                    </div>
                                    <!-- Card END -->
                                </div>
                            @endforeach
                        </div>


                    </div>
                </div>
            </div>
        </section>
        <!-- =======================
        Detail END -->

        <!-- =======================
        Action Box START-->
        @include('public.sections.cta_subscribe')
        <!-- =======================
        Action Box END-->

    </main>
@endsection
