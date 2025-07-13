<x-layout>
    <x-slot name="title"> {{$product->name}}</x-slot>
    <!-- Custom Styles -->
    <style>
        .product-card {
            border: none;
            transition: all 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(232, 62, 140, 0.1) !important;
        }

        .product-card img {
            height: 250px;
            object-fit: cover;
        }

        .text-pink {
            color: #e83e8c !important;
        }

        .btn-outline-pink {
            color: #e83e8c !important;
            border: 1px solid #e83e8c !important;
            background-color: transparent;
            transition: 0.3s ease;
        }

        .btn-outline-pink:hover {
            background-color: #e83e8c !important;
            color: #fff !important;
        }
    </style>
    @if(session('error'))
    <div class="container mt-4">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif
    <div class="container my-5">
        <div class="row g-5 align-items-start">
            <div class="col-md-6">
                <div class="bg-white shadow rounded p-3">
                    <img src="{{ $product->image_url ? asset('storage/' . $product->image_url) : 'https://via.placeholder.com/500x500' }}" class="img-fluid rounded w-100" alt="{{ $product->name }}">
                </div>
                <div class="mt-3">
                    <span class="badge bg-pink">{{ $product->category->name ?? 'Kategori Tidak Diketahui' }}</span>
                </div>
            </div>
            <div class="col-md-6">
                <h1 class="mb-2 fw-bold" style="font-family: 'Orbitron', sans-serif; text-transform: capitalize;">{{ $product->name }}</h1>
                <div class="mb-3">
                    <span class="fs-4 text-pink fw-semibold">Rp.{{ number_format($product->price, 0, ',', '.') }}</span>
                    @if($product->old_price)
                    <span class="text-muted text-decoration-line-through ms-2">Rp{{ number_format($product->old_price, 0, ',', '.') }}</span>
                    @endif
                </div>
                <div class="mb-4">
                    <p class="text-muted">{{ $product->description }}</p>
                </div>
                <form action="{{ route('cart.add') }}" method="POST" class="mb-4">
                    @csrf
                    <div class="input-group" style="max-width: 320px;">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="number" name="quantity" class="form-control" value="1" min="1" max="{{ $product->stock }}">
                        <button class="btn btn-outline-pink" type="submit">
                            <i class="bi bi-cart-plus me-1"></i> Tambah ke Keranjang
                        </button>
                    </div>
                </form>
                <ul class="list-group list-group-flush mb-4">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><strong>Stok:</strong></span>
                        <span class="{{ $product->stock > 0 ? 'text-pink' : 'text-danger' }}">
                            {{ $product->stock > 0 ? $product->stock : 'Habis' }}
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><strong>Kategori:</strong></span>
                        <span class="text-pink">{{ $product->category->name ?? '-' }}</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <h4 class="mb-3">Deskripsi Produk</h4>
                <div class="bg-light p-4 rounded shadow-sm">
                    {!! nl2br(e($product->long_description ?? $product->description)) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <h3 class="mb-4">Produk Lainnya</h3>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            @foreach($relatedProducts as $relatedProduct)
            <div class="col">
                <div class="card product-card h-100">
                    <div class="position-relative">
                        <img src="{{ $relatedProduct->image_url ?? 'https://via.placeholder.com/350x200?text=No+Image' }}" class="card-img-top" alt="{{ $relatedProduct->name }}">
                        @if($relatedProduct->is_new)
                        <span class="position-absolute top-0 end-0 bg-danger text-white px-3 py-1 m-2 rounded-pill">New</span>
                        @endif
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $relatedProduct->name }}</h5>
                        <p class="card-text text-truncate text-muted">{{ $relatedProduct->description }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-bold text-pink">Rp {{ number_format($relatedProduct->price, 0, ',', '.') }}</span>
                            <a href="{{ route('product.show', $relatedProduct->slug) }}" class="btn btn-outline-pink btn-sm">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @if($relatedProducts->isEmpty())
            <div class="col">
                <div class="alert alert-info">Tidak ada produk terkait.</div>
            </div>
            @endif
        </div>
    </div>
</x-layout>