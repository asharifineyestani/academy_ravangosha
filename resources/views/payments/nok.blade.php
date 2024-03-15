@extends('layouts.eduport.master')
@section('main')








    <section class="py-4 mb-6 mt-6">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <!-- Image -->
                    <img src="/assets/images/element/cart.svg" class="h-200px h-md-300px mb-3" alt="">
                    <!-- Subtitle -->
                    <h2>عملیات با خطا روبرو شد</h2>
                    <!-- info -->
                    <p class="mb-0">در انجام عملیات مشکلی پیش آمده است. در صورت نیاز با پشتیبانی تماس بگیرید</p>
                    <!-- Button -->
                    <a href="{{getRedirectPathAfterPayment()}}" class="btn btn-primary mt-4 mb-0">برگشت به کیف پول</a>
                </div>
            </div>
        </div>
    </section>
@endsection
