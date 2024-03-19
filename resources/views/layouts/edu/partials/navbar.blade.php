<header class="navbar-light navbar-sticky">
    <nav class="navbar navbar-expand-xl">
        <div class="container">

            <div class="row d-flex w-100 mx-auto align-items-center">
                <!-- Header left side START -->
                <div class="col-3 col-md-4 col-xl-5 d-flex align-items-center ps-0">
                    <!-- Responsive navbar toggler -->
                    <button class="navbar-toggler p-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-animation">
							<span></span>
							<span></span>
							<span></span>
						</span>
                        <span class="text-body small d-none d-sm-inline-block ms-2">Menu</span>
                    </button>

                    <!-- Main navbar START -->
                    @include('layouts.edu.partials.navbar.menu')

                    <!-- Main navbar END -->
                </div>
                <!-- Header left side END -->

                <!-- Logo START -->
                <div class="col-6 col-md-4 col-xl-2 text-center d-flex">
                    <a class="navbar-brand mx-auto" href="index.html">
                        <img class="navbar-brand-item light-mode-item" src="/edu/assets/images/logo.svg" alt="logo">
                        <img class="navbar-brand-item dark-mode-item" src="/edu/assets/images/logo-light.svg" alt="logo">
                    </a>
                </div>
                <!-- Logo END -->

                <!-- Header right side START -->
                <div class="col-3 col-md-4 col-xl-5 d-flex justify-content-end pe-0">
                    <ul class="nav flex-row align-items-center list-unstyled ms-xl-auto">
                        <!-- Dark-mode -->
                        @include('layouts.edu.partials.navbar.dark_mode')
                        <!-- Add to cart -->
                        @include('layouts.edu.partials.navbar.cart')
                        <!-- Search -->
                        @include('layouts.edu.partials.navbar.search')
                        <!-- Sign In button -->
                        @include('layouts.edu.partials.navbar.auth')
                    </ul>
                </div>
                <!-- Header right side END -->
            </div>
        </div>
    </nav>
    <!-- Logo Nav END -->
</header>
