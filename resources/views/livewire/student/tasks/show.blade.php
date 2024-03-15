<div>

    <style>
        .ek__image-purview button {
            background-color: transparent;
            border: none;
            outline: 0;
            color: white;
            background-color: red;

            align-items: center;
            justify-content: center;
            position: absolute;
            bottom: 10px;
            margin: auto;
            border-radius: 9px;
            font-size: 12px;
            width: 50px;
            left: 0;
            right: 0;


        }

        .ek__image-purview div {
            background-color: #cbebfa;
            padding: 6px;
            border-radius: 6px;
            border: 1px solid #eee;
            position: relative;
            overflow: hidden;
            margin-left: 10px;
        }

        .ek__image-purview img {
            width: 100px;
            height: 100px;
            object-fit: cover;
        }
    </style>

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
                                <h3 class="mb-2 mb-sm-0 h5"></h3>
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



                                    @if ($errors->has('answer.body'))
                                        <div class="form-text text-danger">
                                            {{ $errors->first('answer.body') }}
                                        </div>
                                    @endif

                                </div>


                                <div class="mb-3">
                                    <label for="formFileMultiple" class="form-label">آپلود فایل:</label>
                                    <input wire:model="images" class="form-control" type="file" id="formFileMultiple"
                                           multiple>
                                </div>


                                <div class="ek__image-purview d-flex align-items-center ">
                                    @foreach ($images  as $m)
                                        <div wire:key="{{$loop->index}}">
                                            @if($m->temporaryUrl())
                                                <img src="{{$m->temporaryUrl()}}">
                                                <button type="button" wire:click="removeMe({{$loop->index}})">
                                                    X حذف
                                                </button>
                                            @endif
                                        </div>

                                    @endforeach
                                </div>


                                @if ($errors->has('images'))
                                    <div class="form-text text-danger">
                                        {{ $errors->first('images') }}
                                    </div>
                                @endif

                            </div>
                            <!-- Card body END -->
                        </form>
                    </div>

                @endif
            </div>


            @if($answers->count() > 0)
                <div class="card border bg-transparent rounded-3">
                    <!-- Header START -->
                    <div class="card-header bg-transparent border-bottom">
                        <div class="row justify-content-between align-middle">
                            <!-- Title -->
                            <div class="col-sm-6">
                                <h3 class="card-header-title mb-2 mb-sm-0">پاسخ دانشجویان</h3>
                            </div>

                            <!-- Short by filter -->

                        </div>
                    </div>
                    <!-- Header END -->

                    <!-- Reviews START -->
                    <div class="card-body mt-2 mt-sm-4">

                        @foreach($answers as $item)
                            <div class="d-sm-flex ">
                                <!-- Avatar image -->
                                <img class="avatar avatar-lg rounded-circle float-start me-3"
                                     src="{{$item->user->avatar_path}}" alt="avatar">
                                <div class="w-100">
                                    <div class="mb-3 d-sm-flex justify-content-sm-between align-items-center">
                                        <!-- Title -->
                                        <div >
                                            <h5 class="m-0">{{$item->user->name}}</h5>
                                            <span>ثبت شده در </span>
                                            <span class="me-3 small">{{verta($item->created_at)}}</span>
                                        </div>
                                        <!-- Review star -->

                                    </div>
                                    <!-- Content -->

                                    <p> {{$item->body}}</p>
                                    <!-- Button -->


                                    <div class="ek__image-purview d-flex align-items-center ">
                                        @foreach ($item->getMedia()  as $m)
                                            <div wire:key="{{$loop->index}}">
                                                <a href="{{$m->getUrl()}}">
                                                    <img src="{{$m->getUrl()}}">
                                                </a>

                                            </div>

                                        @endforeach
                                    </div>

                                    <div class="text-end">

{{--                                        @if(true and $item->user_id == Auth::id())--}}
                                            {{--                                        <span--}}
                                            {{--                                            class="btn btn-sm btn-success mb-0"--}}
                                            {{--                                            wire:click="setItem({{$item->id}})"--}}
                                            {{--                                            title="ویرایش"--}}
                                            {{--                                        >--}}
                                            {{--                                            <i class="fas fa-edit"></i>--}}
                                            {{--                                        </span>--}}


{{--                                            <span--}}
{{--                                                class="btn btn-sm btn-warning mb-0"--}}
{{--                                                wire:click="showAnswer()"--}}
{{--                                                title="نمایش"--}}
{{--                                            >--}}
{{--                                            <i class="fas fa-edit"></i>--}}
{{--                                        </span>--}}

{{--                                            <span--}}
{{--                                                class="btn btn-sm btn-danger mb-0"--}}
{{--                                                wire:click="deleteItem({{$item->id}})"--}}
{{--                                                title="حذف"--}}
{{--                                            >--}}

{{--                                            <i class="fas fa-trash"></i>--}}
{{--                                        </span>--}}

{{--                                        @endif--}}


{{--                                        <a href="#" class="btn btn-sm btn-primary-soft mb-1 mb-sm-0">Direct message</a>--}}
{{--                                        <a class="btn btn-sm btn-light mb-0" data-bs-toggle="collapse"--}}
{{--                                           href="#collapseComment" role="button" aria-expanded="false"--}}
{{--                                           aria-controls="collapseComment">--}}
{{--                                            Reply--}}
{{--                                        </a>--}}
                                        <!-- collapse textarea -->

                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endforeach



                    </div>
                    <!-- Reviews END -->


                </div>

            @endif


    </div>


</div>

