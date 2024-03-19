@extends('layouts.edu.master')
@section('main')
    <main>

        <!-- =======================
        Page Banner START -->
{{--        @include('public.books.sections.header')--}}
        <!-- =======================
        Page Banner END -->

        <!-- =======================
        Page content START -->
        <section class="py-5">
            <div class="container">
                <div class="row">
                    <!-- Main content START -->
                    <div class="col-12">

                        <!-- Search option START -->

                        <!-- Search option END -->

                        <!-- Book Grid START -->
                        @include('public.books.sections.books_header')
                        @include('public.books.sections.books')
                        <!-- Book Grid END -->

                        <!-- Pagination START -->
                        <div class="col-12">

                            {{ $books->links() }}
                        </div>
                        <!-- Pagination END -->
                    </div>
                    <!-- Main content END -->
                </div><!-- Row END -->
            </div>
        </section>
        <!-- =======================
        Page content END -->

        <!-- =======================
        Action box START -->
{{--       @include('public.books.sections.banner')--}}
        <!-- =======================
        Action box END -->

    </main>
@endsection
