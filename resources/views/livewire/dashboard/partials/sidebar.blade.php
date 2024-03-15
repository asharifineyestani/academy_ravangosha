<nav class="navbar navbar-light navbar-expand-xl mx-0">
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <!-- Offcanvas header -->
        <div class="offcanvas-header bg-light">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">My profile</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <!-- Offcanvas body -->
        <div class="offcanvas-body p-3 p-xl-0">
            <div class="bg-dark border rounded-3 pb-0 p-3 w-100">
                <!-- Dashboard menu -->
                <div class="list-group list-group-dark list-group-borderless">
                    @foreach($links as $link)
                        <a class="list-group-item @if($link['active']) active @endif" href="{{$link['href']}}">

                           <i class=" {{$link['icon'] ?? ''}}"></i>
                            {{$link['title']}}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</nav>
