<div class="dropdown ms-1 ms-lg-0">
    <a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside"
       data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
        <img class="avatar-img rounded-circle" src="{{Auth::user()->avatar_path}}" alt="avatar">
    </a>
    <ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3"
        aria-labelledby="profileDropdown">
        <!-- Profile info -->
        <li class="px-3">
            <div class="d-flex align-items-center">
                <!-- Avatar -->
                <div class="avatar me-3">
                    <img class="avatar-img rounded-circle shadow" src="{{Auth::user()->avatar_path}}"
                         alt="avatar">
                </div>
                <div>
                    <a class="h6" href="#">{{Auth::user()->name}}</a>
                    <p class="small m-0">{{Auth::user()->mobile}}</p>
                </div>
            </div>
            <hr>
        </li>
        <!-- Links -->

        @foreach($loggedMenu as $a)
        <li><a class="dropdown-item @isset($a['class']) {{$a['class']}} @endif" href="{{$a['href']}}"><i class="bi bi-gear fa-fw me-2"></i>{{$a['title']}}</a></li>
        @endforeach
            <hr class="dropdown-divider">
        </li>
        <!-- Dark mode switch START -->
        <li>
        <li><a class="dropdown-item bg-danger-soft-hover " href="{{route('signout')}}"><i class="bi bi-gear fa-fw me-2"></i>خروج</a></li>
        </li>
        <!-- Dark mode switch END -->
    </ul>
</div>
