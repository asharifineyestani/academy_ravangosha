<div>

    @if($userId)
        @livewire('dashboard.partials.user-info', ['userId' => $userId])
    @endif
    <div class="card bg-transparent border rounded-3">
        <div class="card-body">
            <div class="card-header bg-transparent d-sm-flex justify-content-sm-between align-items-center border-bottom  ">
                <h3 class="mb-0">لاگ ها</h3>
                <button class="btn btn-primary" wire:click="deleteAllLogs()">حذف لاگها</button>
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
                        <th scope="col" class="border-0">کاربر</th>
                        <th scope="col" class="border-0">متد</th>
                        <th scope="col" class="border-0">status code</th>
                        <th scope="col" class="border-0">آی پی</th>
                        <th scope="col" class="border-0">زمان</th>
                        <th scope="col" class="border-0">مسیر</th>
                        <th scope="col" class="border-0 rounded-end">اطلاعات</th>
                    </tr>
                    </thead>

                    <!-- Table body START -->
                    <tbody>
                    <!-- Table item -->
                    @foreach($items as $item)
                        <tr>
                            <!-- Table data -->
                            <td>{{$item->id}}</td>
                            <td>
                                <div>
                                    @if($item->user)
                                        <a href="/admin/statistics?user_id={{$item->user->id}}">
                                            <img
                                                width="40"
                                                height="40"
                                                src="{{$item->user->avatar_path}}"
                                                alt="{{$item->user->name}}"
                                                title="{{$item->user->name}}"
                                            >
                                        </a>

                                    @else
                                        <span>کاربر مهمان</span>
                                    @endif
                                </div>
                            </td>

                            <!-- Table data -->
                            <td>{{$item->method}}</td>
                            <td><a href="/admin/statistics?status_code={{$item->status_code}}">{{$item->status_code}}</a></td>
                            <td><a href="/admin/statistics?ip={{$item->ip}}">{{$item->ip}}</a></td>

                            <!-- Table data -->
                            <td>    {{\Hekmatinasser\Verta\Verta::instance($item->created_at)->format('%d %B ساعت H:i')}}</td>

                            <!-- Table data -->


                            <td>


                                <a href="{{$item->uri}}">{{getPath($item->uri)}}</a>


                            </td>

                            <td>
                                <a href="#" class="h6 mb-0" role="button" id="dropdownShare1" data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    <i class="bi bi-info-circle-fill"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-w-sm dropdown-menu-end min-w-auto shadow rounded"
                                    aria-labelledby="dropdownShare1">
                                    <li>
                                        <div class="d-flex justify-content-between">
                                            <span class="small">پلتفرم</span>
                                            <span class="h6 mb-0 small">{{$item->platform}}</span>
                                        </div>
                                        <hr class="my-1">
                                    </li>
                                    <!-- Divider -->

                                    <li>
                                        <div class="d-flex justify-content-between">
                                            <span class="small">مرورگر</span>
                                            <span class="h6 mb-0 small">{{$item->browser}}</span>
                                        </div>
                                        <hr class="my-1">
                                    </li>

                                    <li>
                                        <div class="d-flex justify-content-between">
                                            <span class="small">ارجاع</span>
                                            <span class="h6 mb-0 small">{{$item->referer}}</span>
                                        </div>
                                    </li>
                                </ul>


                                <a href="/admin/statistics?ip={{$item->ip}}&action=delete"><i class="fas fa-trash-restore"></i></a>


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
