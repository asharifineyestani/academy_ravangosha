@extends('layouts.eduport.master_dashboard')
@section('main')
    <div class="card bg-transparent border rounded-3 mb-4 z-index-9">
        <!-- Card header START -->
        <div
            class="card-header bg-transparent d-sm-flex justify-content-sm-between align-items-center border-bottom">
            <h3 class="mb-2 mb-sm-0">تغییر اطلاعات</h3>
        </div>
        <!-- Card header END -->

        <!-- Card body START -->

        <div id="collapse-1" class="accordion-collapse collapse show" aria-labelledby="heading-1"
             data-bs-parent="#accordioncircle">
            <!-- Accordion body -->
            <div class="accordion-body">
                <!-- Form START -->
                <form class="row text-start g-3" action="/student/profile" method="post">
                @csrf
                @method('PUT')
                <!-- Card number -->

                    <div class="col-12">
                        <label class="form-label">نام و نام خانوادگی<span
                                class="text-danger">*</span></label>
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="نام شما" name="name"
                                   value="{{Auth::user()->name}}">
                            <img src="assets/images/client/visa.svg"
                                 class="w-40px position-absolute top-50 end-0 translate-middle-y me-2 d-none d-sm-block"
                                 alt="">
                        </div>
                    </div>


                    <div class="col-12">
                        <label class="form-label">تلفن همراه<span class="text-danger">*</span></label>
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="09xx xxx xx xx" name="mobile"
                                   value="{{Auth::user()->mobile}}">
                            <img src="assets/images/client/visa.svg"
                                 class="w-40px position-absolute top-50 end-0 translate-middle-y me-2 d-none d-sm-block"
                                 alt="">
                        </div>
                    </div>


                    <div class="col-12">
                        <label class="form-label"> ایمیل <span class="text-danger">*</span></label>
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="xxxx@xxx.xx" value="{{Auth::user()->email}}" name="email">
                            <img src="assets/images/client/visa.svg"
                                 class="w-40px position-absolute top-50 end-0 translate-middle-y me-2 d-none d-sm-block"
                                 alt="">
                        </div>
                    </div>


                    <div
                        class="bg-body border border-1 p-3 rounded-3 d-sm-flex justify-content-sm-between align-items-center mb-4 mt-6">

                        <!-- Radio button button -->
                        <div class="form-check">
                            <p class="mb-0">صحت اطلاعات فوق را تایید میکنم.</p>
                        </div>

                        <!-- Button -->
                        <div>
                            <button  class="btn btn-sm btn-success mb-0" type="submit">ثبت تغییرات</button>
                        </div>

                    </div>


                </form>
                <!-- Form END -->
            </div>
        </div>


        <!-- Card body START -->
    </div>
@endsection
