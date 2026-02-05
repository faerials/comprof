@extends('user.layout.main')

@section('content')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<section class="product-show">
    <div class="container">

        <div class="product-card">

            <!-- IMAGE -->
            <div class="product-image">
                <img src="{{ asset('storage/'.$product->image) }}"
                     alt="{{ $product->name }}">
            </div>

            <!-- CONTENT -->
            <div class="product-content">

                <h1 class="product-title">
                    {{ $product->name }}
                </h1>

                <div class="product-price">
                    Rp {{ number_format($product->price, 0, ',', '.') }}
                </div>

                <div class="product-stock">
                    @if($product->stock > 0)
                        <span class="in-stock">
                            Stock tersedia: {{ $product->stock }}
                        </span>
                    @else
                        <span class="out-stock">
                            Stok habis
                        </span>
                    @endif
                </div>

                <div class="product-description">
                    {!! nl2br(e($product->desc)) !!}
                </div>

                <!-- E-COMMERCE -->
                <div class="buy-section">
                    <p class="buy-label">Beli produk ini di:</p>

                    <div class="buy-buttons">

                        @if($product->url1)
                            <a href="{{ $product->url1 }}"
                               target="_blank"
                               class="btn-buy shopee">
                                Shopee
                            </a>
                        @endif

                        @if($product->url2)
                            <a href="{{ $product->url2 }}"
                               target="_blank"
                               class="btn-buy tokopedia">
                                Tokopedia
                            </a>
                        @endif

                        @if($product->url3)
                            <a href="{{ $product->url3 }}"
                               target="_blank"
                               class="btn-buy blibli">
                                Blibli
                            </a>
                        @endif

                        @if(
                            !$product->url1 &&
                            !$product->url2 &&
                            !$product->url3
                        )
                            <span class="no-link">
                                Link e-commerce belum tersedia
                            </span>
                        @endif

                    </div>
                </div>

            </div>
        </div>

    </div>
</section>
@endsection
