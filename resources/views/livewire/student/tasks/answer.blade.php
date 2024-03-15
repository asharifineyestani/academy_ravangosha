<div>


    <div class="card border mb-4">
        <div class="card-header border-bottom">
            <!-- Card START -->
            <div class="card">
                <div class="row g-0">
                    <div class="col-md-3">
                        @if($task->video)
                            <img src="{{$task->video->thumbnail_path}}" class="rounded-2" alt="Card image" width="228"
                                 height="128">
                        @endif
                    </div>
                    <div class="col-md-9">
                        <div class="card-body">
                            <!-- Title -->
                            <h3 class="card-title">{{$task->body}}</h3>

                            <!-- Info -->
                            <ul class="list-inline mb-2">

                                {{--                                                                <li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i class="fas fa-table text-orange me-2"></i>82 lectures</li>--}}
                                {{--                                                                <li class="list-inline-item h6 fw-light"><i class="fas fa-signal text-success me-2"></i>Beginner</li>--}}
                            </ul>

                            <!-- button -->

                        </div>
                    </div>
                </div>
            </div>
            <!-- Card END -->
        </div>


        @if( ! $editable)
            <div class="card-body">
                @if($message)
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <button class="btn btn-sm btn-success mb-0" wire:click="doAnswer">ثبت پاسخ جدید</button>
                @else
                    <div>
                        <form wire:submit.prevent="createOrUpdateAnswer">
                            <!-- Card header -->


                            <div
                                class="card-header bg-transparent d-sm-flex justify-content-sm-between align-items-center border-bottom">
                                <h3 class="mb-2 mb-sm-0 h5">{{$heading}}</h3>
                                @if( ! $viewMode)
                                    <button class="btn btn-sm btn-success mb-0">ثبت تغییرات</button>
                                @else
                                    <button class="btn btn-sm btn-primary mb-0" wire:click="doAnswer">پاسخ من</button>
                                @endif
                            </div>
                            <!-- Card body START -->
                            <div class="card-body">
                                <!-- Form -->


                                <!-- About me -->
                                <div class="col-12 mb-4">
                                    <label class="form-label">متن پاسخ:</label>
                                    <textarea class="form-control" rows="3" wire:model.defer="answer.body"
                                              @if($viewMode) disabled @endif></textarea>
                                    {{--                <div class="form-text">Brief description for your profile.</div>--}}


                                    @if ($errors->has('task.body'))
                                        <div class="form-text text-danger">
                                            {{ $errors->first('task.body') }}
                                        </div>
                                    @endif

                                </div>


                                @foreach ($media ?? [] as $m)



                                    <img src="{{$m->temporaryUrl()}}" width="200" >

                                @endforeach


                                <div class="mb-3">
                                    <label for="formFileMultiple" class="form-label">آپلود فایل:</label>
                                    <input wire:model="media" class="form-control" type="file" id="formFileMultiple"
                                           multiple>
                                </div>

                            </div>
                            <!-- Card body END -->
                        </form>
                    </div>

                @endif
            </div>

            @if($answers->count() > 0)


                <div class="table-responsive border-0">
                    <table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
                        <!-- Table head -->
                        <thead>
                        <tr>
                            <th scope="col" class="border-0 rounded-start">تاریخ</th>
                            <th scope="col" class="border-0 ">کاربر</th>
                            <th scope="col" class="border-0">پاسخ</th>
                            <th scope="col" class="border-0 rounded-end">Action</th>
                        </tr>
                        </thead>
                        <!-- Table body -->
                        <tbody>
                        <!-- Table item -->

                        @foreach($answers as $item)
                            <tr>
                                <!-- Date item -->
                                <td class="w-100px">{{verta($item->created_at)}}</td>
                                <td class="w-100px">
                                    @if($item->user)
                                        <a href="/admin/users/{{$item->user->id}}/statistics">
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
                                </td>

                                <!-- Title item -->
                                <td>
                                    <h6 class="mt-2 mt-lg-0 mb-0"> {{excerpt($item->body , 120)}}</h6>
                                </td>

                                <td>
                                    @if($item->user_id == Auth::id())
                                        <span
                                            class="btn btn-sm btn-success mb-0"
                                            wire:click="setItem({{$item->id}})"
                                            title="ویرایش"
                                        >
                                            <i class="fas fa-edit"></i>
                                        </span>

                                        <span
                                            class="btn btn-sm btn-danger mb-0"
                                            wire:click="deleteItem({{$item->id}})"
                                            title="حذف"
                                        >

                                            <i class="fas fa-trash"></i>
                                        </span>

                                    @else
                                        <span
                                            class="btn btn-sm btn-warning mb-0"
                                            wire:click="showItem({{$item->id}})"
                                            title="مشاهده"
                                        >
                                             <i class="fas fa-eye"></i>
                                        </span>
                                    @endif


                                </td>


                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>


            @endif
    </div>


</div>

