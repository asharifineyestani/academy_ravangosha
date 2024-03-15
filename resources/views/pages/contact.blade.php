@extends('layouts.eduport.master')
@section('main')

    <x-breadcrumb :title="__('word.contactUs')"/>
    <!-- =======================
    Page Banner END -->

    <!-- =======================
    Image and contact form START -->
    <section>
        <div class="container">
            <div class="row g-4 g-lg-0 align-items-center">



                <!-- Contact form START -->
                <div class="col-md-12">
                    <!-- Title -->
                    {{--                    <h2 class="mt-4 mt-md-0">{{__('word.contactUs')}}</h2>--}}
                    <p>{{__('text.contactUs')}}</p>


                    @include('layouts.eduport.alert')


                    @csrf
                    <!-- Name -->
                        <div class="row">
                            <div class="container">
                                <form method="POST" action="/messages">
                                    <div class="row mb-4 bg-light-input">
                                        <div class="col-md-6">
                                            <label for="yourName" class="form-label">{{__('word.name')}} *</label>
                                            <input type="text" class="form-control form-control-lg" id="yourName" name="name">
                                        </div>
                                        <!-- Email -->
                                        <div class="col-md-6">
                                            <label for="emailInput" class="form-label">{{__('word.mobile')}} *</label>
                                            <input type="text" class="form-control form-control-lg" id="emailInput" name="mobile">
                                        </div>
                                    </div>

                                    <!-- Message -->
                                    <div class="mb-4 bg-light-input">
                                        <label for="textareaBox" class="form-label" >{{__('word.message')}} *</label>
                                        <textarea class="form-control" id="textareaBox" rows="4" name="body"></textarea>
                                    </div>
                                    <!-- Button -->
                                    <div class="d-grid">
                                        <button class="btn btn-lg btn-primary mb-0"
                                                type="submit">{{__('button.sendMessage')}}</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                </div>
                <!-- Contact form END -->
            </div>
        </div>
    </section>
    <!-- =======================
    Image and contact form END -->

    <!-- =======================
    Map START -->

@endsection
