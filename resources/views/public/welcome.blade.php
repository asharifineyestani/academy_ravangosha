@extends('layouts.tv.master')
@section('content')
    <!-- header (relative style) -->

    <!-- end header -->

    <!-- home -->
    {{--    @include('sections.articles')--}}
    <!-- end home -->

    <!-- catalog -->
    <div class="catalog">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @include('public.sections.books_header')

                    @include('public.sections.books')
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <a href="/books" class="catalog__more" type="button">نمایش همه</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end catalog -->

    <!-- subscriptions -->
    @include('public.sections.abridged')
    <!-- end subscriptions -->

    <!-- plan -->

    <!-- end plan -->

    <!-- videos -->
    @include('public.sections.videos')
    <!-- end videos -->

    <!-- footer -->

    <!-- end footer -->
@endsection
