<x-layout>
    <x-slot name="title"> Produk</x-slot>
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
    <div class="container my-5">
        <div class="row">
            <h1 class="mb-4" style="font-family: 'Orbitron', sans-serif;">Produk</h1>
            @forelse($products as $product)
            <div class="col-md-3 mb-4">
                <div class="card product-card h-100">
                    <div class="position-relative">
                        <img src="{{ $product->image_url ? asset('storage/' . $product->image_url) : 'https://via.placeholder.com/350x200?text=No+Image' }}" class="card-img-top" alt="{{ $product->name }}">
                        @if($product->is_new)
                        <span class="position-absolute top-0 end-0 bg-danger text-white px-3 py-1 m-2 rounded-pill">New</span>
                        @endif
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text text-truncate text-muted">{{ $product->description }}</p>
                        <div class="mt-auto">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-pink">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                <a href="{{ route('product.show', $product->slug) }}" class="btn btn-outline-pink btn-sm">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col">
                <div class="alert alert-info">Belum ada produk pada kategori ini.</div>
            </div>
            @endforelse
            <div class="d-flex justify-content-center w-100 mt-4">
                {{ $products->links('vendor.pagination.simple-bootstrap-5') }}
            </div>
        </div>
    </div>
</x-layout>