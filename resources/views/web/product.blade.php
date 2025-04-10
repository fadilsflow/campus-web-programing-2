@extends('layouts.app')

@section('title', 'Product Details - Fashion Store')

@section('content')
<div class="container py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/products">Products</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $slug }}</li>
        </ol>
    </nav>

    <div class="row">
        <!-- Product Images -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body p-0">
                    <img src="https://placehold.co/600x600?text=Product+Image" class="img-fluid" alt="Product Image">
                </div>
                <div class="card-footer p-0">
                    <div class="row g-0">
                        <div class="col-3">
                            <img src="https://placehold.co/150x150?text=Thumb+1" class="img-fluid" alt="Thumbnail 1">
                        </div>
                        <div class="col-3">
                            <img src="https://placehold.co/150x150?text=Thumb+2" class="img-fluid" alt="Thumbnail 2">
                        </div>
                        <div class="col-3">
                            <img src="https://placehold.co/150x150?text=Thumb+3" class="img-fluid" alt="Thumbnail 3">
                        </div>
                        <div class="col-3">
                            <img src="https://placehold.co/150x150?text=Thumb+4" class="img-fluid" alt="Thumbnail 4">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Details -->
        <div class="col-md-6">
            <h1 class="mb-3">{{ ucfirst($slug) }}</h1>
            <div class="mb-3">
                <span class="h3 text-primary">$99.99</span>
                <span class="text-muted ms-2"><del>$129.99</del></span>
            </div>

            <!-- Rating -->
            <div class="mb-4">
                <div class="d-flex align-items-center">
                    <div class="text-warning me-2">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-half"></i>
                    </div>
                    <span>(4.5/5) - 128 Reviews</span>
                </div>
            </div>

            <!-- Description -->
            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

            <!-- Size Selection -->
            <div class="mb-4">
                <h5>Size</h5>
                <div class="btn-group" role="group">
                    <input type="radio" class="btn-check" name="size" id="size-s" autocomplete="off">
                    <label class="btn btn-outline-dark" for="size-s">S</label>

                    <input type="radio" class="btn-check" name="size" id="size-m" autocomplete="off" checked>
                    <label class="btn btn-outline-dark" for="size-m">M</label>

                    <input type="radio" class="btn-check" name="size" id="size-l" autocomplete="off">
                    <label class="btn btn-outline-dark" for="size-l">L</label>

                    <input type="radio" class="btn-check" name="size" id="size-xl" autocomplete="off">
                    <label class="btn btn-outline-dark" for="size-xl">XL</label>
                </div>
            </div>

            <!-- Quantity -->
            <div class="mb-4">
                <h5>Quantity</h5>
                <div class="input-group" style="width: 150px;">
                    <button class="btn btn-outline-secondary" type="button">-</button>
                    <input type="text" class="form-control text-center" value="1">
                    <button class="btn btn-outline-secondary" type="button">+</button>
                </div>
            </div>

            <!-- Add to Cart -->
            <div class="d-grid gap-2">
                <button class="btn btn-primary btn-lg">
                    <i class="bi bi-cart-plus"></i> Add to Cart
                </button>
                <button class="btn btn-outline-danger btn-lg">
                    <i class="bi bi-heart"></i> Add to Wishlist
                </button>
            </div>

            <!-- Additional Info -->
            <div class="mt-4">
                <div class="accordion" id="productAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#shippingInfo">
                                Shipping Information
                            </button>
                        </h2>
                        <div id="shippingInfo" class="accordion-collapse collapse show" data-bs-parent="#productAccordion">
                            <div class="accordion-body">
                                Free shipping on orders over $100. Delivery within 3-5 business days.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#returnPolicy">
                                Return Policy
                            </button>
                        </h2>
                        <div id="returnPolicy" class="accordion-collapse collapse" data-bs-parent="#productAccordion">
                            <div class="accordion-body">
                                30-day return policy. Items must be unworn with original tags attached.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Products -->
    <div class="mt-5">
        <h3 class="mb-4">You May Also Like</h3>
        <div class="row row-cols-1 row-cols-md-4 g-4">
            @for ($i = 1; $i <= 4; $i++)
            <div class="col">
                <div class="card h-100">
                    <img src="https://placehold.co/300x300?text=Related+{{ $i }}" class="card-img-top" alt="Related Product {{ $i }}">
                    <div class="card-body">
                        <h5 class="card-title">Related Product {{ $i }}</h5>
                        <p class="card-text text-muted">$79.99</p>
                        <button class="btn btn-outline-primary w-100">View Details</button>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
</div>
@endsection
