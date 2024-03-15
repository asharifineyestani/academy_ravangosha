<div class="accordion accordion-circle" id="accordioncircle">
    <!-- Credit or debit card START -->
    <div class="accordion-item mb-3">
        <h6 class="accordion-header font-base" id="heading-1">
            <button class="accordion-button bg-white rounded" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
                پکیج ویدیویی
            </button>
        </h6>
        <div id="collapse-1" class="accordion-collapse collapse show" aria-labelledby="heading-1"
             data-bs-parent="#accordioncircle" style="">
            <!-- Accordion body -->
            <div class="accordion-body">
                <!-- Form START -->

                <h3 class="fw-bold mb-0 me-2">{{number_format($course->price)}} {{__('word.unit')}}</h3>

                <div class="mt-3 d-grid mb-4">
                    <a href="/courses/{{$course->id}}/enroll"
                       class="btn btn-outline-primary"> خرید پکیج</a>
                </div>

                <p>
                    این پکیج شامل امکان مشاهده ی ویدیوهای کلاس می باشد. در صورت نیاز به پشتیبانی گزینه ی دیگر را انتخاب
                    نمایید.
                </p>

                <!-- Form END -->
            </div>
        </div>
    </div>
    <!-- Credit or debit card END -->

    <!-- Net banking START -->
    @if($course->supported_price)
        <div class="accordion-item mb-3">
            <h6 class="accordion-header font-base" id="heading-2">
                <button class="accordion-button bg-white rounded collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                    خرید پکیج همراه با استاد پشتیبان
                </button>
            </h6>
            <div id="collapse-2" class="accordion-collapse collapse" aria-labelledby="heading-2"
                 data-bs-parent="#accordioncircle" style="">
                <!-- Accordion body -->
                <div class="accordion-body">
                    <h3 class="fw-bold mb-0 me-2">{{number_format($course->calculated_supported_price)}} {{__('word.unit')}}</h3>

                    <div class="mt-3 d-grid mb-4">
                        <a href="/courses/{{$course->id}}/enroll/support"
                           class="btn btn-outline-primary"> خرید پکیج</a>
                    </div>

                    <p>
                        در این پکیج علاوه بر امکان مشاهده ویدیوهای دوره از پشتیبانی آنلاین استاد نیز برخوردار خواهید
                        بود. همچنین این پکیج شامل تمرین، پیگیری و جلسات رفع اشکال نیز می باشد.
                    </p>
                    <!-- Form END -->
                </div>
            </div>
        </div>
@endif
<!-- Net banking END -->
</div>
