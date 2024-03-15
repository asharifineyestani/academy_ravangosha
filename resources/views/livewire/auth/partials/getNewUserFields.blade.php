<div style="display: flex; align-items: center; justify-content: space-between" class="mb-4">
    <h1 class="fs-5 ">تکمیل ثبت نام</h1>


</div>

<p class=""></p>

<form wire:submit.prevent="register"
      style="display: block; width: 400px; max-width: 100%">
    @csrf

    <div class="mb-4">
        <div class="input-group input-group-lg">

            <input wire:model.defer="name" value="{{old('name')}}" type="text"
                   class="form-control border-1  rounded-end ps-2 @if ($errors->has('name')) border-danger @endif"
                   placeholder="نام شما" id="exampleInputEmail1">
        </div>

        @if ($errors->has('name'))
            <div class="form-text text-danger">
                {{ $errors->first('name') }}
            </div>
        @endif
    </div>

    <div class="align-items-center mt-0">
        <div class="d-grid">
            <button class="btn btn-primary mb-0"
                    type="submit">برو به داشبورد</button>
        </div>
    </div>
    <div class="form-text text-center mt-3" style="font-size: 12px">ورود شما به معنای پذیرش شرایط
        وقوانین حریم‌خصوص است.
    </div>
</form>
