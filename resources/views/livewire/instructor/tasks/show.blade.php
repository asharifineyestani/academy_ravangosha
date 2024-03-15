<div>
    <div class="card border mb-4">
        <div class="card-header border-bottom">
            <!-- Card START -->
            <div class="card">
                <div class="row g-0">
                    <div class="col-md-3">
                        <img src="{{$task->video->thumbnail_path ?? ''}}" class="rounded-2" alt="Card image" width="228" height="128">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body">
                            <!-- Title -->
                            <h3 class="card-title"><a href="#">{{$task->body}}</a></h3>

                            <!-- Info -->
                            <ul class="list-inline mb-2">
                                <li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i class="far fa-clock text-danger me-2"></i>{{$task->video->duration_minute}}</li>
                                {{--                                <li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i class="fas fa-table text-orange me-2"></i>82 lectures</li>--}}
                                {{--                                <li class="list-inline-item h6 fw-light"><i class="fas fa-signal text-success me-2"></i>Beginner</li>--}}
                            </ul>

                            <!-- button -->
                            <a href="/cloud/videos/{{$task->id}}" class="btn btn-primary-soft btn-sm mb-0">مشاهده</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card END -->
        </div>


            <div class="card-body">
                @if($message)
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

            </div>

            @if($task->answers()->count() > 0)


                <div class="table-responsive border-0">
                    <table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
                        <!-- Table head -->
                        <thead>
                        <tr>
                            <th scope="col" class="border-0 rounded-start">تاریخ</th>
                            <th scope="col" class="border-0 ">کاربر</th>
                            <th scope="col" class="border-0">عنوان تمرین</th>
                            <th scope="col" class="border-0 rounded-end">Action</th>
                        </tr>
                        </thead>
                        <!-- Table body -->
                        <tbody>
                        <!-- Table item -->

                        @foreach($task->answers()->get() as $answer)
                            <tr>
                                <!-- Date item -->
                                <td class="w-100px">{{verta($answer->created_at)}}</td>
                                <td>
                                    @if($answer->user)
                                        <a href="/admin/users/{{$answer->user->id}}/statistics">
                                            <img
                                                width="40"
                                                height="40"
                                                src="{{$answer->user->avatar_path}}"
                                                alt="{{$answer->user->name}}"
                                                title="{{$answer->user->name}}"
                                            >
                                        </a>

                                    @else
                                        <span>کاربر مهمان</span>
                                    @endif

                                </td>

                                <!-- Title item -->
                                <td>
                                    <h6 class="mt-2 mt-lg-0 mb-0"><a href="#"> {{$answer->body}}</a></h6>
                                </td>

                                <td>
                                <span
                                    class="btn btn-sm btn-success mb-0"

                                    title="مشاهده پاسخ کامل"
                                >
                                   <i class="fas fa-edit"></i>
                                </span>

                                    <span
                                        class="btn btn-sm btn-danger mb-0"

                                        title="حذف"
                                    >

                                <i class="fas fa-trash"></i>
                            </span>


                                </td>


                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>


            @endif
    </div>








</div>

