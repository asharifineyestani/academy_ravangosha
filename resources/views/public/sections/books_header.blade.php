
<div class="catalog__nav">


    <div class="catalog__select-wrap">
        <select class="catalog__select" name="category" id="filter_books_by_category">

            <option value="All" @if(!request()->has('category_id')) selected @endif>تمام موضوعات</option>
            @foreach(getCategories(10) as $category)
                <option value="{{$category->id}}" @if(request()->get('category_id') == $category->id) selected @endif>
                    {{$category->title}}
                </option>
            @endforeach


        </select>

        <select class="catalog__select" name="author" id="filter_books_by_author">
            <option value="All" @if(!request()->has('author_id')) selected @endif>تمام نویسندگان</option>
            @foreach(getAuthors(10) as $author)
                <option value="{{$author->id}}"  @if(request()->get('author_id') == $author->id) selected @endif >{{$author->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="slider-radio">
        <input type="radio" name="grade" id="featured" checked="checked"><label for="featured">جدیدترین</label>
        <input type="radio" name="grade" id="popular"><label for="popular">پرفروش ها</label>
        <input type="radio" name="grade" id="newest"><label for="newest">پر بازدید‌ترین</label>
    </div>
</div>
