<header class="navbar-light navbar-sticky mb-6">
    <nav class="navbar navbar-expand-xl">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img class="light-mode-item navbar-brand-item" src="/assets/images/logo.png" alt="logo">
                <img class="dark-mode-item navbar-brand-item" src="/assets/images/logo-light.svg" alt="logo">
            </a>
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
				<span class="navbar-toggler-animation">
					<span></span>
					<span></span>
					<span></span>
				</span>
            </button>


            <div class="dropdown ms-1 ms-lg-0">
                <button type="submit" class="btn">انتشار</button>
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
                    <hr class="dropdown-divider">
                    </li>
                    <li>
                    <li><a class="dropdown-item bg-danger-soft-hover " href="{{route('signout')}}"><i class="bi bi-gear fa-fw me-2"></i>خروج</a></li>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
