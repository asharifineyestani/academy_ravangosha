@extends('layouts.eduport.master_dashboard')
@section('main')

    <?php
    $isPrivate_options = [
        0 => 'کلاس عمومی',
        1 => 'کلاس خصوصی',
    ];


    $status_options = [
        'TODO' => 'به زودی',
        'DOING' => 'در حال برگزاری',
        'DONE' => 'کامل شده',
    ];

    ?>
    <div>

        <!-- Payment method START -->
        <form action="/instructor/courses/{{$item->id}}" method="post">
            @method('PUT')
            @csrf
            <div class="card bg-transparent border rounded-3 mb-4 z-index-9">
                <!-- Card header START -->
                <div
                    class="card-header bg-transparent d-sm-flex justify-content-sm-between align-items-center border-bottom">
                    <h3 class="mb-2 mb-sm-0 h5">ویرایش اطلاعات</h3>


                    <button type="submit" class="btn btn-sm btn-success mb-0">ثبت تغییرات</button>
                </div>
                <!-- Card header END -->

                <!-- Card body START -->
                <div class="card-body">
                    <div class="accordion accordion-circle" id="accordioncircle">


                        <!-- Credit or debit card START -->
                        <div class="accordion-item mb-3">
                            <h6 class="accordion-header font-base" id="heading-1">
                                <button class="accordion-button bg-white rounded collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse-1" aria-expanded="true"
                                        aria-controls="collapse-1">
                                    <span class="h6">معرفی</span>
                                </button>
                            </h6>
                            <div id="collapse-1" class="accordion-collapse collapse show" aria-labelledby="heading-1"
                                 data-bs-parent="#accordioncircle">
                                <!-- Accordion body -->
                                <div class="accordion-body">
                                    <!-- Form START -->


                                    <!-- Card number -->
                                    <div class="col-12">
                                        <label class="form-label">عنوان <span class="text-danger">*</span></label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" placeholder="عنوان" name="title"
                                                   value="{{old('title') ?? $item['title']}}">
                                            <img src="assets/images/client/visa.svg"
                                                 class="w-40px position-absolute top-50 end-0 translate-middle-y me-2 d-none d-sm-block"
                                                 alt="">
                                        </div>
                                    </div>


                                    <!-- Expiration Date -->

                                    <!-- Card name -->

                                    <div class="col-12">
                                        <label class="form-label">معرفی کوتاه
                                            <span class="text-danger">*</span>
                                        </label>
                                        <textarea type="text" class="form-control" aria-label="name of card holder"
                                                  name="excerpt">{{old('excerpt') ?? $item['excerpt']}}</textarea>
                                    </div>


                                    <!-- Form END -->
                                </div>
                            </div>
                        </div>
                        <!-- Credit or debit card END -->

                        <!-- Net banking START -->
                        <div class="accordion-item mb-3">
                            <h6 class="accordion-header font-base" id="heading-3">
                                <button class="accordion-button collapsed bg-white rounded" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse-3" aria-expanded="false"
                                        aria-controls="collapse-3">
                                    <span class="h6">وضعیت نمایش</span>
                                </button>
                            </h6>
                            <div id="collapse-3" class="accordion-collapse collapse" aria-labelledby="heading-3"
                                 data-bs-parent="#accordioncircle">
                                <!-- Accordion body -->
                                <div class="accordion-body">
                                    <!-- Form START -->

                                    <!-- Select bank -->

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">مخاطبین: <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-select js-choice border-0 z-index-9"
                                                    aria-label=".form-select-sm"
                                                    name="is_private">

                                                @if (count($isPrivate_options))
                                                    @foreach ($isPrivate_options as $key => $value)
                                                        @if(old('is_private') ?? $item['is_private'] == $key)
                                                            <option value="{{ $key }}" selected>{{ $value}}</option>
                                                        @else
                                                            <option value="{{ $key }}">{{ $value}}</option>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <!--Cvv code  -->
                                        <div class="col-md-6">
                                            <label class="form-label">رکورد: <span class="text-danger">*</span></label>
                                            <select class="form-select js-choice border-0 z-index-9"
                                                    aria-label=".form-select-sm"
                                                    name="status">

                                                @if (count($status_options))
                                                    @foreach ($status_options as $key => $value)
                                                        @if(old('status') ?? $item['status'] == $key)
                                                            <option value="{{ $key }}" selected>{{ $value}}</option>
                                                        @else
                                                            <option value="{{ $key }}">{{ $value}}</option>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>

                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label">شناسه کانال <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" readonly
                                               name="channel_id" value="{{$item['channel_id']}}">
                                    </div>

                                    <!-- Form END -->
                                </div>
                            </div>
                        </div>
                        <!-- Net banking END -->

                        <div class="accordion-item mb-3">
                            <h6 class="accordion-header font-base" id="heading-2">
                                <button class="accordion-button collapsed bg-white rounded" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse-2" aria-expanded="false"
                                        aria-controls="collapse-2">


                                    <span class="h6">اطلاعات تکمیلی</span>
                                </button>
                            </h6>
                            <div id="collapse-2" class="accordion-collapse collapse" aria-labelledby="heading-2"
                                 data-bs-parent="#accordioncircle">
                                <!-- Accordion body -->
                                <div class="accordion-body">


                                    <div class="col-12 mb-4">
                                        <label class="form-label">پیش نیازها </label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" placeholder="برای مثال HTML, CSS"
                                                   name="prerequisites"
                                                   value="{{old('prerequisites') ?? $item['prerequisites']}}">
                                            <img src="assets/images/client/visa.svg"
                                                 class="w-40px position-absolute top-50 end-0 translate-middle-y me-2 d-none d-sm-block"
                                                 alt="">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">توضیحات
                                            {{--                                            <span class="text-danger">*</span>--}}
                                        </label>
                                        <textarea type="text" class="form-control" aria-label="name of card holder"
                                                  name="body">{{old('body') ?? $item['body']}}</textarea>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="accordion-item mb-3">
                            <h6 class="accordion-header font-base" id="heading-4">
                                <button class="accordion-button bg-white rounded collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse-4" aria-expanded="true"
                                        aria-controls="collapse-4">
                                    <span class="h6">قیمت گذاری</span>
                                </button>
                            </h6>
                            <div id="collapse-4" class="accordion-collapse collapse " aria-labelledby="heading-4"
                                 data-bs-parent="#accordioncircle">
                                <!-- Accordion body -->
                                <div class="accordion-body">
                                    <!-- Form START -->

                                    <div class="row">
                                        <!-- Card number -->
                                        <div class="col-6 ">
                                            <label class="form-label">قیمت پکیج ویدیویی <span
                                                    class="text-danger">*</span></label>
                                            <div class="position-relative">
                                                <input type="number" class="form-control" name="price"
                                                       value="{{old('price') ?? $item['price']}}">
                                            </div>
                                        </div>


                                        <!-- Expiration Date -->

                                        <!-- Card name -->

                                        <div class="col-6">
                                            <label class="form-label">قیمت پکیج همراه پشتیبانی
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="number" class="form-control" name="supported_price"
                                                   value="{{old('supported_price') ?? $item['supported_price']}}">
                                        </div>
                                    </div>


                                    <!-- Form END -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card body START -->
            </div>
        </form>
        <!-- Payment method END -->

        <!-- Billing address START -->
        <div class="card bg-transparent border rounded-3 mb-4">
            <!-- Card header START -->
            <div
                class="card-header bg-transparent d-sm-flex justify-content-sm-between align-items-center border-bottom">
                <h3 class="mb-2 mb-sm-0 h5">ویرایش مدیا</h3>
                {{--                <a href="#" class="btn btn-sm btn-primary-soft mb-0">Add new address</a>--}}
            </div>
            <!-- Card header END -->

            <!-- Card body START -->
            <div class="card-body">
                <!-- Address 1 START -->
                <div
                    class="bg-body border border-1 p-3 rounded-3 d-sm-flex justify-content-sm-between align-items-center mb-4">

                    <!-- Radio button button -->
                    <div class="form-check">
                        <label class="form-check-label mb-0 h6" for="address1">تصویر آواتار</label>
                    </div>

                    <!-- Button -->
                    <div>
                        <a href="#" class="btn btn-sm btn-primary mb-0">تغییر</a>
                    </div>

                </div>
                <!-- Address 1 END -->

                <!-- Address 2 START -->
                <div
                    class="bg-body border border-1 p-3 rounded-3 d-sm-flex justify-content-sm-between align-items-center mb-4">

                    <!-- Radio button button -->
                    <div class="form-check">
                        <label class="form-check-label mb-0 h6" for="address2">ویدیوی معرفی</label>
                    </div>

                    <!-- Button -->
                    <div>
                        <a href="#" class="btn btn-sm btn-primary mb-0">تغییر</a>
                    </div>

                </div>
                <!-- Address 2 END -->
            </div>
            <!-- Card body START -->
        </div>
        <!-- Billing address END -->


    </div>
@endsection
