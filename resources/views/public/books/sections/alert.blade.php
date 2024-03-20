@if(count($books) < 1)
    <div class="alert alert-info alert-dismissible fade show mt-2 mt-4 rounded-3" role="alert">
        <!-- Avatar -->

        <!-- Info -->
        هیچ کتابی

        @if(request()->has('category_id') && request()->get('category_id') != 0)
            با موضوع  <span  class="text-reset btn-link mb-0 fw-bold">{{getCategoryById(request()->get('category_id'))}}</span>

        @endif

        @if((request()->has('category_id') && request()->get('category_id') != 0) && (request()->has('author_id') && request()->get('author_id') != 0))
            و
        @endif

        @if(request()->has('author_id') && request()->get('author_id') != 0)

            با نویسندگی  <span  class="text-reset btn-link mb-0 fw-bold">{{getAuthorById(request()->get('author_id'))}}</span>
        @endif
        پیدا نشد.

        @if(request()->has('author_id') && request()->get('author_id') != 0)
            شاید نیاز باشد تا جستجو را با انتخاب
            <span  class="text-reset btn-link mb-0 fw-bold">
            تمام نویسندگان
            </span>
            دوباره امتحان کنید.
        @endif
        <button type="button" class="btn-close mt-1" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
