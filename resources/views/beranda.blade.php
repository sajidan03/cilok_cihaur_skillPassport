@extends('template')

@section('title')
Beranda
@endsection

@section('content')
<style>
    a {
        text-decoration: none;
        color: inherit;
    }

    .card:hover {
        transform: scale(1.02);
        transition: 0.3s ease-in-out;
        box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
    }

    .product-image {
        height: 250px;
        object-fit: cover;
        border-top-left-radius: 0.375rem;
        border-top-right-radius: 0.375rem;
    }
</style>

<div class="container my-4">

    <!-- Hero Carousel Section -->
    <div id="heroCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
        <div class="carousel-inner rounded shadow">
            <div class="carousel-item active">
                <div class="d-flex flex-column flex-md-row align-items-center bg-primary text-white p-5" style="min-height: 300px;">
                    <div class="col-md-6">
                        <h1 class="fw-bold">Selamat datang di Cilok Cihaur</h1>
                        <p class="fs-5">Harga terjangkau, dengan rasa fantastis</p>
                    </div>
                    <div class="col-md-6 text-center">
                        <img src="{{ asset('assets/images/banner1.svg') }}" alt="Banner 1" class="img-fluid" style="max-height: 200px;">
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="d-flex flex-column flex-md-row align-items-center bg-dark text-white p-5" style="min-height: 300px;">
                    <div class="col-md-6">
                        <h1 class="fw-bold">Diskon & Promo Menarik</h1>
                        <p class="fs-5">Nikmati potongan harga dan penawaran khusus setiap harinya hanya di Kubisa.co!</p>
                    </div>
                    <div class="col-md-6 text-center">
                        <img src="{{ asset('assets/images/banner2.svg') }}" alt="Banner 2" class="img-fluid" style="max-height: 200px;">
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="d-flex flex-column flex-md-row align-items-center bg-secondary text-white p-5" style="min-height: 300px;">
                    <div class="col-md-6">
                        <h1 class="fw-bold">Layanan Cepat & Terpercaya</h1>
                        <p class="fs-5">Kami mengutamakan kepuasan pelanggan dengan layanan yang ramah dan pengiriman cepat.</p>
                    </div>
                    <div class="col-md-6 text-center">
                        <img src="{{ asset('assets/images/banner3.svg') }}" alt="Banner 3" class="img-fluid" style="max-height: 200px;">
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
    </div>

    <!-- Produk Terbaru -->
    <div class="mb-4">
        <h3 class="mb-4">🆕 Produk Terbaru</h3>
        <div class="row g-4">
            @forelse ($produk as $item)
            <div class="col-12 col-sm-6 col-md-4">
                <a href="{{ route('product.detail', Crypt::encrypt($item->id)) }}">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('storage/product/'.$item->image) }}"
                             onerror="this.src='https://via.placeholder.com/400x250?text=No+Image';"
                             class="card-img-top product-image" alt="{{ $item->name }}">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $item->name }} | {{ $item->category->name }}</h5>
                            <p class="card-text text-muted mb-3">Rp. {{ number_format($item->price, 0, ',', '.') }}</p>
                            <a href="/cart/{{ Crypt::encrypt($item->id) }}" class="btn btn-outline-primary mt-auto">Beli</a>
                        </div>
                    </div>
                </a>
            </div>
            @empty
            <p class="text-muted">Tidak ada produk untuk ditampilkan.</p>
            @endforelse
        </div>
    </div>

</div>
@endsection
