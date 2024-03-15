<div style="display: flex; align-items: center; justify-content: space-between" class="mb-4">
    <h1 class="fs-5 ">تغییر پسورد</h1>
    <span class="btn" wire:click="back">برگشت</span>
</div>


<form wire:submit.prevent="changePassword"
      style="display: block; width: 400px; max-width: 100%">

    @csrf

    <div class="mb-4">
        <div class="input-group input-group-lg">

            <input wire:model.defer="newPassword" type="password" placeholder="پسورد جدید"
                   class="form-control border-1  rounded-end ps-2  @if ($errors->has('newPassword')) border-danger @endif  "
                   id="exampleInputEmail1">

        </div>
        @if ($errors->has('newPassword'))
            <div class="form-text">
                {{ $errors->first('newPassword') }}
            </div>
        @endif
    </div>


    <div class="mb-4">
        <div class="input-group input-group-lg">

            <input wire:model.defer="confirmationPassword" type="password" placeholder="تکرار پسورد جدید"
                   class="form-control border-1  rounded-end ps-2  @if ($errors->has('confirmationPassword')) border-danger @endif  "
                   id="exampleInputEmail1">

        </div>
        @if ($errors->has('confirmationPassword'))
            <div class="form-text">
                {{ $errors->first('confirmationPassword') }}
            </div>
        @endif
    </div>


    <div class="align-items-center mt-0">
        <div class="d-grid">
            <button class="btn btn-primary mb-0"
                    type="submit">ثبت پسورد جدید</button>
        </div>
    </div>
</form>

