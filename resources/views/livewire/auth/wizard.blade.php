<section style="display: flex; align-items: center; justify-content: center; width: 100%; height: 100vh;">
    <div>
        <div style="border: 1px solid #eee; border-radius: 6px; padding: 10% ">

            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif


            @include('livewire.auth.partials.'.$step)
        </div>

    </div>
</section>
