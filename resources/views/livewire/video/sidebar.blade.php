<div class="justify-content-end position-relative">
    <!-- Collapse button START -->
    <button class="navbar-toggler btn btn-white mt-4 plyr-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapseWidthExample" aria-expanded="false"
            aria-controls="collapseWidthExample">
					<span class="navbar-toggler-animation">
						<span></span>
						<span></span>
						<span></span>
					</span>
    </button>
    <!-- Collapse button END -->

    <!-- Collapse body START -->
    <div class="collapse collapse-horizontal" id="collapseWidthExample">
        <div class="card vh-100 overflow-auto rounded-0 w-280px w-sm-400px">
            <!-- Title -->
            <div class="card-header bg-light rounded-0">

            </div>

            <!-- Course content START -->
            <div class="card-body">
                <div class="d-sm-flex justify-content-sm-between">
                    <h5 class="h6">{{$video->title}}</h5>
                    <!-- Button -->
                    @if($video->tasks()->count() > 0)
                        @foreach($video->tasks as $task)
                            <a class="btn btn-sm btn-warning"
                               href="/student/tasks/{{$task->id}}"
                               target="_blank"
                            >
                                تکلیف
                            </a>
                        @endforeach
                    @endif
                </div>
                <hr> <!-- Divider -->
                <!-- Course START -->
                <div class="row">
                    <div class="col-12">
                        <!-- Accordion START -->
                        <div class="accordion accordion-flush-light accordion-flush" id="accordionExample">


                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                            aria-expanded="true" aria-controls="collapseOne">
                                        <span class="mb-0 fw-bold">عناوین آموزشی</span>
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                     aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body px-3">
                                        <div class="vstack gap-3">
                                            <table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
                                                @foreach($video->course->arvanVideos()->orderBy('sort_number','Asc')->get() as $v)
                                                    <tr>
                                                        <livewire:video.item :video="$v" :currentVideoId="$video->id"/>
                                                    </tr>

                                                @endforeach
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <!-- Accordion END -->
                    </div>
                </div>
                <!-- Course END -->
            </div>
            <!-- Course content END -->

            <div class="card-footer">
                <div class="d-grid">
                    <a href="/courses/{{$video->course->id}}" class="btn btn-primary-soft mb-0">برگشت به دوره</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Collapse body END -->
</div>
