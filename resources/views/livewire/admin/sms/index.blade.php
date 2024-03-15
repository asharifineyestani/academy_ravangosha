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
                    <th scope="col" class="border-0 rounded-start">شناسه</th>
                    <th scope="col" class="border-0 ">کاربر</th>
                    <th scope="col" class="border-0 ">موبایل</th>
                    <th scope="col" class="border-0">کد</th>
                    <th scope="col" class="border-0">آیپی</th>
                    <th scope="col" class="border-0 ">زمان</th>

                </tr>
                </thead>

                <!-- Table body START -->
                <tbody>
                <!-- Table item -->
                @foreach($items as $item)
                    <tr>
                        <!-- Table data -->
                        <td>
                            <div>{{$item->id}}</div>
                        </td>


                        <td>
                            @if($item->user)
                                <a href="/admin/sms-logs/{{$item->mobile}}">
                                    <img
                                        width="40"
                                        height="40"
                                        src="{{$item->user->avatar_path}}"
                                        alt="{{$item->user->name}}"
                                        title="{{$item->user->name}}"
                                    >
                                </a>
                            @else
                                <span>
                                   جدید
                                </span>
                            @endif


                        </td>


                        <td>
                            <div>{{$item->mobile}}</div>
                        </td>

                        <!-- Table data -->
                        <td>
                            {{$item->code}}
                        </td>
                        <td>
                            {{$item->ip}}
                        </td>

                        <!-- Table data -->
                        <td>
                            {{verta($item->created_at)}}
                        </td>

                        <!-- Table data -->



                    </tr>
                @endforeach

                </tbody>
                <!-- Table body END -->
            </table>
        </div>
    </div>
</div>
