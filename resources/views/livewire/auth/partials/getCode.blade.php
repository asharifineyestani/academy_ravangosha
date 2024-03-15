<div style="display: block; width: 400px; max-width: 100%">
    <div style="display: flex; align-items: center; justify-content: space-between" class="mb-4">
        <h1 class="fs-5 ">کد تایید را وارد کنید</h1>
        <span class="btn" wire:click="back">برگشت</span>

    </div>
    <p class="fs-6">


        {{$this->getCodeText()}}

    </p>


    <form wire:submit.prevent="isValidCode"
    >

        @csrf

        <div class="mb-4">
            <div class="input-group input-group-lg">

                <input wire:model.defer="code" type="number" placeholder="xxxx"
                       class="form-control border-1  rounded-end ps-2  @if ($errors->has('code')) border-danger @endif  "
                       id="exampleInputEmail1">

            </div>
            @if ($errors->has('code'))
                <div class="form-text text-danger">
                    {{ $errors->first('code') }}
                </div>
            @endif
        </div>


        <div class="align-items-center mt-0">
            <div class="d-grid">
                <button class="btn btn-primary mb-0"
                        type="submit">بررسی کد
                </button>
            </div>
        </div>


        <div wire:poll.1000ms="decrement">

            <div class="form-text text-center mt-3" style="font-size: 12px">
                @if($count > 0)
                    <p><span>{{$count}}</span>
                        مانده تا دریافت مجدد کد</p>
                @else
                    <button class="border-0 bg-transparent" wire:click="resendCode">درخواست مجدد کد</button>
                @endif
            </div>

        </div>


    </form>

</div>
