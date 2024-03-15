<div>



    <div class="card border mb-4">
        <div class="card-header border-bottom">
            <!-- Card START -->
            <div class="card">
                <div class="row g-0">
                    <div class="col-md-3">
                        <img src="{{$video->thumbnail_path}}" class="rounded-2" alt="Card image" width="228" height="128">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body">
                            <!-- Title -->
                            <h3 class="card-title"><a href="#">{{$video->title}}</a></h3>

                            <!-- Info -->
                            <ul class="list-inline mb-2">
                                <li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i class="far fa-clock text-danger me-2"></i>{{$video->duration_minute}}</li>
{{--                                <li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i class="fas fa-table text-orange me-2"></i>82 lectures</li>--}}
{{--                                <li class="list-inline-item h6 fw-light"><i class="fas fa-signal text-success me-2"></i>Beginner</li>--}}
                            </ul>

                            <!-- button -->
                            <a href="/cloud/videos/{{$video->id}}" class="btn btn-primary-soft btn-sm mb-0">مشاهده</a>
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
            <button class="btn btn-sm btn-success mb-0" wire:click="makeEditable">ثبت تکلیف جدید</button>
                @else
                    <div >
                        <form  wire:submit.prevent="createOrUpdateTask">
                            <!-- Card header -->


                            <div
                                class="card-header bg-transparent d-sm-flex justify-content-sm-between align-items-center border-bottom">
                                <h3 class="mb-2 mb-sm-0 h5">{{$heading}}</h3>
                                <button class="btn btn-sm btn-success mb-0">ثبت تغییرات</button>
                            </div>
                            <!-- Card body START -->
                            <div class="card-body">
                                <!-- Form -->


                                <!-- About me -->
                                <div class="col-12">
                                    <label class="form-label">متن تکلیف:</label>
                                    <textarea class="form-control" rows="3" wire:model.defer="task.body"></textarea>
                                    {{--                <div class="form-text">Brief description for your profile.</div>--}}


                                    @if ($errors->has('task.body'))
                                        <div class="form-text text-danger">
                                            {{ $errors->first('task.body') }}
                                        </div>
                                    @endif

                                </div>


                            </div>
                            <!-- Card body END -->
                        </form>
                    </div>

                @endif
        </div>

            @if(count($items) > 0)


                <div class="table-responsive border-0">
                    <table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
                        <!-- Table head -->
                        <thead>
                        <tr>
                            <th scope="col" class="border-0 rounded-start">تاریخ</th>
                            <th scope="col" class="border-0">عنوان تمرین</th>
                            <th scope="col" class="border-0 rounded-end">Action</th>
                        </tr>
                        </thead>
                        <!-- Table body -->
                        <tbody>
                        <!-- Table item -->

                        @foreach($items as $item)
                            <tr>
                                <!-- Date item -->
                                <td>{{verta($item->created_at)}}</td>

                                <!-- Title item -->
                                <td>
                                    <h6 class="mt-2 mt-lg-0 mb-0"><a href="#"> {{excerpt($item->body , 120)}}</a></h6>
                                </td>

                                <td>
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


                                </td>


                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>


            @endif
    </div>








</div>

