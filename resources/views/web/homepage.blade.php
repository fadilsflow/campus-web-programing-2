<x-layout>
    <x-slot name="title"> Homepage</x-slot>
    <x-hero-section></x-hero-section>
    <style>
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
    <div class="container py-3">
        <div class="text-center mb-4">
            <h3 style="
            font-family: 'Kabel LT Std Black', sans-serif;
            font-size: 2.5rem;
            color: #000;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 5rem;
            margin-bottom: 5rem;
        ">
                Kategori Product
            </h3>
        </div>
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-3">
            @foreach($categories as $category)
                    <div class="col">
                        <a href="{{ URL::to('/category/' . $category->slug) }}" class="card
                                                text-decoration-none">
                            <div class="card category-card text-center h-100 py-3 border-0
                                                shadow-sm">
                                <div class="mx-auto mb-2"
                                    style="width:64px;height:64px;display:flex;align-items:center;justify-content:center;background:#f8f9fa;border-radius:50%;">
                                    <img src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}"
                                        style="width:36px;height:36px;object-fit:contain;">
                                </div>
                                <div class="card-body p-2">
                                    <h6 class="card-title mb-1 text-dark">{{ $category->name
                                                }}</h6>
                                    <p class="card-text text-muted small text-truncate">{{ $category->description }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
            @endforeach
        </div>
        <a href="{{ URL::to('/categories') }}" class="btn btn-outline-pink btn-sm mt-5">Lihat Semua Kategori</a>
    </div>
    <div class="container py-3">
        <div class="text-center mb-4">
            <h3 style="
            font-family: 'Kabel LT Std Black', sans-serif;
            font-size: 2.5rem;
            color: #000;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 4rem;
            margin-bottom: 5rem;
        ">
                Product Kami
            </h3>
        </div>
        <div class="row">
            @forelse($products as $product)
                    <div class="col-md-3 mb-4">
                        <div class="card product-card h-100 shadow-sm">
                            <img src="{{ Storage::url($product->image_url) }}" class="card-img-top" alt="{{ $product->name }}">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text text-truncate">{{ $product->description
                                                }}</p>
                                <div class="mt-auto">
                                    <span class="fw-bold text-primary">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                    <a href="{{ route('product.show', $product->slug) }}"
                                        class="btn btn-outline-primary btn-sm float-end">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
            @empty
                <div class="col">
                    <div class="alert alert-info">Belum ada produk pada kategori
                        ini.</div>
                </div>
            @endforelse
            <div class="d-flex justify-content-center w-100 mt-4">
                {{ $products->links('vendor.pagination.simple-bootstrap-5') }}
            </div>
        </div>
        <a href="{{ URL::to('/products') }}" class="btn btn-outline-pink btn-sm">Lihat Semua Product</a>
    </div>
</x-layout>