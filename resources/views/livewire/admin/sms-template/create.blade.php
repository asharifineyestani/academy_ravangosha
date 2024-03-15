<div class="card bg-transparent border rounded-3 mb-4 z-index-9">
    <!-- Card header START -->
    <div
        class="card-header bg-transparent d-sm-flex justify-content-sm-between align-items-center border-bottom">
        <h3 class="mb-2 mb-sm-0">تغییر اطلاعات</h3>
    </div>
    <!-- Card header END -->

    <!-- Card body START -->

    <div id="collapse-1" class="accordion-collapse collapse show" aria-labelledby="heading-1"
         data-bs-parent="#accordioncircle">
        <!-- Accordion body -->
        <div class="accordion-body">
            <!-- Form START -->
            <form  wire:submit.prevent="createOrUpdate">
            @csrf
            <!-- Card number -->

                <div class="col-12">
                    <label class="form-label">شناسه قالب<span
                            class="text-danger">*</span>
                    </label>
                    <div class="position-relative">
                        <input
                            wire:model.defer="item.template_id"
                            type="text"
                            class="form-control"
                            placeholder="شناسه قالب"
                        >
                    </div>
                </div>


                <div class="col-12">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">متن قالب</label>
                        <textarea
                            wire:model.defer="item.body"
                            class="form-control"
                            rows="3">

                        </textarea>
                    </div>
                </div>

                <div class="col-12">
                    <button class="btn btn-sm btn-success mb-0" type="submit">ساخت قالب</button>
                </div>


            </form>
            <!-- Form END -->
        </div>
    </div>


    <!-- Card body START -->
</div>
