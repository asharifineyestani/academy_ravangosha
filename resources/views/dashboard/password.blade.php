@extends('layouts.eduport.master_dashboard')
@section('main')




    <!-- Payment method START -->
    <div class="card bg-transparent border rounded-3 mb-4 z-index-9">
        <!-- Card header START -->
        <div
            class="card-header bg-transparent d-sm-flex justify-content-sm-between align-items-center border-bottom">
            <h3 class="mb-2 mb-sm-0">تغییر پسورد</h3>
            {{--                            <a href="#" class="btn btn-sm btn-primary-soft mb-0" data-bs-toggle="modal"--}}
            {{--                               data-bs-target="#addNewcard">ثبت اطلاعات</a>--}}
        </div>
        <!-- Card header END -->

        <!-- Card body START -->

        <div id="collapse-1" class="accordion-collapse collapse show" aria-labelledby="heading-1"
             data-bs-parent="#accordioncircle">
            <!-- Accordion body -->
            <div class="accordion-body">
                <!-- Form START -->
                <form class="row text-start g-3" method="post" action="/student/change-password">
                @csrf
                @method('PUT')
                <!-- Card number -->

                    <div class="col-12">
                        <label class="form-label">
                            پسورد قبلی
                            <span
                                class="text-danger">*</span></label>
                        <div class="position-relative">
                            <input type="password" class="form-control" name="old_password">
                            <img src="assets/images/client/visa.svg"
                                 class="w-40px position-absolute top-50 end-0 translate-middle-y me-2 d-none d-sm-block"
                                 alt="">
                        </div>
                    </div>


                    <div class="col-12">
                        <label class="form-label">
                            پسورد جدید

                            <span class="text-danger">*</span></label>
                        <div class="position-relative">
                            <input type="password" class="form-control" name="new_password">
                            <img src="assets/images/client/visa.svg"
                                 class="w-40px position-absolute top-50 end-0 translate-middle-y me-2 d-none d-sm-block"
                                 alt="">
                        </div>
                    </div>


                    <div class="col-12">
                        <label class="form-label">
                            تکرار پسورد جدید
                            <span
                                class="text-danger">*</span></label>
                        <div class="position-relative">
                            <input type="password" class="form-control" name="password_confirmation">
                            <img src="assets/images/client/visa.svg"
                                 class="w-40px position-absolute top-50 end-0 translate-middle-y me-2 d-none d-sm-block"
                                 alt="">
                        </div>
                    </div>


                    <div
                        class="bg-body border border-1 p-3 rounded-3 d-sm-flex justify-content-sm-between align-items-center mb-4 mt-6">


                        <div class="form-check">
                            <p class="mb-0">پسورد جدید را به خاطر خواهم سپرد</p>
                        </div>


                        <div>
                            <button type="submit" class="btn btn-sm btn-success mb-0">تغییر پسورد</button>
                        </div>

                    </div>


                </form>
                <!-- Form END -->
            </div>
        </div>


        <!-- Card body START -->
    </div>


@endsection
