<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{__('static.seo.title')}}</title>
    @include('layouts.eduport.head')
    @livewireStyles



</head>



<body lang="fa" dir="rtl">



<main>
    @yield('main')
</main>



@include('layouts.eduport.scripts')
@yield('script')
@livewireScripts

</body>
</html>
