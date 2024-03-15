



    <div class="card bg-transparent border rounded-3">
        <!-- Card header START -->
        <div class="card-header bg-transparent border-bottom">
            <div
                class="card-header bg-transparent d-sm-flex justify-content-sm-between align-items-center border-bottom">
                <h3 class="mb-2 mb-sm-0">{{$title}}</h3>
                <a href="/student/wallet" class="btn btn-sm btn-primary-soft mb-0" >کیف پول</a>
            </div>
        <!-- Card header END -->

        <!-- Card body START -->
        <div class="card-body">

            <!-- Title and select START -->
            <div class="row g-3 align-items-center justify-content-between mb-4">
                <!-- Content -->
                <div class="col-md-12">
                    <form class="rounded position-relative">
                        <input class="form-control pe-5 bg-transparent" type="search" placeholder="جستجو"
                               aria-label="Search">
                        <button class="btn bg-transparent px-2 py-0 position-absolute top-50 end-0 translate-middle-y"
                                type="submit"><i class="fas fa-search fs-6 "></i></button>
                    </form>
                </div>

                <!-- Select option -->

            </div>
            <!-- Title and select END -->

            <!-- Student list table START -->
            <div class="table-responsive border-0">
                <table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
                    <!-- Table head -->
                    <thead>
                    <tr>
                        <th scope="col" class="border-0 rounded-start">کد پیگیری</th>
                        <th scope="col" class="border-0">تاریخ</th>
                        <th scope="col" class="border-0">نوع</th>
                        <th scope="col" class="border-0 rounded-end">مبلغ</th>
                    </tr>
                    </thead>
                    <!-- Table body -->
                    <tbody>

                    @foreach($items as $item)
                        <tr>

                            <td>
                                <h6 class="mt-2 mt-lg-0 mb-0"><a href="#">{{$item->id}}</a></h6>
                            </td>

                            <!-- Title item -->
                            <td>
                                <h6 class="mt-2 mt-lg-0 mb-0"><a href="#">{{$item->meta[0]}}</a></h6>
                            </td>

                            <!-- Payment method item -->


                            <!-- Status item -->
                            <td>

                                <span
                                    class="badge  @if($item->type == 'deposit') bg-success text-success @else bg-danger text-danger @endif bg-opacity-10 ">{{__('crud.db.'.$item->type)}}</span>
                            </td>

                            <!-- total item -->
                            <td >
                                {{number_format($item->amount)}}
                            </td>


                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Student list table END -->


        </div>
        <!-- Card body START -->
    </div>
</div>
