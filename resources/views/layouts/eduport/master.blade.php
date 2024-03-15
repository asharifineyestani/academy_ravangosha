<!DOCTYPE html>

<html lang="ar" dir="rtl">
<head>
    <title>{{__('static.seo.title')}}</title>
    @include('layouts.eduport.head')
</head>



<body lang="fa" dir="rtl">

<x-navbar />

<main>
    @yield('main')
</main>

<x-footer/>

@include('layouts.eduport.scripts')
@yield('script')

</body>
</html>
