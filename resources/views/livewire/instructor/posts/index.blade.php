<div>
    <div class="card bg-transparent border rounded-3">
        <div class="card-body">

            <div
                class="card-header bg-transparent d-sm-flex justify-content-sm-between align-items-center border-bottom">
                <h3 class="mb-2 mb-sm-0">{{$heading}}</h3>
                <a href="/instructor/posts/create" class="btn btn-sm btn-primary-soft mb-0">افزودن نوشته</a>
            </div>


            <div class="row g-3 align-items-center justify-content-between mb-4">
                <!-- Content -->
                <div class="col-md-12">
                    <form class="rounded position-relative">


                        <input class="form-control pe-5 bg-transparent" type="search"
                               placeholder="جستجو" aria-label="Search">
                        <button
                            class="btn bg-transparent px-2 py-0 position-absolute top-50 end-0 translate-middle-y"
                            type="submit"><i class="fas fa-search fs-6 "></i></button>
                    </form>
                </div>

                <!-- Select option -->

            </div>

            <div class="table-responsive border-0">
                <table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
                    <!-- Table head -->
                    <thead>
                    <tr>
                        <th scope="col" class="border-0 rounded-start">شناسه</th>
                        <th scope="col" class="border-0">عنوان نوشته</th>
                        <th scope="col" class="border-0">زمان مطالعه</th>
                        <th scope="col" class="border-0 rounded-end">عملیات</th>
                    </tr>
                    </thead>

                    <!-- Table body START -->
                    <tbody>
                    <!-- Table item -->
                    @foreach($items as $item)
                        <tr>

                            <td>
                                {{$item->id}}
                            </td>


                            <td>
                                <h6><a href="/posts/{{$item->id}}">{{$item->title}}</a></h6>
                            </td>

                            <td>{{$item->study_time}}</td>

                            <td>

                                <button
                                    type="button"
                                    wire:click="sweatDelete('{{$item->id}}')"
                                    title="حذف نوشته"
                                    class="btn btn-sm btn-danger-soft me-1 mb-1 mb-md-0">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <a href="/instructor/posts/{{$item->id}}/edit"
                                   title="ویرایش نوشته"
                                   class="btn btn-sm btn-primary-soft me-1 mb-1 mb-md-0">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                    <!-- Table body END -->
                </table>
            </div>
        </div>
    </div>

</div>



