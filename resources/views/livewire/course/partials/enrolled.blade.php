<div class="accordion accordion-circle" id="accordioncircle">
    <!-- Credit or debit card START -->
    <div class="mt-3 d-grid mb-2">
        <span class="btn-lg btn-success">{{__('word.enrolled')}}</span>
    </div>
    @if(  $course->users()->where('is_supported', 1)->get()->contains(\Auth::id()))
        <p class="p-1 text-primary">
            پکیج شما همراه با استاد پشتیبان می باشد. استاد پشتیبان به زودی با شما تماس خواهد گرفت.
        </p>
    @endif
<!-- Credit or debit card END -->

    <!-- Net banking START -->
    @if( ! $course->users()->where('is_supported', 1)->get()->contains(\Auth::id()))
        <div class="accordion-item mb-3">
            <h6 class="accordion-header font-base" id="heading-2">
                <button class="accordion-button bg-white rounded collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                    آیا به استاد پشتیبان نیاز دارید؟
                </button>
            </h6>
            <div id="collapse-2" class="accordion-collapse collapse " aria-labelledby="heading-2"
                 data-bs-parent="#accordioncircle" style="">
                <!-- Accordion body -->
                <div class="accordion-body">
                    <s class="fw-bold mb-0 me-2 ">{{number_format($course->supported_price)}} {{__('word.unit')}}</s>
                    <h3 class="fw-bold mb-0 me-2">{{number_format($course->calculated_supported_price)}} {{__('word.unit')}}</h3>

                    <div class="mt-3 d-grid mb-4">
                        <a href="/courses/{{$course->id}}/enroll/difference"
                           class="btn btn-outline-primary">ارتقای پکیج</a>
                    </div>

                    <p>
                        پکیچ شما فقط شامل محتوای ویدیویی می باشد. شما می توانید با ارتقای پکیج خریداری شده، از پشتیبانی
                        استاد نیز برخوردار شوید. همچنین پکیج جدید شامل تمرین، پیگیری و جلسات رفع اشکال نیز خواهد بود.
                    </p>
                    <!-- Form END -->
                </div>
            </div>
        </div>
@endif
<!-- Net banking END -->
</div>
