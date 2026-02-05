<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Umahku.</title>

    <!-- Bootstrap & Font -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@200..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family==Zalando+Sans+Expanded:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">

    <!-- CSS -->
    <style>
        
        .navbar-transparent {
            background-color: transparent !important ;
            transition: background-color 0.3s ease , box-shadow 0.3s ease;
        }

        .navbar-scrolled {
            background-color: #fff !important;
            box-shadow: 0 2px 10px rgba(0,0,0,0.06);
            border-bottom: 1px solid rgba(0,0,0,0.04);
        }

        .navbar-transparent .nav-link,
        .navbar-transparent .navbar-brand {
            color: #fff !important;
        }

        .navbar-scrolled .nav-link,
        .navbar-scrolled .navbar-brand {
            color: #000 !important;
        }

        .navbar-transparent i {
            color: #fff;
        }

        .navbar-scrolled i {
            color:#000;
        }

        .navbar-transparent {
            backdrop-filter: blur(6px);
        }

        body {
            scroll-behavior: smooth;
            font-family: 'Poppins';
        }
        section {
            padding: 80px 0;
        }
        footer {
            background-color: #222;
            color: #fff;
            padding: 20px 0;
        }

        navbar-nav nav-link:hover {
            color: #000;
        }

    </style>
</head>
<body>

<!-- ================= NAVBAR ================= -->
<nav class="navbar navbar-expand-lg navbar-transparent fixed-top" style="border-bottom:1px solid rgba(0,0,0,0.20)">
    <div class="container position-relative">
        <a class="navbar-brand" href="{{ route('user.home') }}#hero" style="font-weight: 450; font-family: Unbounded;">
            <i class="bi bi-house"></i>
        UMAHKU.</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarNav" >
            <ul class="navbar-nav gap-2">
                <li class="nav-item"><a class="nav-link" href="{{ route('user.home') }}#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('user.home') }}#vision">Vision & Mission</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('user.home') }}#clients">Clients</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('user.home') }}#products">Products</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('user.home') }}#gallery">Gallery</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('user.home') }}#articles">Articles</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('user.home') }}#events">Events</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('user.home') }}#contact">Contact</a></li>

                <div class="login-icon position-absolute end-0 d-none d-lg-flex align-items-center">
            @auth
                <a href="/admin/dashboard" class="nav-link">
                    <i class="bi bi-person-circle fs-5"></i>
                </a>
            @else
                <a href="/login" class="nav-link">
                    <i class="bi bi-person fs-5"></i>
                </a>
            @endauth
        </div>
            </ul>
        </div>
    </div>
</nav>

<!-- ================= MAIN CONTENT ================= -->
<main style="margin-top: px;">
    @yield('content')
</main>

<!-- ================= FOOTER ================= -->
<footer>
    <div class="container text-center">
        <p class="mb-1">&copy; {{ date('Y') }} UMAHKU.</p>
        <p class="mb-0">High Quality Furniture for Modern Living</p>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const navbar = document.querySelector(".navbar");
    const hero = document.querySelector("#hero");

    //agar tidak transparent
    if (!hero) {
        navbar.classList.remove("navbar-transparent");
        navbar.classList.add("navbar-scrolled");
        return;
    }

    const heroHeight = hero.offsetHeight;

    window.addEventListener("scroll", function () {
        if (window.scrollY > heroHeight - 80) {
            navbar.classList.add("navbar-scrolled");
            navbar.classList.remove("navbar-transparent");
        } else {
            navbar.classList.add("navbar-transparent");
            navbar.classList.remove("navbar-scrolled");
        }
    });
});

//events
    const slider = document.getElementById('eventSlider');
    const slides = document.querySelectorAll('.event-slide');
    const nextBtn = document.getElementById('nextBtn');
    const prevBtn = document.getElementById('prevBtn');

    let index = 0;

    nextBtn.onclick = () => {
        if (index < slides.length - 1) {
            index++;
            slider.style.transform = `translateX(-${index * 100}%)`;
        }
    };

    prevBtn.onclick = () => {
        if (index > 0) {
            index--;
            slider.style.transform = `translateX(-${index * 100}%)`;
        }
    };

</script>


    @stack('scripts')

</body>
</html>
