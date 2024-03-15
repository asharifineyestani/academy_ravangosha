
<div style="display: flex; align-items: center; justify-content: space-between" class="mb-4">
    <h1 class="fs-5 ">ورود | ثبت نام</h1>


</div>


<p>
    <span style="display: block">سلام!</span>
    لطفا تلفن همراه خود را وارد نمایید
</p>
<p class=""></p>

<form wire:submit.prevent="loginOrRegister"
      style="display: block; width: 400px; max-width: 100%">
    @csrf

    <div class="mb-4">
        <div class="input-group input-group-lg">

            <input wire:model.defer="mobile" value="{{old('mobile')}}" type="mobile"
                   class="form-control border-1  rounded-end ps-2 @if ($errors->has('mobile')) border-danger @endif "

                   placeholder="09xx xxx xxxx" id="exampleInputEmail1">
        </div>

        @if ($errors->has('mobile'))
            <div class="form-text text-danger">
                {{ $errors->first('mobile') }}
            </div>
        @endif
    </div>

    <div class="align-items-center mt-0">
        <div class="d-grid">
            <button class="btn btn-primary mb-0"
                    type="submit">ورود یا ثبت نام
            </button>
        </div>
    </div>
    <div class="form-text text-center mt-3" style="font-size: 12px">ورود شما به معنای پذیرش شرایط
        وقوانین حریم‌خصوص است.
    </div>
</form>
