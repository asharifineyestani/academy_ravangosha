<div class="row g-4">

    @include('public.books.sections.alert')

    @foreach($books as $book)
    <div class="col-sm-6 col-lg-4 col-xl-2">
        <div class="card  h-100">
            <div class="position-relative image">
                <!-- Image -->
                <img src="{{$book->book_image_url}}" class="card-img-top" alt="book image">
                <!-- Overlay -->
                <div class="card-img-overlay d-flex z-index-0 p-3">
                    <!-- Card overlay Top -->
                    <div class="w-100 mb-auto d-flex justify-content-end">
                        <!-- Card format icon -->
                        <div class="icon-md bg-dark rounded-circle fs-5">
                            <a href="#" class="text-white"><i class="bi bi-book"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card body -->
            <div class="card-body pt-3 p-0">
                <!-- Title -->
                <h5 class="card-title px-0 mb-3">
                    <a href="/books/{{$book->slug}}" class="stretched-link">{{$book->title}}</a>
                </h5>
            </div>

            <!-- Card footer -->
            <div class="card-footer p-0">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="h6 fw-light mb-0">نوشته {{$book->author->name}}</span>
                    <!-- Price -->
{{--                    <h5 class="text-success mb-0">$125</h5>--}}
                </div>
            </div>
        </div>
    </div>
    @endforeach





</div>

<style>
    .card .image {
        overflow: hidden;
        position: relative;
        padding-top: 140%;
        border-radius: 0.5rem;
    }
    .card .image img {
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        position: absolute;
    }
    .card-body {
        flex: inherit;
        padding-bottom: 0;
    }
    .card-title {
        font-size: 14px;
    }
    .card-footer span {
        font-size: 12px;
    }
    .card img,
    .card .card-img-overlay {
        transition: all 0.5s linear;
    }
    .card:hover img {

        transform: scale(1.06);
        filter: blur(4px);
        -webkit-filter: blur(4px);
    }
    .card .card-img-overlay {
        opacity: 0;
    }
    .card:hover .card-img-overlay {
        opacity: 1;
    }
</style>
