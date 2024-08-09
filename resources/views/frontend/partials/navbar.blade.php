<div class="container d-flex align-items-center">

    <div class="logo me-auto">
        <h1>
            <img src="{{ asset('images/logo.png') }}" alt="" srcset="">
        </h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
    </div>
    <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
            <li><a class="nav-link scrollto active" href="{{ route('home') }}">Home</a></li>
            <li><a class="nav-link scrollto" href="{{ route('home') }}#about">About</a></li>
            <li><a class="nav-link scrollto " href="{{ route('home') }}#event">Event</a></li>
            <li><a class="nav-link scrollto " href="{{ route('home') }}#gallery">Gallery</a></li>
            <li><a class="nav-link scrollto" href="{{ route('home') }}#testimonials">Testimonials</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

    <div class="header-social-links d-flex align-items-center">
        <a href="{{ route('login') }}" class="btn btn-primary btn-lg text-sm text-light p-3">Login</a>
    </div>

</div>
