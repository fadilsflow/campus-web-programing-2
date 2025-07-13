<x-layout>
    <x-slot name="title">Homepage</x-slot>
    <x-hero-section></x-hero-section>

    <!-- Custom Styles -->
    <style>
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

        .section-title {
            font-family: 'Kabel LT Std Black', sans-serif;
            font-size: 2.5rem;
            color: #000;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin: 5rem 0;
            position: relative;
            text-shadow: 2px 2px 0px rgba(232, 62, 140, 0.2);
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background: #e83e8c;
            box-shadow: 0 0 10px rgba(232, 62, 140, 0.5);
        }

        .category-card {
            overflow: hidden;
            position: relative;
            border-radius: 100px;
        }


        .category-icon {
            width: 100px;
            height: 100px;
            background: #2a2a2a;
            border: 2px solid #e83e8c;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            position: relative;
            overflow: hidden;
        }

        .category-icon img {
            width: 60px;
            height: 60px;
            object-fit: contain;
            filter: brightness(0) invert(1);
            transition: all 0.3s ease;
        }

        .category-card:hover .category-icon img {
            transform: scale(1.1);
        }

        .category-name {
            color: #000;
            font-family: 'Orbitron', sans-serif;
            font-size: 1.2rem;
            margin: 1rem 0;
            text-transform: uppercase;
            letter-spacing: 1px;
        }


        .category-desc {
            color: #000;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .feature-section {
            position: relative;
            overflow: hidden;
        }

        .feature-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('/punk-pattern.jpg') center/cover;
            opacity: 0.1;
        }

        .feature-card {
            background: #2a2a2a;
            border: 2px solid #e83e8c;
            border-radius: 10px;
            padding: 2rem;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .feature-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, #e83e8c, transparent);
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(232, 62, 140, 0.2);
        }

        .feature-title {
            color: #e83e8c;
            font-family: 'Orbitron', sans-serif;
            font-size: 1.2rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 1rem;
            text-align: center;
        }

        .feature-text {
            color: #fff;
            text-align: center;
            font-size: 0.9rem;
            margin: 0;
        }

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

        .feature-icon {
            width: 80px;
            height: 80px;
            background: #fff;
            border: 2px solid #e83e8c;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
        }

        .testimonial-card {
            background: #1a1a1a;
            color: #fff;
            border-left: 4px solid #e83e8c;
        }
    </style>

    <!-- Featured Categories -->
    <div class="container py-5">
        <h3 class="section-title">Kategori Product</h3>
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4">
            @foreach($categories as $category)
            <div class="col">
                <a href="{{ URL::to('/category/' . $category->slug) }}" class="text-decoration-none">
                    <div class="h-100 py-4 category-card">
                        <img src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}" class="category-icon">
                        <div class="text-center px-3">
                            <h5 class="category-name">{{ $category->name }}</h5>
                            <p class="category-desc">{{ $category->description }}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-5">
            <a href="{{ URL::to('/categories') }}" class="btn btn-outline-pink">Lihat Semua Kategori</a>
        </div>
    </div>

    <!-- Features Section -->
    <div class="feature-section py-5">
        <div class="container position-relative">
            <h3 class="section-title ">Mengapa Memilih Kami?</h3>
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="feature-card">
                        <h5 class="feature-title">REBEL DELIVERY</h5>
                        <p class="feature-text">Pengiriman kilat ke seluruh nusantara. No rules, just speed!</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-card">

                        <h5 class="feature-title">100% LEGIT</h5>
                        <p class="feature-text">Produk original dan limited edition. No fake stuff in our rebellion!</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-card">

                        <h5 class="feature-title">NO REGRETS</h5>
                        <p class="feature-text">14 hari garansi pengembalian. Not satisfied? Smash that return button!</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-card">

                        <h5 class="feature-title">24/7 BACKUP</h5>
                        <p class="feature-text">Support tim 24 jam. We got your back in this rebellion!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Products -->
    <div class="container py-5">
        <h3 class="section-title">Produk Kami</h3>
        <div class="row g-4">
            @forelse($products as $product)
            <div class="col-md-3">
                <div class="card product-card h-100">
                    <div class="position-relative">
                        <img src="{{ Storage::url($product->image_url) }}" class="card-img-top" alt="{{ $product->name }}">
                        @if($product->is_new)
                        <span class="position-absolute top-0 end-0 bg-danger text-white px-3 py-1 m-2 rounded-pill">New</span>
                        @endif
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text text-truncate text-muted">{{ $product->description }}</p>
                        <div class="mt-auto">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-danger">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
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
        </div>
        <div class="d-flex justify-content-between align-items-center mt-5">
            <a href="{{ URL::to('/products') }}" class="btn btn-outline-pink">Lihat Semua Produk</a>
            {{ $products->links('vendor.pagination.simple-bootstrap-5') }}
        </div>
    </div>

    <!-- Testimonials -->
    <div class=" py-5">
        <div class="container">
            <h3 class="section-title">What They Say</h3>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="testimonial-card p-4">
                        <div class="d-flex align-items-center mb-3">

                            <div>
                                <h6 class="mb-0">Wildan Brebes</h6>
                                <small class="text-pink">Punk Enthusiast</small>
                            </div>
                        </div>
                        <p class="mb-0">"Kualitas produk mantap, desain anti mainstream. Cocok buat yang suka tampil beda!"</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card p-4">
                        <div class="d-flex align-items-center mb-3">

                            <div>
                                <h6 class="mb-0">Putra Pekalongan</h6>
                                <small class="text-pink">Rock Lover</small>
                            </div>
                        </div>
                        <p class="mb-0">"Pengiriman cepat, packaging aman. Puas banget belanja di sini!"</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card p-4">
                        <div class="d-flex align-items-center mb-3">

                            <div>
                                <h6 class="mb-0">Yanuar Jember</h6>
                                <small class="text-pink">Collector</small>
                            </div>
                        </div>
                        <p class="mb-0">"Produk original dan limited edition. Worth it banget buat koleksi!"</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>