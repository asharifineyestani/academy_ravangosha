<div class="row mb-4 align-items-center">

    <!-- Title -->
    <div class="col-md-4">
        <h5 class="mb-0">لیست کتاب ها</h5>
    </div>

    <!-- Select option -->
    <div class="col-md-4 mt-3 mt-xl-0">
        <div class="border-bottom p-2 input-borderless">
            <select class="js-choice" name="category" id="filter_books_by_category">
                <option value="0" @if(!request()->has('category_id')) selected @endif>تمام موضوعات</option>
                @foreach(getCategories(10) as $category)
                    <option value="{{$category->id}}" @if(request()->get('category_id') == $category->id) selected @endif>
                        {{$category->title}}
                    </option>
                @endforeach
            </select>




        </div>
    </div>

    <!-- Select option -->
    <div class="col-md-4 mt-3 mt-xl-0">
        <form class="border-bottom p-2 input-borderless">
            <select class="js-choice" name="author" id="filter_books_by_author">

                <option value="0" @if(!request()->has('author_id')) selected @endif>تمام نویسندگان</option>
                @foreach(getAuthors(10) as $author)
                    <option value="{{$author->id}}"  @if(request()->get('author_id') == $author->id) selected @endif >{{$author->name}}</option>
                @endforeach

            </select>
        </form>
    </div>

</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        var categorySelect = document.getElementById('filter_books_by_category');
        var authorSelect = document.getElementById('filter_books_by_author');

        // تابعی برای تغییر URL بر اساس مقادیر select ها
        function updateUrl() {
            var categoryValue = categorySelect.value;
            var authorValue = authorSelect.value;

            var newUrl = '/books?category_id=' + categoryValue + '&author_id=' + authorValue;

            // اینجا می‌توانید بر اساس نیاز خود کد دیگری برای تغییر URL بنویسید، مثلاً انتقال به صفحه جدید و غیره.
            console.log(newUrl);

            // history.pushState(null, '', newUrl);

            window.location.href = newUrl;
        }

        // اضافه کردن رویداد change به select ها
        categorySelect.addEventListener('change', function () {

            updateUrl();

        });

        authorSelect.addEventListener('change', function () {

            updateUrl();
        });
    });
</script>
