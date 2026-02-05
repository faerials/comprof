@extends('user.layout.main')

@section('content')

  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">



  <!--Jumbotron-->
  <section id="hero" class="hero-section">
    <div class="hero-img-wrapper">
      <img id="heroImage" src="/assets/bg.jpg" alt="Hero Image">
    </div>

    <div class="hero-content">
      <div class="container">
        <div class="hero-text">
          <h1>Furniture Crafted for the Way You Live</h1>
          <p>
            From timeless materials to refined details, each piece is made
            to elevate your home with comfort and character.
          </p>
          <a href="/login" class="btn btn-light btn-md">
            Login
          </a>
        </div>
      </div>
    </div>
  </section>

<!--About Us - New Design-->
<section id="about" class="about-section-new">
  <div class="container">
    <div class="about-content-wrapper">
      
      <!-- Left Side - Text -->
      <div class="about-left">
        <span class="section-tag">About Us</span>
        <h2 class="section-title">Crafting Timeless <span>Furniture</span></h2>
        <p class="about-description">
          We are a furniture company that believes great spaces start with great design.
          Our focus is on creating furniture that is not only stylish, but also comfortable, 
          functional, and built to last.
        </p>
        <p class="about-description">
          Since 2022, we've been dedicated to transforming houses into homes through 
          carefully crafted pieces that tell a story and stand the test of time.
        </p>
        <a href="#products" class="btn-explore">Explore Collections</a>
      </div>

      <!-- Right Side - Stats Grid -->
      <div class="about-right">
        <div class="stat-card">
          <div class="stat-number">5+</div>
          <div class="stat-label">Years Experience</div>
        </div>
        <div class="stat-card">
          <div class="stat-number">500+</div>
          <div class="stat-label">Happy Customers</div>
        </div>
        <div class="stat-card">
          <div class="stat-number">100+</div>
          <div class="stat-label">Furniture Designs</div>
        </div>
        <div class="stat-card">
          <div class="stat-number">99%</div>
          <div class="stat-label">Satisfaction Rate</div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- Features Grid - Enhanced -->
<section class="features-section">
  <div class="container">
    <div class="features-grid">

      <div class="feature-card">
        <div class="feature-icon">
          <i class="fa-solid fa-calendar-check"></i>
        </div>
        <h3>Since 2022</h3>
        <p>Years of experience in furniture craftsmanship and design excellence</p>
      </div>

      <div class="feature-card">
        <div class="feature-icon">
          <i class="fa-solid fa-couch"></i>
        </div>
        <h3>Quality Materials</h3>
        <p>Durable and carefully selected materials for lasting beauty</p>
      </div>

      <div class="feature-card">
        <div class="feature-icon">
          <i class="fa-solid fa-palette"></i>
        </div>
        <h3>Modern Design</h3>
        <p>Stylish and functional pieces for contemporary living</p>
      </div>

      <div class="feature-card">
        <div class="feature-icon">
          <i class="fa-solid fa-magnifying-glass"></i>
        </div>
        <h3>Attention to Detail</h3>
        <p>Crafted with precision and care in every product</p>
      </div>

      <div class="feature-card">
        <div class="feature-icon">
          <i class="fa-solid fa-handshake"></i>
        </div>
        <h3>Trusted Service</h3>
        <p>Friendly and reliable customer support always</p>
      </div>

      <div class="feature-card">
        <div class="feature-icon">
          <i class="fa-solid fa-ruler-combined"></i>
        </div>
        <h3>Custom Solutions</h3>
        <p>Furniture designs tailored to your unique needs</p>
      </div>

    </div>
  </div>
</section>

<!-- Vision & Mission - Redesigned -->
<section id="vision" class="vision-mission-new">
  <div class="container">
    
    <div class="vm-header">
      <span class="section-tag">Our Purpose</span>
      <h2 class="section-title">Vision & <span>Mission</span></h2>
    </div>

    <div class="vm-grid">
      
      <!-- Vision -->
      <div class="vm-box vision-box">
        <div class="vm-icon">
          <i class="fa-solid fa-eye"></i>
        </div>
        <h3>Our Vision</h3>
        <div class="vm-divider"></div>
        <p>
          To become a globally recognized and trusted furniture brand that redefines 
          the essence of home, inspiring better living spaces for generations to come.
        </p>
      </div>

      <!-- Mission -->
      <div class="vm-box mission-box">
        <div class="vm-icon">
          <i class="fa-solid fa-bullseye"></i>
        </div>
        <h3>Our Mission</h3>
        <div class="vm-divider"></div>
        <ul class="mission-list">
          <li>
            <i class="fa-solid fa-check"></i>
            Create functional and aesthetically pleasing furniture
          </li>
          <li>
            <i class="fa-solid fa-check"></i>
            Deliver high-quality craftsmanship in every piece
          </li>
          <li>
            <i class="fa-solid fa-check"></i>
            Continuously innovate to meet modern lifestyle needs
          </li>
          <li>
            <i class="fa-solid fa-check"></i>
            Maintain sustainable and ethical manufacturing practices
          </li>
        </ul>
      </div>

    </div>
  </div>
