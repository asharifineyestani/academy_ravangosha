<div class="mt-2 mt-sm-0">
    <span >{{$message}}</span>
    @if($enableInput)
        <form class="position-relative" wire:submit.prevent="curlVideo">
            @csrf
            <input wire:model.defer="videoId"
                   class="form-control pe-5 bg-transparent" type="text" placeholder="شناسه ویدیو را وارد کنید">
            <button
                class="btn bg-transparent px-2 py-0 position-absolute top-50 end-0 translate-middle-y"
                type="submit">
                <i class="fas fa-spider"></i>
            </button>
        </form>

    @else
        <a wire:click="toggleEnableInput" class="btn btn-outline-primary mb-0">
            <i class="fas fa-video"></i> <i class="fas fa-spider"></i>
        </a>
    @endif

</div>
