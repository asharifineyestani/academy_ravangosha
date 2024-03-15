<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <title>{{__('static.seo.title')}}</title>

    @include('layouts.eduport.head')
    @livewireStyles
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script>
{{--    <x-livewire-alert::flash />--}}

</head>



<body lang="fa" dir="rtl">

<x-navbar/>

<main>


@include('dashboard.partials.header')

<!-- =======================
    Page Banner END -->

    <!-- =======================
    Page content START -->
    <section class="pt-0">
        <div class="container">
            <div class="row">


                <div class="col-xl-3">
                    <livewire:dashboard.partials.sidebar :request="request()" />
                </div>

                <div class="col-xl-9">


                    <div>
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                                @if ($backUrl = Session::get('backUrl'))
                                    <a href="{{$backUrl}}">برگشت</a>
                                @endif
                            </div>


                        @endif
                    </div>


                    @yield('main')
                </div>
            </div>
        </div>
    </section>


</main>

<x-footer/>

@include('layouts.eduport.scripts')
@yield('script')
@livewireScripts

</body>
</html>
