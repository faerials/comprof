@extends('user.layout.main')
@section('content')

<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<!-- Breadcrumb -->
<section class="breadcrumb-section">
  <div class="container">
    <nav class="breadcrumb-nav">
      <a href="/">Home</a>
      <i class="fa-solid fa-chevron-right"></i>
      <a href="#products">Products</a>
      <i class="fa-solid fa-chevron-right"></i>
      <span>{{ ucfirst($category->name) }}</span>
    </nav>
  </div>
</section>

<!-- Products Listing -->
<section class="products-listing-section">
  <div class="container">

    <!-- Header -->
    <div class="listing-header" data-aos="fade-up">
      <div class="header-left">
        <span class="category-tag">
          <i class="fa-solid fa-layer-group"></i> {{ strtoupper($category->name) }} COLLECTION
        </span>
        <h1>{{ ucfirst($category->name) }} Collection</h1>
        <p>Discover our curated selection of premium {{ $category->name }} furniture</p>
      </div>
      <div class="header-right">
        <div class="view-toggle">
          <button class="view-btn active" data-view="grid">
            <i class="fa-solid fa-grid"></i>
          </button>
          <button class="view-btn" data-view="list">
            <i class="fa-solid fa-list"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Products Count -->
    <div class="products-count" data-aos="fade-up">
      <p>Showing <strong>{{ $products->count() }}</strong> products</p>
    </div>

    <!-- Products Grid -->
    <div class="products-grid-view" id="productsGrid">
      @forelse ($products as $index => $product)
        <div class="product-item" data-aos="fade-up" data-aos-delay="{{ $index * 50 }}">
          
          <a href="{{ route('user.products.show', [$category->slug, $product->id]) }}" class="product-link">
            
            <!-- Image -->
            <div class="product-img-wrapper">
              <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
              
              <!-- Badges -->
              <div class="product-badges">
                @if($product->created_at->diffInDays(now()) < 30)
                  <span class="badge badge-new">New</span>
                @endif
                @if($product->stock < 5 && $product->stock > 0)
                  <span class="badge badge-limited">Limited</span>
                @endif
              </div>

              <!-- Quick View Overlay -->
              <div class="product-overlay">
                <button class="btn-quick-view" onclick="event.preventDefault(); quickView({{ $product->id }})">
                  <i class="fa-solid fa-eye"></i>
                  Quick View
                </button>
              </div>
            </div>

            <!-- Product Info -->
            <div class="product-info">
              <span class="product-category">{{ ucfirst($category->name) }}</span>
              <h3 class="product-name">{{ $product->name }}</h3>
              
              @if($product->description)
                <p class="product-desc">{{ Str::limit(strip_tags($product->description), 80) }}</p>
              @endif

              <div class="product-bottom">
                <div class="product-price">
                  <span class="price-current">Rp{{ number_format($product->price, 0, ',', '.') }}</span>
                </div>

                <div class="product-actions">
                  <button class="btn-wishlist" onclick="event.preventDefault(); toggleWishlist({{ $product->id }})">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <button class="btn-cart" onclick="event.preventDefault(); addToCart({{ $product->id }})">
                    <i class="fa-solid fa-cart-shopping"></i>
                  </button>
                </div>
              </div>

              @if($product->stock > 0)
                <div class="stock-indicator in-stock">
                  <i class="fa-solid fa-check-circle"></i> In Stock
                </div>
              @else
                <div class="stock-indicator out-stock">
                  <i class="fa-solid fa-times-circle"></i> Out of Stock
                </div>
              @endif
            </div>

          </a>
        </div>
      @empty
        <div class="empty-state">
          <i class="fa-solid fa-box-open"></i>
          <h3>No Products Found</h3>
          <p>Products in this category are coming soon!</p>
          <a href="/" class="btn-back-home">Back to Home</a>
        </div>
      @endforelse
    </div>

    <!-- Pagination -->
    @if($products->hasPages())
      <div class="pagination-wrapper" data-aos="fade-up">
        {{ $products->links() }}
      </div>
    @endif

  </div>
</section>

@push('scripts')
<script>
  // View Toggle
  document.querySelectorAll('.view-btn').forEach(btn => {
    btn.addEventListener('click', function() {
      document.querySelectorAll('.view-btn').forEach(b => b.classList.remove('active'));
      this.classList.add('active');
      
      const view = this.dataset.view;
      const grid = document.getElementById('productsGrid');
      
      if (view === 'list') {
        grid.classList.add('list-view');
      } else {
        grid.classList.remove('list-view');
      }
    });
  });

  // Sort functionality
  document.getElementById('sortSelect')?.addEventListener('change', function() {
    // Implement sorting logic here
    console.log('Sort by:', this.value);
  });

  // Wishlist toggle
  function toggleWishlist(productId) {
    console.log('Toggle wishlist:', productId);
    // Implement wishlist logic
  }

  // Add to cart
  function addToCart(productId) {
    console.log('Add to cart:', productId);
    // Implement add to cart logic
  }

  // Quick view
  function quickView(productId) {
    console.log('Quick view:', productId);
    // Implement quick view modal
  }
</script>
@endpush

@endsection