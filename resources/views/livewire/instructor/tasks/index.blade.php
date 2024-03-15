<div>
    <div class="card bg-transparent border rounded-3">
        <div class="card-body">
            <div class="card-header bg-transparent border-bottom">
                <h3 class="mb-0">{{$heading}}</h3>
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
                        <th scope="col" class="border-0 rounded-start">شرح</th>
                        <th scope="col" class="border-0 ">پاسخ ها</th>

                    </tr>
                    </thead>

                    <!-- Table body START -->
                    <tbody>
                    <!-- Table item -->
                    @foreach($items as $item)
                        <tr>
                            <!-- Table data -->
                            <td>
                                <div class="d-flex align-items-center">
                                    <!-- Image -->
                                    <div class="w-100px">
                                        <a href="/cloud/videos/{{$item->video->id}}">
                                            <img src="{{$item->video->thumbnail_path ?? ''}}" class="rounded"
                                                 alt="{{$item->video->title}}"
                                                 title="{{$item->video->title}}"
                                            >
                                        </a>

                                    </div>
                                    <div class="mb-0 ms-2" style="width: 50%">
                                        <!-- Title -->
                                        <h6><a>{{excerpt($item->body)}}</a></h6>
                                        <!-- Info -->
                                    </div>
                                </div>
                            </td>

                            <!-- Table data -->


                            <td>
                                @if($item->answers()->exists())
                                    <a href="/student/tasks/{{$item->id}}/">
                                        <ul class="avatar-group mb-3 mb-sm-0">

                                            @foreach($item->getUsersWithAnswer($item->id) as $user)
                                                <li class="avatar avatar-sm">
                                                    <img class="avatar-img rounded-circle"
                                                         src="/storage/uploads/{{$user->avatar_path}}"
                                                         alt="avatar"
                                                         title="{{$user->name}}"
                                                    >
                                                </li>
                                            @endforeach
                                        </ul>
                                    </a>
                                @else
                                    <a href="/student/tasks/{{$item->id}}/" class="fs-6">بدون پاسخ</a>
                                @endif
                            </td>
                            <!-- Table data -->

                            <!-- Table data -->

                        </tr>
                    @endforeach

                    </tbody>
                    <!-- Table body END -->
                </table>
            </div>
        </div>
    </div>

</div>



