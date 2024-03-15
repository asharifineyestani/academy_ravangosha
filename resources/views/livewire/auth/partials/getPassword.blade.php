<div style="display: flex; align-items: center; justify-content: space-between" class="mb-4">
    <h1 class="fs-5 ">رمز عبور را وارد نمایید</h1>
    <span class="btn" wire:click="back">برگشت</span>
</div>


<form wire:submit.prevent="loginByPassword"
      style="display: block; width: 400px; max-width: 100%">

    @csrf

    <div class="mb-4">
        <div class="input-group input-group-lg">

            <input wire:model.defer="password" type="password"
                   class="form-control border-1  rounded-end ps-2  @if ($errors->has('password')) border-danger @endif  "
                   id="exampleInputEmail1">

        </div>
        @if ($errors->has('password'))
            <div class="form-text text-danger">
                {{ $errors->first('password') }}
            </div>
        @endif
    </div>


    <div class="align-items-center mt-0">
        <div class="d-grid">
            <button class="btn btn-primary mb-0"
                    type="submit">ورود</button>
        </div>
    </div>
</form>

<div class="mt-4">
    <button class="border-0 bg-transparent d-block mb-4" wire:click="loginWithToken"> ورود با رمز یکبار مصرف ></button>
    <button class="border-0 bg-transparent" wire:click="forgotPassword" >فراموشی رمز عبور ></button>
</div>

