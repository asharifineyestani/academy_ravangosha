<div class="row g-4">

    @include('public.books.sections.alert')

    @foreach($books as $book)
    <div class="col-sm-6 col-lg-4 col-xl-3">
        <div class="card shadow h-100">
            <div class="position-relative">
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
            <div class="card-body px-3">
                <!-- Title -->
                <h5 class="card-title mb-0">
                    <a href="/books/{{$book->slug}}" class="stretched-link">{{$book->title}}</a>
                </h5>
            </div>

            <!-- Card footer -->
            <div class="card-footer pt-0 px-3">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="h6 fw-light mb-0">نوشته {{$book->author->name}}</span>
                    <!-- Price -->
                    <h5 class="text-success mb-0">$125</h5>
                </div>
            </div>
        </div>
    </div>
    @endforeach





</div>
