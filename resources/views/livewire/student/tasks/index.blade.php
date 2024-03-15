<div>
    <div class="card bg-transparent border rounded-3">
        <div class="card-body">
            <div class="card-header bg-transparent border-bottom mb-4">
                <h3 class="mb-0">{{$heading}}</h3>
            </div>

            <div class="row g-3 align-items-center justify-content-between mb-4">
                <div class="col-md-3">
                    <!-- Short by filter -->

                    <form wire:change="setFilter($event.target.value)">
                        <select  class="form-select js-choice border-0 z-index-9"
                                aria-label=".form-select-sm">
                            @foreach($filters as $key => $value)
                                <option wire:key="id-{{$key}}" value="{{$key}}"
                                        @if($filterId == $key) selected @endif>{{$value}}</option>
                            @endforeach

                        </select>


                    </form>


                </div>

                <div class="col-md-9">
                    <form class="rounded position-relative">


                        <input class="form-control pe-5 bg-transparent" type="search"
                               placeholder="جستجو" aria-label="Search">
                        <button
                            class="btn bg-transparent px-2 py-0 position-absolute top-50 end-0 translate-middle-y"
                            type="submit"><i class="fas fa-search fs-6 "></i></button>
                    </form>
                </div>
            </div>


            @if($openedTasksCount >= \App\Http\Controllers\ConstController::limitDosntCompletedTask)
                <div class="alert alert-danger">
                    برای مشاهده ویدیوهای جدید، تکالیف حل نشده ی شما نباید بیشتر
                    از {{\App\Http\Controllers\ConstController::limitDosntCompletedTask}} مورد باشد

                    <br>
                    <span>شما </span>
                    <strong>{{$openedTasksCount}}</strong>
                    <span>تکلیف بدون پاسخ دارید.</span>
                </div>
            @endif


            <div class="table-responsive border-0">
                <table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
                    <!-- Table head -->
                    <thead>
                    <tr>
                        <th scope="col" class="border-0 rounded-start">شرح</th>
                        <th scope="col" class="border-0 ">پاسخ ها</th>
                        <th scope="col" class="border-0 rounded-end">عملیات</th>
                    </tr>
                    </thead>

                    <!-- Table body START -->
                    <tbody>
                    <!-- Table item -->
                    @foreach($items as $item)
                        <tr>
                            <!-- Table data -->
                            <td>
                                @if($item->video)
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
                                @endif
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
                                    <a href="/student/tasks/{{$item->id}}/" class="fs-6">اولین باشید</a>
                                @endif
                            </td>
                            <!-- Table data -->

                            <!-- Table data -->
                            <td>


                                @if($item->answers()->where('user_id', Auth::id())->exists())
                                    <a href="/student/tasks/{{$item->id}}/"

                                       title="مشاهده پاسخ ها"
                                       class="btn btn-sm btn-warning me-1 mb-1 mb-md-0 w-100"

                                    >
                                        <i class="fas fa-sticky-note"></i>
                                        <span>مشاهده</span>

                                    </a>
                                @else
                                    <a href="/student/tasks/{{$item->id}}/"
                                       title="ثبت پاسخ"
                                       class="btn btn-sm btn-primary me-1 mb-1 mb-md-0">
                                        <i class="far fa-sticky-note"></i>
                                        <span>پاسخ دهید</span>

                                    </a>
                                @endif
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



