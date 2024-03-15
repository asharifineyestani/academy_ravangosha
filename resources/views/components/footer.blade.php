<footer class="pt-5 bg-dark">
    <div class="container">
        <!-- Row START -->
        <div class="row g-4">

            <!-- Widget 1 START -->
            <div class="col-lg-3">
                <!-- logo -->
                <a class="me-0" href="/">
                    علم وکار
                </a>
                <p class="my-3">{{__('static.description.footer')}}</p>
                <!-- Social media icon -->
                <ul class="list-inline mb-0 mt-3">
                    <li class="list-inline-item"><a class="btn btn-white btn-sm shadow px-2 text-telegram" href="https://t.me/elmokar"><i
                                class="fab fa-fw fa-facebook-f"></i></a></li>
                    <li class="list-inline-item"><a class="btn btn-white btn-sm shadow px-2 text-instagram" href="https://instagram.com/elmokarcom"><i
                                class="fab fa-fw fa-instagram"></i></a></li>
                    <li class="list-inline-item">
                        <a class="btn btn-white btn-sm shadow px-2 text-twitter" href="https://twitter.com/elmokarcom"><i
                                class="fab fa-fw fa-twitter"></i></a></li>
                    <li class="list-inline-item"><a class="btn btn-white btn-sm shadow px-2 text-linkedin" href="https://www.linkedin.com/company/elmokar"><i
                                class="fab fa-fw fa-linkedin-in"></i></a></li>
                </ul>
            </div>
            <div class="col-lg-3">
                <a referrerpolicy="origin" target="_blank" href="https://trustseal.enamad.ir/?id=295289&amp;Code=m5pr71aNxb04nttuLjiv"><img referrerpolicy="origin" src="https://Trustseal.eNamad.ir/logo.aspx?id=295289&amp;Code=m5pr71aNxb04nttuLjiv" alt="" style="cursor:pointer" id="m5pr71aNxb04nttuLjiv"></a>
            </div>

            <!-- Widget 1 END -->

            <!-- Widget 2 START -->
            <div class="col-lg-6">
                <div class="row g-4">
                    <!-- Link block -->
                    <div class="col-6 col-md-4">
                        <h5 class="mb-2 mb-md-4 text-white">{{__('static.footer.heading1')}}</h5>
                        <ul class="nav flex-column">
                            @foreach($pages as $link)
                                <li class="nav-item"><a class="nav-link" href="{{$link->href}}">{{$link->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Link block -->
                    <div class="col-6 col-md-4">
                        <h5 class="mb-2 mb-md-4 text-white">{{__('static.footer.heading2')}}</h5>
                        <ul class="nav flex-column">
                            @foreach($courses as $item)
                                <li class="nav-item"><a class="nav-link" href="/courses/{{$item->id}}">{{$item->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Link block -->
{{--                    <div class="col-6 col-md-4">--}}
{{--                        <h5 class="mb-2 mb-md-4 text-white">{{__('static.footer.heading3')}}</h5>--}}
{{--                        <ul class="nav flex-column">--}}
{{--                            @foreach($packages as $link)--}}
{{--                                <li class="nav-item"><a class="nav-link" href="{{$link->href}}">{{$link->name}}</a></li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}


                    <div class="col-6 col-md-4">
                        <img referrerpolicy='origin' id = 'rgvjjxlzoeukrgvjnbqejxlz' style = 'cursor:pointer' onclick = 'window.open("https://logo.samandehi.ir/Verify.aspx?id=318321&p=xlaorfthmcsixlaouiwkrfth", "Popup","toolbar=no, scrollbars=no, location=no, statusbar=no, menubar=no, resizable=0, width=450, height=630, top=30")' alt = 'logo-samandehi' src = 'https://logo.samandehi.ir/logo.aspx?id=318321&p=qftinbpdaqgwqftiodrfnbpd' />
                    </div>
                </div>
            </div>
            <!-- Widget 2 END -->

            <!-- Widget 3 START -->
{{--            <div class="col-lg-3">--}}
{{--                <h5 class="mb-2 mb-md-4 text-white">{{__('static.footer.heading4')}}</h5>--}}
{{--                <!-- Time -->--}}
{{--                <p class="mb-2">--}}
{{--                    {{__('static.description.contact')}}--}}
{{--                </p>--}}

{{--                <p class="mb-0">{{__('static.words.email')}}:<span class="h6 fw-light ms-2  text-white">{{__('static.email')}} </span></p>--}}


{{--            </div>--}}
            <!-- Widget 3 END -->
        </div><!-- Row END -->

        <!-- Divider -->
        <hr class="mt-4 mb-0">

        <!-- Bottom footer -->
        <div class="py-3">
            <div class="container px-0">
                <div class="d-md-flex justify-content-between align-items-center py-3 text-center text-md-left">
                    <!-- copyright text -->
                    <div class="text-primary-hover"> {{__('static.description.copyright')}}</div>
                    <!-- copyright links-->
                    <div class=" mt-3 mt-md-0">
                        <ul class="list-inline mb-0">
                            @foreach($bottomLinks as $link)
                                <li class="list-inline-item"><a class="nav-link" href="{{$link->href}}">{{$link->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
