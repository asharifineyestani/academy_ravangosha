<script src="/tv/assets/js/jquery-3.5.1.min.js"></script>
<script src="/tv/assets/js/bootstrap.bundle.min.js"></script>
<script src="/tv/assets/js/owl.carousel.min.js"></script>
<script src="/tv/assets/js/slider-radio.js"></script>
<script src="/tv/assets/js/select2.min.js"></script>
<script src="/tv/assets/js/smooth-scrollbar.js"></script>
<script src="/tv/assets/js/jquery.magnific-popup.min.js"></script>
<script src="/tv/assets/js/plyr.min.js"></script>
<script src="/tv/assets/js/main.js"></script>


<script>

    $(window).on('load', function () {

    });


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

