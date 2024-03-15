<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="bg-light rounded-3 p-4">
                    <!-- Slider START -->
                    <div class="tiny-slider arrow-round arrow-creative arrow-blur arrow-hover py-1">
                        <div class="tiny-slider-inner" data-autoplay="true" data-gutter="80" data-arrow="true" data-dots="false" data-items="5" data-items-lg="3" data-items-md="2" data-items-xs="1">

                            <!-- Item -->

                            @foreach($categories as $item)
                                <div>
                                    <div class="bg-body text-center rounded-2 border py-2 px-1 position-relative">
                                        <img src="{{$item->thumbnail_path}}" class="h-40px" alt="">
                                        <a href="#" class="text-primary-hover stretched-link"><span class="h6 ms-2">{{$item->title}}</span></a>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                    <!-- Slider END -->
                </div>
            </div>
        </div> <!-- Row END -->
    </div>
</section>
