<div >
    @if($message)
        @include('livewire.dashboard.partials.created')
    @else
        @include($renderPath)
    @endif
</div>
