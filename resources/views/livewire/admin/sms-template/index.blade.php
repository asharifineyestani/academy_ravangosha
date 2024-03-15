<div>
    <div class="card bg-transparent border rounded-3">
        <div class="card-body">
            <div class="card-header bg-transparent d-sm-flex justify-content-sm-between align-items-center border-bottom  ">
                <h3 class="mb-0">{{$heading}}</h3>
                <a class="btn btn-primary" href="/admin/templates/create">افزودن قالب</a>
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
                        <th scope="col" class="border-0 ">شناسه</th>
                        <th scope="col" class="border-0 ">templateId</th>
                        <th scope="col" class="border-0 ">متن</th>
                        <th scope="col" class="border-0 ">عملیات</th>

                    </tr>
                    </thead>

                    <!-- Table body START -->
                    <tbody>
                    <!-- Table item -->
                    @foreach($items as $item)
                        <tr>
                           <td>{{$item->id}}</td>
                           <td>{{$item->template_id}}</td>
                           <td>{{$item->body}}</td>
                           <td>
                               <button
                                   wire:click="delete('{{$item->id}}')"
                                   type="button"
                                   title="حذف  قالب"
                                   class="btn btn-sm btn-danger-soft me-1 mb-1 mb-md-0">
                                   <i class="fas fa-trash"></i>
                               </button>

                               <a
                                   href="/admin/templates/{{$item->id}}/edit"
                                   type="button"
                                   title="ویرایش قالب"
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