</section>

  <!--CLIENTS-->
  <section id="clients" class="clients">
    <div class="container">
      <div class="clients-wrapper">

        <div class="clients-row">
          <!-- LEFT -->
          <div class="clients-left">
            <span>CLIENTS</span>
            <h2>What people say<br>about us?</h2>

            <div class="clients-nav">
              <button class="prev">←</button>
              <button class="next">→</button>
            </div>
          </div>

          <!-- RIGHT -->
          <div class="clients-right">
            <div class="clients-slider">
              @foreach ($clients as $client)
                <div class="client-card">
                  <div class="client-user">
                    <img src="{{ asset('storage/' . $client->logo) }}">
                    <div>
                      <strong>{{ $client->name }}</strong>
                      <span class="client-position">
                        {{ $client->position }}
                      </span>
                    </div>
                  </div>
                  <p>{{ $client->desc }}</p>
                </div>
              @endforeach
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!--PRODUCT--->
  <section id="products" class="products-section">
  <div class="container">
    
    <div class="section-header" data-aos="fade-up">
      <span class="section-tag">
        <i class="fa-solid fa-shop"></i> Our Collections
      </span>
      <h2 class="section-title">Shop Our <span>Collections</span></h2>
      <p class="section-subtitle">
        The importance of heritage, locality, and sustainability is the grounding vision for Eastern Edition.
      </p>
    </div>

    <div class="products-grid">
      <a href="/products/table" class="product-card" data-aos="zoom-in" data-aos-delay="100">
        <div class="product-image">
          <img src="/assets/table.png" alt="Table">
          <div class="product-overlay">
            <span class="view-collection">View Collection <i class="fa-solid fa-arrow-right"></i></span>
          </div>
        </div>
        <div class="product-label">
          <span>Table</span>
          <i class="fa-solid fa-chevron-right"></i>
        </div>
      </a>
      
      <a href="/products/chair" class="product-card" data-aos="zoom-in" data-aos-delay="200">
        <div class="product-image">
          <img src="/assets/chair.png" alt="Chair">
          <div class="product-overlay">
            <span class="view-collection">View Collection <i class="fa-solid fa-arrow-right"></i></span>
          </div>
        </div>
        <div class="product-label">
          <span>Chair</span>
          <i class="fa-solid fa-chevron-right"></i>
        </div>
      </a>
      
      <a href="/products/sofa" class="product-card" data-aos="zoom-in" data-aos-delay="300">
        <div class="product-image">
          <img src="/assets/sofa.png" alt="Sofa">
          <div class="product-overlay">
            <span class="view-collection">View Collection <i class="fa-solid fa-arrow-right"></i></span>
          </div>
        </div>
        <div class="product-label">
          <span>Sofa</span>
          <i class="fa-solid fa-chevron-right"></i>
        </div>
      </a>
      
      <a href="/products/bed" class="product-card" data-aos="zoom-in" data-aos-delay="400">
        <div class="product-image">
          <img src="/assets/bed.png" alt="Bed">
          <div class="product-overlay">
            <span class="view-collection">View Collection <i class="fa-solid fa-arrow-right"></i></span>
          </div>
        </div>
        <div class="product-label">
          <span>Bed</span>
          <i class="fa-solid fa-chevron-right"></i>
        </div>
      </a>
    </div>
  </div>
</section>


  <!-- Gallery -->
  <section id="gallery" class="gallery-section">
  <div class="container">
    
    <div class="section-header" data-aos="fade-up">
      <span class="section-tag">
        <i class="fa-solid fa-images"></i> Our Gallery
      </span>
      <h2 class="section-title">Explore Our <span>Gallery</span></h2>
      <p class="section-subtitle">A showcase of our finest furniture pieces and installations</p>
    </div>

    <div class="gallery-slider">
      @foreach ($galleryChunks as $chunk)
        <div class="gallery-page">
          <div class="gallery-grid">

            @foreach ($chunk as $index => $gallery)
              <div class="gallery-item item-{{ $index + 1 }}" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}">
                <div class="gallery-overlay">
                  <div class="gallery-caption">
                    <h4>{{ $gallery->title }}</h4>
                    
                  </div>
                </div>
              </div>
            @endforeach

          </div>
        </div>
      @endforeach
    </div>

    <div class="gallery-dots" id="galleryDots"></div>
  </div>
</section>

  <!-- ARTICLES -->
  <section id="articles" class="articles-section">
    <div class="container">

      <div class="articles-header">
        <h2>— LATEST <span>INSIGHT</span></h2>
        <p>Explore our latest articles and updates</p>
      </div>

      <div class="articles-grid">
        @foreach ($articles as $article)
          <article class="article-card">

            <div class="article-image">
              <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}">
            </div>

            <div class="article-content">
              <span class="article-tag">INSIGHT</span>

              <h3>{{ $article->title }}</h3>

              <p>
                {{ Str::limit(strip_tags($article->content), 120) }}
              </p>

              <a href="{{ route('articles.show', $article->id) }}">
                Read more →
              </a>
            </div>

          </article>
        @endforeach
      </div>

    </div>
  </section>

  <!-- UPCOMING EVENTS -->
  <section id="events" class="py-5">
    <div class="container">

      <!-- Header -->
      <div class="events-title text-center mb-5">
        <h2 class="mb-2">
          UPCOMING <span>EVENT</span>
        </h2>

        <h3 class="mb-2">Join Our Latest Events</h3>

        <p class="mb-0">
          Discover furniture exhibitions, launches, and special moments.
        </p>
      </div>

      <!-- Slider Event -->
      <div class="event-slider-wrapper">
        <div id="eventSlider" class="event-slider-track">

          @foreach ($events->chunk(6) as $chunk)
            <div class="event-slide">
              @foreach ($chunk as $event)
                <div class="event-card">

                  <div class="event-image">
                    <img src="{{ asset('storage/' . $event->image) }}">

                  </div>

                  <div class="event-content">
                    <div class="event-title">
                      {{ $event->title }}
                    </div>

                    <div class="event-desc">
                      {{ Str::limit($event->description, 120) }}
                    </div>

                    <div class="event-meta space-y-1">
                      <div>
                        <i class="bi bi-calendar-event me-1"></i>
                        {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}
                        – {{ \Carbon\Carbon::parse($event->end_date)->format('d M Y') }}
                      </div>

                      <div>
                        <i class="bi bi-clock me-1"></i>
                        {{ $event->time }}
                      </div>

                      <div>
                        <i class="bi bi-geo-alt me-1"></i>
                        {{ $event->location }}
                      </div>
                    </div>
                  </div>

                </div>
              @endforeach
            </div>
          @endforeach

        </div>
      </div>
    </div>
  </section>

  <!--CONTACT-->
  <section id="contact" class="py-5">
    <div class="container">

      <!-- TITLE -->
      <div class="text-center mb-5">
        <h2 class="fw-semibold mb-2" style="font-family: Unbounded;">
          CONTACT <span style="color:#a59254;">US</span>
        </h2>
        <p class="text-muted">
          Have questions or want to collaborate? We’d love to hear from you.
        </p>
      </div>

      <div class="row justify-content-center">
        <div class="col-lg-7">

          <div class="bg-white p-4 p-md-5 rounded-4 shadow-sm">

            <form action="{{ route('contact.store') }}" method="POST">
              @csrf

              <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Subject</label>
                <input type="text" name="subject" class="form-control">
              </div>

              <div class="mb-4">
                <label class="form-label">Message</label>
                <textarea name="message" rows="5" class="form-control" required></textarea>
              </div>

              <button class="btn btn-dark px-4 py-2 rounded-pill">
                Send Message
              </button>
            </form>

          </div>

        </div>
      </div>
    </div>
  </section>


  @push('scripts')
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        const heroImg = document.getElementById("heroImage");
        if (!heroImg) return;

        const images = [
          "/assets/bg.jpg",
          "/assets/bg2.jpg",
          "/assets/bg3.jpg",
          "/assets/bg4.jpg",
        ];

        // preload
        images.forEach(src => {
          const img = new Image();
          img.src = src;
        });

        let index = 0;

        setInterval(() => {
          index = (index + 1) % images.length;
          heroImg.src = images[index];
        }, 7000);
      });

      //Slider clients
      document.addEventListener("DOMContentLoaded", function () {
        const slider = document.querySelector(".clients-slider");
        const nextBtn = document.querySelector(".clients-nav .next");
        const prevBtn = document.querySelector(".clients-nav .prev");

        if (!slider || !nextBtn || !prevBtn) return;

        const scrollAmount = 320; 

        nextBtn.addEventListener("click", () => {
          slider.scrollBy({
            left: scrollAmount,
            behavior: "smooth"
          });
        });

        prevBtn.addEventListener("click", () => {
          slider.scrollBy({
            left: -scrollAmount,
            behavior: "smooth"
          });
        });
      });

    </script>
  @endpush


@endsection